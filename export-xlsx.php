<!-- RAH Code -->

<?php
    $file = $_GET['file'];

    require 'vendor/autoload.php';
    require 'conn.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    $sqlFile = $_GET['sql'];
    $rowFile = $mysqli->query($sqlFile);

    $excel = new Spreadsheet();
    $activePage = $excel->getActiveSheet();
    $activePage->setTitle("Inventory - RAH Code");

    $activePage->setCellValue('A1', 'Id');
    $activePage->setCellValue('B1', 'Type');
    $activePage->setCellValue('C1', 'Model');
    $activePage->setCellValue('D1', 'Quantity');
    $activePage->setCellValue('E1', 'Cost');

    $fila = 2;

    while($rows = $rowFile->fetch_assoc()){
        
    }
?>