const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
sass.compiler = require("sass");
const concat = require("gulp-concat");
const csso = require("gulp-csso");
const autoprefixer = require("gulp-autoprefixer");
const babel = require("gulp-babel");
const uglify = require("gulp-uglify-es").default;
const include = require("gulp-include");
const browserSync = require("browser-sync").create();
const fs = require("fs");

let dirs = {
  css: "src/css/**/*.scss",
  js: "src/js/*.js",
  jslib: "src/js/lib/_libraries.js",
  build: "dist/",
  buildcss: "dist/build-style.js",
  buildjs: "dist/build-js.js",
  buildjslibs: "dist/build-libs.js",
};

gulp.task("js", () =>
  gulp
    .src(dirs.js)
    .pipe(
      babel({
        presets: ["@babel/preset-env"],
      }),
    )
    .pipe(concat("build-js.js"))
    .pipe(uglify())
    .pipe(gulp.dest(dirs.build))
    .pipe(browserSync.stream()),
);

gulp.task("jslibs", () =>
  gulp
    .src(dirs.jslib)
    .pipe(concat("build-libs.js"))
    .pipe(include())
    .pipe(uglify())
    .pipe(gulp.dest(dirs.build))
    .pipe(browserSync.stream()),
);

gulp.task("css", function () {
  return gulp
    .src("src/css/*.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(concat("build-style.css"))
    .pipe(
      autoprefixer({
        overrideBrowserslist: ["last 2 versions"],
        cascade: false,
      }),
    )
    .pipe(
      csso({
        sourceMap: false,
        debug: false,
      }),
    )
    .pipe(gulp.dest(dirs.build))
    .pipe(browserSync.stream());
});

gulp.task("combine-jsbuild", function () {
  if (fs.existsSync(dirs.buildjs) && fs.existsSync(dirs.buildjslibs)) {
    return gulp
      .src(["dist/build-libs.js", "dist/build-js.js"])
      .pipe(concat("build-combined.js"))
      .pipe(gulp.dest(dirs.build));
  } else {
    console.log("Building app");
  }
});

gulp.task("build", gulp.series("css", "js", "jslibs", "combine-jsbuild"));

gulp.task("browser-sync", function (done) {
  browserSync.init({
    proxy: "artkiss-castom.local",
    host: "artkiss-castom.local",
    open: "external",
    port: 3000,
  });
  done();
});

const runWatchers = () => {
  gulp.watch(["*.php", "**/*.php"]).on("change", browserSync.reload);
  gulp.watch(dirs.css, gulp.series("css"));
  gulp.watch(dirs.js, gulp.series("js", "combine-jsbuild")).on("change", browserSync.reload);
  gulp.watch(dirs.jslib, gulp.series("jslibs", "combine-jsbuild")).on("change", browserSync.reload);
};

gulp.task("default", gulp.series(
  function (done) {
    if (!fs.existsSync(dirs.buildjs) || !fs.existsSync(dirs.buildjslibs)) {
      console.log("Building app");
      gulp.series("build")(done);
    } else {
      done();
    }
  },
  "browser-sync",
  function (done) {
    console.log("Im watching");
    runWatchers();
    done();
  }
));
