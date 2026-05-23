(function () {
  'use strict';

  // Helper to extract items_count from various WooCommerce API response formats
  function extractItemsCount(data) {
    if (!data) return undefined;

    // Direct response
    if (typeof data.items_count !== 'undefined') {
      return data.items_count;
    }

    // Batch response format
    if (Array.isArray(data.responses)) {
      for (let i = 0; i < data.responses.length; i++) {
        const resp = data.responses[i];
        if (resp && resp.body && typeof resp.body.items_count !== 'undefined') {
          return resp.body.items_count;
        }
      }
    }

    return undefined;
  }

  // Update header count for WooCommerce Cart Blocks via fetch intercept
  const originalFetch = window.fetch;
  window.fetch = async function (...args) {
    const response = await originalFetch.apply(this, args);
    
    // Resolve URL safely (could be Request object, URL object, or string)
    let url = '';
    if (args[0] instanceof Request) {
      url = args[0].url;
    } else if (args[0] instanceof URL) {
      url = args[0].href;
    } else {
      url = String(args[0]);
    }

    // Resolve Method safely
    let method = 'GET';
    if (args[0] instanceof Request) {
      method = args[0].method;
    } else if (args[1] && args[1].method) {
      method = args[1].method;
    }
    method = method.toUpperCase();

    // Intercept WooCommerce Store API requests (including batch requests)
    if (url && url.indexOf('/wc/store/') !== -1) {
      try {
        const resClone = response.clone();
        resClone.json().then(function (data) {
          const itemsCount = extractItemsCount(data);

          if (typeof itemsCount !== 'undefined') {
            const countElement = document.querySelector('.c-cart-icon__count');
            if (countElement) {
              countElement.textContent = itemsCount;
            }
          } else if (method === 'DELETE' || url.indexOf('remove-item') !== -1) {
            // Fallback for deletions that don't return the count
            if (typeof jQuery !== 'undefined') {
              jQuery(document.body).trigger('wc_fragment_refresh');
            }
          }
        }).catch(function (e) {
          // Fallback if JSON parsing fails on mutation
          if (method !== 'GET' && typeof jQuery !== 'undefined') {
            jQuery(document.body).trigger('wc_fragment_refresh');
          }
        });
      } catch (e) {
        console.error('Fetch intercept error', e);
      }
    }

    return response;
  };
})();
