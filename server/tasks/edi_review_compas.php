<?php
    if(is_array($_FILES['file-1']) && count($_FILES['file-1'])>0) {

        require '../../vendor/autoload.php';
        require "session_modules.php";
        session_modules();
        require "jsonType.php";

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
        
        $curPart = "";
        $curRAN = "";
        $quant = "";
        $curDate = "";
        $lote = "";
        $supplier = "";
        $molino = "";
        $pesoPlaca = "";
        $ancho = "";
        $avance = "";
        $espesor = "";
        $fechaIngreso = "";
        $numInspeccion = "";
        $curDesc = "";
        $pesoRollo = "";
        $yp = "";
        $ts = "";
        $el = "";
        $top = "";
        $bottom = "";
        $fechaLaser = "";
        $numEriccsen = "";
        $fechaCaducidad = "";
        $fechaEmbarque = "";
        $lbls[] = "";
        $nLabel = 0;

        $time = "";
        $curLoc[0] = "";
        $curLoc[1] = "";
        $curLoc[2] = "";
        $curLoc[3] = "";
        
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        
        $inputFileName = $_FILES['file-1']['tmp_name'];
        
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
        
        /*
        for ($row = 2; $row <= $highestRow; $row++)
        {
            $lbls[$row] = array (
                "supplier" => $sheet->getCell("A".$row)->getValue(),
                "part" => $sheet->getCell("A".$row)->getValue(),
                "desc" => $sheet->getCell("o".$row)->getValue(),
                "date" => $sheet->getCell("D".$row)->getValue(),
                "ran" => $sheet->getCell("C".$row)->getValue(),
                "quant" => $sheet->getCell("B".$row)->getValue(),
                "time" => $sheet->getCell("E".$row)->getValue(),
                "loc1" => $sheet->getCell("F".$row)->getValue(),
                "loc2" => $sheet->getCell("G".$row)->getValue(),
                "loc3" => $sheet->getCell("H".$row)->getValue(),
                "loc4" => $sheet->getCell("I".$row)->getValue(),
            );
        }
        */
        
        for ($row = 2; $row <= $highestRow; $row++)
        {
            $curPart = strval($sheet->getCell("A".$row)->getValue());
            $curRAN = strval($sheet->getCell("C".$row)->getValue());
            $quant = strval($sheet->getCell("B".$row)->getValue());
            $curDate = strval($sheet->getCell("J".$row)->getValue());
            $lote = strval($sheet->getCell("K".$row)->getValue());
            $supplier = strval($sheet->getCell("L".$row)->getValue());
            $molino = strval($sheet->getCell("W".$row)->getValue());
            $pesoPlaca = strval($sheet->getCell("M".$row)->getValue());
            $ancho = strval($sheet->getCell("X".$row)->getValue());
            $avance = strval($sheet->getCell("Y".$row)->getValue());
            $espesor = strval($sheet->getCell("Z".$row)->getValue());
            $fechaIngreso = strval($sheet->getCell("P".$row)->getValue());
            $numInspeccion = strval($sheet->getCell("N".$row)->getValue());
            $curDesc = strval($sheet->getCell("O".$row)->getValue());
            $pesoRollo = strval($sheet->getCell("Q".$row)->getValue());
            $yp = strval($sheet->getCell("F".$row)->getValue());
            $ts = strval($sheet->getCell("G".$row)->getValue());
            $el = strval($sheet->getCell("H".$row)->getValue());
            $top = strval($sheet->getCell("U".$row)->getValue());
            $bottom = strval($sheet->getCell("V".$row)->getValue());
            $fechaLaser = strval($sheet->getCell("AA".$row)->getValue());
            $numEriccsen = strval($sheet->getCell("AB".$row)->getValue());
            $fechaCaducidad = strval($sheet->getCell("AC".$row)->getValue());
            $fechaEmbarque = strval($sheet->getCell("AD".$row)->getValue());
            $time = "1300";

            $sql = "INSERT INTO compas(supplier, part, currDesc, currDate, ran, quant, currTime, yp, ts, el, lote, molino, pesoPlaca, ancho, avance, espesor, fechaIngreso, numInspeccion, pesoRollo, top, bottom, fechaLaser, numEriccsen, fechaCaducidad, fechaEmbarque) VALUES ('$supplier','$curPart','$curDesc','$curDate','$curRAN','$quant','$time','$yp','$ts','$el','$lote','$molino','$pesoPlaca','$ancho','$avance','$espesor','$fechaIngreso','$numInspeccion','$pesoRollo','$top','$bottom','$fechaLaser','$numEriccsen','$fechaCaducidad','$fechaEmbarque')";
            $result = $connection->query($sql);
            
            $lbls[$nLabel] =  array(
                "part" => $curPart,
                "ran" => $curRAN,
                "cantidad" => $quant,
                "fechaPro" => $curDate,
                "lote" => $lote,
                "origen" => $supplier,
                "molino" => $molino,
                "pesoPlaca" => $pesoPlaca,
                "ancho" => $ancho,
                "avance" => $avance,
                "espesor" => $espesor,
                "fechaIngreso" => $fechaIngreso,
                "numInspeccion" => $numInspeccion,
                "curDesc" => $curDesc,
                "pesoRollo" => $pesoRollo,
                "yp" => $yp,
                "ts" => $ts,
                "el" => $el,
                "top" => $top,
                "bottom" => $bottom,
                "fechaLaser" => $fechaLaser,
                "numEriccsen" => $numEriccsen,
                "fechaCaducidad" => $fechaCaducidad,
                "fechaEmbarque" => $fechaEmbarque,
                "time" => $time,
            );
            $nLabel += 1;
        }
        /*

        foreach ($count as $row) {
            $supplier = 'MXX013429';
            $curPart = '901225NAEA';
            $curDesc = 'DRIVE ASSY - WS WIPER';
            $curDate = '13122021';
            $curRAN = 'FD92897A';
            $quant = '146';
            $time = '1300';
            $curLoc[0] = '138';
            $curLoc[1] = '303';
            $curLoc[2] = '47';
            $curLoc[3] = '1';
            //echo "<script>console.log('Debug Objects: " . $supplier . "' );</script>";
            
            $lbls[$nLabel] =  array(
                "supplier" => $supplier,
                "part" => $curPart,
                "desc" => $curDesc,
                "date" => $curDate,
                "ran" => $curRAN,
                "quant" => $quant,
                "time" => $time,
                "loc1" => $curLoc[0],
                "loc2" => $curLoc[1],
                "loc3" => $curLoc[2],
                "loc4" => $curLoc[3]
            );
            $nLabel += 1;
        }
        */

        require "../queries/generate_b64_Compas.php";    
    }

    header("location:../../pages/error.html")
    
?>
