<?php

namespace backend\assets;

use yii\web\AssetBundle;

class CommonAssetAdd extends AssetBundle
{

     public $baseUrl = '@web/common/';

    public $css = [     
        'css/custom.css',               
    ];
    public $js = [
         
         'js/common2.js',
    ];
    public $depends = [
       
    ];
}