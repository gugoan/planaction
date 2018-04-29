<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Leda Ferreira <ledat.ferreira@gmail.com>
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'plugins/iCheck/square/blue.css',
    ];
    public $js = [
        'plugins/iCheck/icheck.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
