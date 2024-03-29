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
const tailwindcss = require("tailwindcss");

mix.extract(["vue"]);

mix.scripts("resources/js/subscribe.js", "public/js/subscribe.js")
    .js("resources/js/app.js", "public/js")
    .vue({ version: 2 })
    .sass("resources/sass/app.scss", "public/css")
    .options({
        processCssUrls: false,
        postCss: [tailwindcss("tailwind.config.js")],
    })
    .version();
