<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\yii2language\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MainAsset extends AssetBundle
{
    public $sourcePath = '@yii2language/assets';
    public $js = [
        'main/js/ajax_save.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}