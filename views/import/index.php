<?php
$this->title = 'Import Jadwal   ';
$this->params['breadcrumbs'][] = $this->title;

$namaKolom = array("sesi","waktu","kode_mk","mk","status","d1","d2","d3","i1","i2","group","ruangan");

$objPHPExcel = PHPExcel_IOFactory::load('../web/file/roster1.xlsx');
$dataArr = array();
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle = $worksheet->getTitle();
    $highestRow = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

    for ($row = 6; $row <= $highestRow; ++$row) {
        //for ($col = 0; $col < $highestColumnIndex; ++$col) {
        for ($col = 0; $col < 12; ++$col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            $dataArr[$row][$namaKolom[$col]] = $val;
        }
    }
}

unset($dataArr[1]); // since in our example the first row is the header and not the actual data

print '<pre>';
print_r($dataArr);


?>
