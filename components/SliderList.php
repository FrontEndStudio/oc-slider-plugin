<?php namespace Fes\Slider\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Lang;
use Exception;
use SystemException;

use Fes\Slider\Models\Lists as ListsModel;

class SliderList extends ComponentBase
{

    public $records;
    public $noRecordsMessage;
    public $extraData;

    public function componentDetails()
    {
        return [
            'name'        => 'fes.slider::lang.components.list_title',
            'description' => 'fes.slider::lang.components.list_description'
        ];
    }

    //
    // Properties
    //

    public function defineProperties()
    {
        return [
            'sortColumn' => [
                'title'       => 'fes.slider::lang.components.list_sort_column',
                'description' => 'fes.slider::lang.components.list_sort_column_description',
                'type'        => 'autocomplete',
                'group'       => 'fes.slider::lang.components.list_sorting',
                'showExternalParam' => false,
                'default'      => 'sort_order'
            ],
            'sortDirection' => [
                'title'       => 'fes.slider::lang.components.list_sort_direction',
                'type'        => 'dropdown',
                'showExternalParam' => false,
                'group'       => 'fes.slider::lang.components.list_sorting',
                'options'     => [
                    'asc'     => 'fes.slider::lang.components.list_order_direction_asc',
                    'desc'    => 'fes.slider::lang.components.list_order_direction_desc'
                ]
            ],
            'noRecordsMessage' => [
                'title'        => 'fes.slider::lang.components.list_no_records',
                'description'  => 'fes.slider::lang.components.list_no_records_description',
                'type'         => 'string',
                'default'      => Lang::get('fes.slider::lang.components.list_no_records_default'),
                'showExternalParam' => false,
            ]
        ];
    }

    public function getSortColumnOptions()
    {
        $columnNames = ['id', 'title', 'sort_order'];
        $result = [];

        foreach ($columnNames as $columnName) {
            $result[$columnName] = $columnName;
        }

        return $result;

    }

    //
    // Rendering and processing
    //

    public function onRun()
    {

        $this->prepareVars();
        $this->records = $this->page['records'] = $this->listRecords();
    }

    public function onRender()
    {
        $this->extraData = $this->page['extraData'] = $this->property('extraData');
    }

    protected function prepareVars()
    {

        $this->noRecordsMessage = $this->page['noRecordsMessage'] = Lang::get($this->property('noRecordsMessage'));
    }

    protected function listRecords()
    {
        //$modelClassName = 'Fes\Slider\Models\Lists';
        //$model = new $modelClassName();

      //return CarouselModel::select('id', 'name') -> orderBy('name') -> get() -> lists('name', 'id');

        $model = ListsModel::select();
        $model = $this->sort($model);
        return $model->where('status', '1')->get();
    }

    protected function sort($model)
    {

        $sortColumn = trim($this->property('sortColumn'));

        if (!strlen($sortColumn)) {
            return;
        }

        $sortDirection = trim($this->property('sortDirection'));

        if ($sortDirection !== 'desc') {
            $sortDirection = 'asc';
        }

        return $model->orderBy($sortColumn, $sortDirection);
    }
}
