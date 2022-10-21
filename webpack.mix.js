const mix = require('laravel-mix')
const exec = require('child_process').exec
require('dotenv').config()

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

const glob = require('glob')
const path = require('path')

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
    ;(glob.sync('resources/be_src/' + query) || []).forEach(f => {
        f = f.replace(/[\\\/]+/g, '/')
        cb(f, f.replace('resources/be_src', 'public'))
    })
}

const sassOptions = {
    precision: 5,
    includePaths: ['node_modules', 'resources/be_src/assets/']
}

// plugins Core stylesheets
mixAssetsDir('scss/base/plugins/**/!(_)*.scss', (src, dest) =>
    mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), { sassOptions })
)

// pages Core stylesheets
mixAssetsDir('scss/base/pages/**/!(_)*.scss', (src, dest) =>
    mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), { sassOptions })
)

// Core stylesheets
mixAssetsDir('scss/base/core/**/!(_)*.scss', (src, dest) =>
    mix.sass(src, dest.replace(/(\\|\/)scss(\\|\/)/, '$1css$2').replace(/\.scss$/, '.css'), { sassOptions })
)

// script js
mixAssetsDir('js/scripts/**/*.js', (src, dest) => mix.scripts(src, dest))

/*
 |--------------------------------------------------------------------------
 | Application assets
 |--------------------------------------------------------------------------
 */

mixAssetsDir('vendors/js/**/*.js', (src, dest) => mix.scripts(src, dest))
mixAssetsDir('vendors/css/**/*.css', (src, dest) => mix.copy(src, dest))
mixAssetsDir('vendors/**/**/images', (src, dest) => mix.copy(src, dest))
mixAssetsDir('vendors/css/editors/quill/fonts/', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts', (src, dest) => mix.copy(src, dest))
mixAssetsDir('fonts/**/**/*.css', (src, dest) => mix.copy(src, dest))
mix.copyDirectory('resources/be_src/images', 'public/images')
mix.copyDirectory('resources/be_src/data', 'public/data')

mix
    .js('resources/be_src/js/core/app-menu.js', 'public/js/core')
    .js('resources/be_src/js/core/app.js', 'public/js/core')
    .js('resources/be_src/assets/js/scripts.js', 'public/js/core')
    .sass('resources/be_src/scss/base/themes/dark-layout.scss', 'public/css/base/themes', { sassOptions })
    .sass('resources/be_src/scss/base/themes/bordered-layout.scss', 'public/css/base/themes', { sassOptions })
    .sass('resources/be_src/scss/base/themes/semi-dark-layout.scss', 'public/css/base/themes', { sassOptions })
    .sass('resources/be_src/scss/core.scss', 'public/css', { sassOptions })
    .sass('resources/be_src/scss/overrides.scss', 'public/css', { sassOptions })
    .sass('resources/be_src/scss/base/custom-rtl.scss', 'public/css-rtl', { sassOptions })
    .sass('resources/be_src/assets/scss/style-rtl.scss', 'public/css-rtl', { sassOptions })
    .sass('resources/be_src/assets/scss/style.scss', 'public/css', { sassOptions })

mix.then(() => {
    if (process.env.MIX_CONTENT_DIRECTION === 'rtl') {
        let command = `node ${path.resolve('node_modules/rtlcss/bin/rtlcss.js')} -d -e ".css" ./public/css/ ./public/css/`
        exec(command, function (err, stdout, stderr) {
            if (err !== null) {
                console.log(err)
            }
        })
    }
})

// if (mix.inProduction()) {
//   mix.version()
//   mix.webpackConfig({
//     output: {
//       publicPath: '/demo/vuexy-bootstrap-laravel-admin-template-new/demo-2/'
//     }
//   })
//   mix.setResourceRoot('/demo/vuexy-bootstrap-laravel-admin-template-new/demo-2/')
// }

/*
 |--------------------------------------------------------------------------
 | Browsersync Reloading
 |--------------------------------------------------------------------------
 |
 | BrowserSync can automatically monitor your files for changes, and inject your changes into the browser without requiring a manual refresh.
 | You may enable support for this by calling the mix.browserSync() method:
 | Make Sure to run `php artisan serve` and `yarn watch` command to run Browser Sync functionality
 | Refer official documentation for more information: https://laravel.com/docs/9.x/mix#browsersync-reloading
 */

// mix.browserSync('http://127.0.0.1:8000/')


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
mix.copy('resources/fe_src','public/assets');
