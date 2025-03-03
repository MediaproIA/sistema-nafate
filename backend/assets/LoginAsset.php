<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets/';
    public $css = [
        'plugins/global/plugins.bundle.css',
        'assets/css/style.bundle.css',
    ];
    public $js = [
        'assets/plugins/global/plugins.bundle.js',
        'assets/js/scripts.bundle.js',
        'assets/js/custom/authentication/sign-in/general.js'
    ];
    public $depends = [];
}
