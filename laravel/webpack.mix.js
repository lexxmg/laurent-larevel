const mix = require('laravel-mix');

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

 const arrayCss = [
    'normalize.css',
    'master.css',
    'icon.css',
    'button.css',
    'login.css',
    'register.css',
    'registration-link.css',
    'home.css'
  ];
  
  const arrayCssFullPath = arrayCss.map(item => {
    return 'resources/css/' + item;
  });
  
  console.log(arrayCssFullPath);
  
  mix.js('resources/js/app.js', 'public/js')
      .styles(arrayCssFullPath, 'public/css/app.css');
  