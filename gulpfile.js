var elixir = require('laravel-elixir');

elixir.config.production = true;

elixir(function(mix) {
  mix.less(['custom.less'],  'public/css/all.css');
  mix.less(['pdf.less'],  'public/css/pdf.css');

  mix.version(['public/css/all.css', 'public/css/pdf.css']);

  mix.scripts(["libs/jquery.min.js", "libs/bootstrap.min.js", "libs/jquery-ui.min.js", "libs/sweetalert.min.js", "libs/jquery.dataTables.min.js", "libs/dataTables.bootstrap.min.js"], "public/js", "resources/assets/js");


/*    mix.less(["admin/admin.less"], "public/css/admin/all.css");

    mix.version(['public/css/all.css', "public/css/admin/all.css"]);


    mix.copy('resources/assets/js/admin/custom.js', 'public/js/admin/custom.js');

    mix.copy('resources/assets/js/admin/vendor.js', 'public/js/admin/vendor.js');*/
});