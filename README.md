# artkiss-custom-theme
WordPress custom theme
# Artkiss Custom WooCommerce Theme

Custom, lightweight, and performance-optimized WordPress theme with full WooCommerce integration. Built from scratch without page builders (Elementor/Divi) using ACF (Advanced Custom Fields) and modern frontend tools.

## Key Features

* **Custom-Coded & Lightweight:** No page builder bloat. Clean modular PHP templates and structured styles.
* **WooCommerce Ready:** Deep custom styling for Product Cards, Single Product page, Cart, Checkout, and Notices.
* **ACF Integration:** Dynamic content editing for homepage sections via custom fields, keeping layout secure and client-friendly.
* **Performance Optimized:**
  * Cleaned up default WordPress assets (removed unused Gutenberg styles, Dashicons, and emojis).
  * Optimizations for Core Web Vitals (using `<picture>` for responsive mobile/desktop hero assets, `fetchpriority="high"`, `loading="eager"`, and async/deferred scripts).
  * Automatic cache-busting for enqueued CSS/JS using file modification times (`filemtime`).
* **Interactivity & UI:**
  * Smooth scrolling using **Lenis**.
  * On-scroll animations powered by **AOS** (Animate on Scroll).
  * Auto-hiding sticky header with **Headroom.js**.
  * Custom slider sections using **Swiper**.

## Tech Stack & Workflow

* **CMS:** WordPress & WooCommerce
* **PHP:** Modular functions (`functions/`) and structured templates
* **Styles:** Sass (SCSS) using the **7-1 Pattern** architecture
* **Scripts:** Vanilla ES6+ JS bundled via Babel and UglifyJS
* **Build Tool:** Gulp (CSS minification, prefixing, JS concatenation, browser-sync for hot reload)

## Installation & Setup

1. **Clone the Repository:**
   Clone this directory directly into your WordPress installation's themes directory:
   ```bash
   cd wp-content/themes/
   git clone <repository-url> artkiss-custom-theme
