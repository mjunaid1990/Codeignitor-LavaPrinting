<?php

$aColumns = [
    'id',
    'name',
    ];

$sIndexColumn = 'id';
$sTable       = 'banners';

$join = [];

$result  = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, [], []);

$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];
    
    $numberOutput = '';
    $numberOutput .= '<a class="" href="' . site_url('/admin/mybanners/edit/' . $aRow['id']) . '">' . '<i class="fa fa-edit"></i>' . '</a>';
    $numberOutput .= ' | <a class="text-red" href="' . site_url('/admin/mybanners/delete/' . $aRow['id']) . '">' . '<i class="fa fa-trash"></i>' . '</a>';
    
    $row[] = $aRow['id'];
    
    $row[] = $aRow['name'];
    
    $row[] = $numberOutput;

    $output['aaData'][] = $row;
}
