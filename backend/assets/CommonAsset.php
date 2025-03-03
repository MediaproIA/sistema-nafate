<?php

namespace backend\assets;

use yii\web\AssetBundle;

class CommonAsset extends AssetBundle
{

     public $baseUrl = '@web/common/';

    public $css = [     
        'css/custom.css',               
    ];
    public $js = [
         
         'js/common.js',
    ];
    public $depends = [
       
    ];
}