<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets_metronic/';
    public $css = [
        '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
        'plugins/global/plugins.bundle.css',
        'plugins/custom/prismjs/prismjs.bundle.css',
        'css/style.bundle.css',
        'css/themes/layout/header/base/light.css',
        'css/themes/layout/header/menu/light.css',
        'css/themes/layout/brand/light.css',
        'css/themes/layout/aside/light.css',
        'plugins/custom/datatables/datatables.bundle.css',
        'css/imageuploadify.min.css'
        
    ];
    public $js = [
        'plugins/global/plugins.bundle.js',
        'plugins/custom/prismjs/prismjs.bundle.js',
        'js/scripts.bundle.js',
        'plugins/custom/datatables/datatables.bundle.js',
        'plugins/global/jquery.validate.js',
        'plugins/global/additional-methods.min.js',
        'js/globales.js',
      
    ];
    


}
