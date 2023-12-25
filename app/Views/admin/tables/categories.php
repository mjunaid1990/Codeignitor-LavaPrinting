<?php
$catModel = new \App\Models\CategoriesModel();

$aColumns = [
    'id',
    'parent_id',
    'name',
    ];

$sIndexColumn = 'id';
$sTable       = 'categories';

$join = [];

$result  = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, [], []);

$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];
    $parent = '';
    if($aRow['parent_id']) {
        $parent = $catModel->get($aRow['parent_id']);
    }
    
    $numberOutput = '';
    $numberOutput .= '<a class="" href="' . site_url('/admin/categories/edit/' . $aRow['id']) . '">' . '<i class="fa fa-edit"></i>' . '</a>';
    $numberOutput .= ' | <a class="text-red" href="' . site_url('/admin/categories/delete/' . $aRow['id']) . '">' . '<i class="fa fa-trash"></i>' . '</a>';
    
    $row[] = $aRow['id'];
    
    $row[] = $parent?$parent->name:'';
    
    $row[] = $aRow['name'];
    
    $row[] = $numberOutput;

    $output['aaData'][] = $row;
}
