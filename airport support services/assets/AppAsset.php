<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css',
        'gentelella-master/vendors/font-awesome/css/font-awesome.min.css',
        'gentelella-master/vendors/nprogress/nprogress.css',
        'gentelella-master/build/css/custom.min.css',
        'css/site.css',

    ];
    public $js = [

        //'gentelella-master/vendors/jquery/dist/jquery.min.js',
        'gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js',
        'gentelella-master/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js',
        'gentelella-master/vendors/nprogress/nprogress.js',
        'gentelella-master/vendors/fastclick/lib/fastclick.js',
        'gentelella-master/build/js/custom.min.js',
        'js/modal.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
