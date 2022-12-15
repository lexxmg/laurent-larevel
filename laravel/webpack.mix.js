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
    'register.css',
    'header.css',
    'home.css'
  ];
  
  const arrayCssFullPath = arrayCss.map(item => {
    return 'resources/css/' + item;
  });
  
  console.log(arrayCssFullPath);
  
  mix.js('resources/js/app.js', 'public/js')
    .styles(arrayCssFullPath, 'public/css/app.css');
  

  const arrayAdminCss = [
    'normalize.css',
    'master.css',
    'header.css',
    'button.css',
    'main.css',
    'token.css',
    'nav.css',
    'registration-link.css',
    'login.css',
    'out.css',
  ];
  
  const arrayAdminCssFullPath = arrayAdminCss.map(item => {
    return 'resources/css/admin/' + item;
  });

  mix.js('resources/js/admin.js', 'public/js')
    .styles(arrayAdminCssFullPath, 'public/css/admin.css');    
  
  mix.copyDirectory('resources/images', 'public/images');