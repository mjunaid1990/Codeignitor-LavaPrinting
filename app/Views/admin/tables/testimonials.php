<?php


$aColumns = [
    'id',
    'name',
    'description'
    ];

$sIndexColumn = 'id';
$sTable       = 'testimonials';

$join = [];

$result  = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, [], []);

$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];
    
    $numberOutput = '';
    $numberOutput .= '<a class="" href="' . site_url('/admin/testimonials/edit/' . $aRow['id']) . '">' . '<i class="fa fa-edit"></i>' . '</a>';
    $numberOutput .= ' | <a class="text-red" href="' . site_url('/admin/testimonials/delete/' . $aRow['id']) . '">' . '<i class="fa fa-trash"></i>' . '</a>';
    
    $row[] = $aRow['id'];
    
    $row[] = $aRow['name'];
    
    $row[] = $aRow['description'];
    
    $row[] = $numberOutput;

    $output['aaData'][] = $row;
}
