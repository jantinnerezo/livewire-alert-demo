const mix = require('laravel-mix');

mix.js("resources/js/app.js", "public/js")
    .copyDirectory('resources/static', 'public/static')
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);
