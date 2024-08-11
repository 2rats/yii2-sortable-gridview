<?php

/**
 * @link https://github.com/himiklab/yii2-sortable-grid-view-widget
 * @copyright Copyright (c) 2014-2017 HimikLab
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace rats\sortablegrid;

use yii\helpers\Url;
use yii\grid\GridView;

/**
 * Sortable version of Yii2 GridView widget.
 *
 * @author HimikLab
 * @package himiklab\sortablegrid
 */
class SortableGridView extends GridView
{
    /** @var string|array Sort action */
    public $sortableAction = ['sort'];

    public function init()
    {
        array_unshift($this->columns, [
            'contentOptions' => [
                'width' => 1,
                'style' => 'cursor:move; vertical-align:middle;',
                'class' => 'sortable-handle',
            ],
            'label' => false,
            'format' => 'raw',
            'value' => function () {
                return '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.2 9l-3 3 3 3M9 5.2l3-3 3 3M15 18.9l-3 3-3-3M18.9 9l3 3-3 3M3.3 12h17.4M12 3.2v17.6"/></svg>';
            },
        ]);

        parent::init();
        $this->sortableAction = Url::to($this->sortableAction);
    }

    public function run()
    {
        $this->registerWidget();
        parent::run();
    }

    protected function registerWidget()
    {
        $view = $this->getView();
        $view->registerJs("jQuery('#{$this->options['id']}').SortableGridView('{$this->sortableAction}');");
        SortableGridAsset::register($view);
    }
}
