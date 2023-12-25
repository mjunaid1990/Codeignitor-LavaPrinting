<?php


$aColumns = [
    'id',
    'name',
    'email',
    'phone',
    'product',
    'stock_type',
//    'product_width',
//    'product_length',
//    'product_depth',
//    'product_unit',
//    'color',
    'qty',
//    'qty2',
//    'qty3',
//    'file',
//    'instructions',
    'created_at',
    
    ];

$sIndexColumn = 'id';
$sTable       = 'quotes';

$join = [];

$result  = data_tables_init($aColumns, $sIndexColumn, $sTable, $join, [], []);

$output  = $result['output'];
$rResult = $result['rResult'];

foreach ($rResult as $aRow) {
    $row = [];
    
    $numberOutput = '';
    $numberOutput .= '<a class="" href="' . site_url('/admin/quotes/view/' . $aRow['id']) . '">' . '<i class="fa fa-eye"></i>' . '</a>';
    
    
    $row[] = $aRow['id'];
    
    $row[] = $aRow['name'];
    
    $row[] = $aRow['email'];
    
    $row[] = $aRow['phone'];
    
    $row[] = $aRow['product'];
    
    $row[] = $aRow['stock_type'];
    
//    $row[] = $aRow['product_width'];
//    
//    $row[] = $aRow['product_length'];
//    
//    $row[] = $aRow['product_depth'];
//    
//    $row[] = $aRow['product_unit'];
//    
//    $row[] = $aRow['color'];
    
    $row[] = $aRow['qty'];
    
//    $row[] = $aRow['qty2'];
//    
//    $row[] = $aRow['qty3'];
//    
//    $row[] = $aRow['file'];
//    
//    $row[] = $aRow['instructions'];
    
    $row[] = $aRow['created_at'];
    
    $row[] = $numberOutput;

    $output['aaData'][] = $row;
}
