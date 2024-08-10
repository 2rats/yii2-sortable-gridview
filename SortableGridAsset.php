<?php
/**
 * @link https://github.com/himiklab/yii2-sortable-grid-view-widget
 * @copyright Copyright (c) 2014-2017 HimikLab
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace rats\sortablegrid;

use yii\web\AssetBundle;

class SortableGridAsset extends AssetBundle
{
    public $sourcePath = '@rats/sortablegrid/assets';

    public $js = [
        'js/jquery.sortable.gridview.js',
    ];

    public $depends = [
        'yii\jui\JuiAsset',
    ];
}
