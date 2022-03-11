const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/nav.js", "public/js")
    .vue()
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/_variables.scss", "public/css")
    .sass("resources/sass/blogs.scss", "public/css")
    .sass("resources/sass/createblog.scss", "public/css")
    .sass("resources/sass/forms.scss", "public/css")
    .sass("resources/sass/home.scss", "public/css")
    .sass("resources/sass/nav.scss", "public/css")
    .sass("resources/sass/main.scss", "public/css")
    .sass("resources/sass/profile.scss", "public/css");
