var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

	var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    mix.sass('bootstrap.scss')
    	.copy( bootstrapPath + '/javascripts/bootstrap.js', 'public/js/bootstrap.js')
    	.copy( bootstrapPath + '/fonts/', 'public/fonts')
    	.scripts(['libs/sweetalert.min.js'], './public/js/sweetalert.min.js')
    	.scripts(['libs/dropzone.min.js'], './public/js/dropzone.min.js')
    	.styles(['libs/sweetalert.css'], './public/css/sweetalert.css')
    	.styles(['libs/dropzone.min.css'], './public/css/dropzone.min.css');
});
