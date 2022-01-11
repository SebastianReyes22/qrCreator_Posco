<?php
    
    require '../../vendor/autoload.php';
    //require "session_modules.php";
    //session_modules();
    //require "jsonType.php";
    
    $connection = mysqli_connect("localhost","root","","etiquetado");

    class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

        public function readCell($columnAddress, $row, $worksheetName = '') {
            // Read title row and rows 20 - 30
            if ($row>1) {
                return true;
            }
            return false;
        }
    }
    
    $supplier = "";
    $curPart = "";
    $curDesc = "";
    $curDate = "";
    $curRAN = "";
    $quant = "";
    $time = "";
    $yp = "";
    $ts = "";
    $el = "";
    $block = "";
    $lbls[] = "";
    $nLabel = 0;

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    
    $inputFileName = 'compa.xlsx';
    
    /**  Identify the type of $inputFileName  **/
    $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
    /**  Create a new Reader of the type that has been identified  **/
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    $reader->setReadFilter( new MyReadFilter() );
    /**  Load $inputFileName to a Spreadsheet Object  **/
    $spreadsheet = $reader->load($inputFileName);

    $count = $spreadsheet->getActiveSheet()->toArray();

    $sheet = $spreadsheet->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
    
    for ($row = 2; $row <= $highestRow; $row++)
    {
        $supplier = $sheet->getCell("L".$row)->getValue();
        $curPart = $sheet->getCell("A".$row)->getValue();
        $curDesc = $sheet->getCell("O".$row)->getValue();
        $curDate = $sheet->getCell("D".$row)->getValue();
        $curRAN = $sheet->getCell("C".$row)->getValue();
        $quant = $sheet->getCell("B".$row)->getValue();
        $time = $sheet->getCell("E".$row)->getValue();
        $yp = $sheet->getCell("F".$row)->getValue();
        $ts = $sheet->getCell("G".$row)->getValue();
        $el = $sheet->getCell("H".$row)->getValue();
        $block = $sheet->getCell("I".$row)->getValue();

        $sql = "INSERT INTO compas(supplier, part, currDesc, currDate, ran, quant, currTime, yp, ts, el, currBlock) VALUES ('$supplier','$curPart','$curDesc','$curDate','$curRAN','$quant','$time','$yp','$ts','$el','$block')";
        $result = $connection->query($sql);

        $getData = "SELECT * FROM compas";
    }
    //require "../queries/generate_b64_Compas.php";
?>