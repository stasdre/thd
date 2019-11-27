let mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js("resources/assets/js/app.js", "public/js")
  .sass("resources/assets/sass/main.scss", "public/css");

mix
  .js("resources/assets/js/admin/app.js", "public/js/admin/")
  .sass("resources/assets/sass/admin/app.scss", "public/css/admin/");

mix
  .js("resources/assets/js/admin/tinymce.js", "public/js/admin")
  .copy("node_modules/tinymce/skins", "public/js/admin/skins");

mix.js("resources/assets/js/admin/datatables.js", "public/js/admin");

mix.copy(
  "node_modules/bootstrap-slider/dist/bootstrap-slider.min.js",
  "public/js"
);

mix.js("resources/assets/js/plans-search.js", "public/js");
