<?php


$aColumns = [
    'id',
    'name',
    'slug'
    ];

$sIndexColumn = 'id';
$sTable       = 'pages';

$join = [];

$result  = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, [], []);

$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];
    
    $numberOutput = '';
    $numberOutput .= '<a class="" href="' . site_url('/admin/pages/edit/' . $aRow['id']) . '">' . '<i class="fa fa-edit"></i>' . '</a>';
    $numberOutput .= ' | <a class="text-red" href="' . site_url('/admin/pages/delete/' . $aRow['id']) . '">' . '<i class="fa fa-trash"></i>' . '</a>';
    
    $row[] = $aRow['id'];
    
    $row[] = $aRow['name'];
    
    $row[] = $aRow['slug'];
    
    $row[] = $numberOutput;

    $output['aaData'][] = $row;
}
