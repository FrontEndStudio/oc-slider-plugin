<?php return [
    'plugin' => [
        'name' => 'Slider',
        'description' => 'Slider'
    ],
    'components' => [
        'list_title' => 'Slider list',
        'list_description' => 'List active slider items',
        'list_sorting' => 'Sorting',
        'list_sort_column' => 'Column',
        'list_sort_column_description' => 'Column to sort on',
        'list_sort_direction' => 'Direction',
        'list_order_direction_asc' => 'asc',
        'list_order_direction_desc' => 'desc',
        'list_no_records' => 'No records message',
        'list_no_records_description' => 'Message to display in the list in case if there are no records. Used in the default component\'s partial.',
        'list_no_records_default' => 'No records found'
    ],
    'sliderdata' => [
        'id' => 'Id',
        'title' => 'Title',
        'show_title' => 'Show title',
        'status' => 'Status',
        'image' => 'Image',
        'images' => 'Images',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'sort_order' => 'Sort Order',
        'delete_confirm' => 'Are you sure you want to delete the selected items'
    ],
    'inject_jquery' => [
        'title' => 'Inject jQuery',
        'description' => 'Whether to inject jQuery or not',
        'optionsyes' => 'Yes',
        'optionsno' => 'No'
    ],
    'inject_js' => [
        'title' => 'Inject JavaScript',
        'description' => 'Whether to inject JavaScript or not',
        'optionsyes' => 'Yes',
        'optionsno' => 'No'
    ],
    'inject_css' => [
        'title' => 'Inject CSS',
        'description' => 'Whether to inject CSS or not',
        'optionsyes' => 'Yes',
        'optionsno' => 'No'
    ]

];
