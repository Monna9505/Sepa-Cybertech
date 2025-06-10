const { src, dest, parallel, series, watch } = require('gulp');

const simaUglify = require('gulp-uglify');
const simaInclude = require('gulp-include');
const simaSass = require('gulp-sass')(require('sass'));

let SIMA_THEME_PATH = './assets';

/**
 * Main theme styles function. Compiles SASS -> CSS compressed.
 * Used for production.
 */
function styles_sima_theme() {
    return src(`${SIMA_THEME_PATH}/private/sass/*.scss`)
           .pipe(simaSass({outputStyle: 'compressed'}))
           .pipe(dest(`${SIMA_THEME_PATH}/public/css/`))
}

/**
 * Main theme styles function. Compiles SASS -> CSS expanded.
 * Used for dev.
 */
function styles_sima_theme_dev() {
    return src(`${SIMA_THEME_PATH}/private/sass/*.scss`)
           .pipe(simaSass({outputStyle: 'expanded'}))
           .pipe(dest(`${SIMA_THEME_PATH}/public/css/`))
}

/**
 * Main theme scripts function. Concatenates & compresses JS.
 * Used for production.
 */
function scripts_sima_theme() {
    return src(`${SIMA_THEME_PATH}/private/js/*.js`)
           .pipe(simaInclude())
           .pipe(simaUglify())
           .pipe(dest(`${SIMA_THEME_PATH}/public/js/`))
}

/**
 * Main theme scripts function. Concatenates JS.
 * Used for dev.
 */
function scripts_sima_theme_dev() {
    return src(`${SIMA_THEME_PATH}/private/js/*.js`)
           .pipe(simaInclude())
           .pipe(dest(`${SIMA_THEME_PATH}/public/js/`))
}

/**
 * Parallel execution of the theme's styles.
 */
function styles() {
    return parallel(
        styles_sima_theme,
    )
}

/**
 * Parallel execution of the theme's scripts.
 */
function scripts() {
    return parallel(
        scripts_sima_theme,
    )
}

/**
 * Watcher function.
 */
function gulp_watcher() {
    let options = {ignoreInitial: false};

    watch(`${SIMA_THEME_PATH}/private/sass`, options, styles_sima_theme_dev);
    watch(`${SIMA_THEME_PATH}/private/js`, options, scripts_sima_theme_dev);
}

/**
 * Exports
 */
exports.watch = gulp_watcher;
exports.default = series(styles(), scripts());