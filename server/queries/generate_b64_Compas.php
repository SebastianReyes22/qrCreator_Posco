<?php
    require '../../vendor/autoload.php';
    require "getSerial_Compas.php";
    require "barcode.php";

    //use Picqer\Barcode\BarcodeGeneratorPNG;
    
    const start = "";
    const end = "";

    if(!is_array($lbls) || empty($lbls)){ exit(jsonERR("No se pueden generar las etiquetas")); }
    $codeArray[] = "";
    $serial = 634;
    foreach ($lbls as $index => $data) {
        if(isset($data['part'],$data['ran'],$data['cantidad'],$data['fechaPro'],$data['lote'],$data['origen'],$data['molino'],$data['pesoPlaca'],$data['ancho'],$data['avance'],$data['espesor'],$data['fechaIngreso'],$data['numInspeccion'],$data['curDesc'],$data['pesoRollo'],$data['yp'],$data['ts'],$data['el'],$data['top'],$data['bottom'],$data['fechaLaser'],$data['numEriccsen'],$data['fechaCaducidad'],$data['fechaEmbarque'],$data['time'])){
            $codeArray[$index] = genLblCodes($data,$serial+$index);
        }else{
            exit(jsonERR("No se recibieron todos los datos"));
        }    
    }
    setSerial($serial+$index+1);
    exit(json_encode(
        array(
            "status" => "OK",
            "codes" => $codeArray,
            "labels" => $lbls
        )
    ));
    function genLblCodes($data,$serial){

        //Revisión del serial
        if((empty($serial) && $serial!=0) || !is_numeric($serial) || $serial<0){
            exit(jsonERR("Hay un error con el serial"));
        }
        
        //Revisión de la parte 
        if(empty($data['part']) || strlen($data['part'])>13){
            exit(jsonERR("Hay un error con la parte"));
        }

        //Revisión del ran
        if(empty($data['ran']) || strlen($data['ran'])>8){
            exit(jsonERR("Hay un error con el ran"));
        }

        //Revisión de la cantidad de plantillas
        if(empty($data['cantidad']) || strlen($data['cantidad'])>4){
            exit(jsonERR("Hay un error con la cantidad"));
        }

        //Revisión de la fecha de producción
        if(empty($data['fechaPro']) || strlen($data['fechaPro'])>8){
            exit(jsonERR("Hay un error con la fecha de producción"));
        }

        //Revisión del lote
        if(empty($data['lote']) || strlen($data['lote'])>20){
            exit(jsonERR("Hay un error con el lote"));
        }

        //Revisión del origen
        if(empty($data['origen']) || strlen($data['origen'])>50){
            exit(jsonERR("Hay un error con el origen"));
        }
        
        //Revisión del molino
        if(empty($data['molino']) || strlen($data['molino'])>20){
            exit(jsonERR("Hay un error con el molino"));
        }
        
        //Revisión del peso de la placa de plantillas
        if(empty($data['pesoPlaca']) || strlen($data['pesoPlaca'])>7){
            exit(jsonERR("Hay un error con la fecha de producción"));
        }

        //Revisión del ancho
        if(empty($data['ancho']) || strlen($data['ancho'])>4){
            exit(jsonERR("Hay un error con el ancho"));
        }

        //Revisión del avance
        if(empty($data['avance']) || strlen($data['avance'])>4){
            exit(jsonERR("Hay un error con el avance"));
        }

        //Revisión del espesor de la plantilla
        if(empty($data['espesor']) || strlen($data['espesor'])>4){
            exit(jsonERR("Hay un error con el espesor"));
        }

        //Revisión de la fecha de ingreso del rollo a planta
        if(empty($data['fechaIngreso']) || strlen($data['fechaIngreso'])>8){
            exit(jsonERR("Hay un error con la fecha de ingreso de rollo a planta"));
        }

        //Revisión del número de inspección
        if(empty($data['numInspeccion']) || strlen($data['numInspeccion'])>20){
            exit(jsonERR("Hay un error con el número de inspección"));
        }

        //Revisión de la especificación
        if(empty($data['curDesc']) || strlen($data['curDesc'])>15){
            exit(jsonERR("Hay un error con la especificación"));
        }

        //Revisión del peso total del rollo
        if(empty($data['pesoRollo']) || strlen($data['pesoRollo'])>7){
            exit(jsonERR("Hay un error con el peso total del rollo"));
        }

        //Revisión del yp
        if(empty($data['yp']) || strlen($data['yp'])>6){
            exit(jsonERR("Hay un error con el YP"));
        }

        //Revisión del ts
        if(empty($data['ts']) || strlen($data['ts'])>6){
            exit(jsonERR("Hay un error con el TS"));
        }

        //Revisión del el
        if(empty($data['el']) || strlen($data['el'])>6){
            exit(jsonERR("Hay un error con el EL"));
        }

        //Revisión del top
        if(empty($data['top']) || strlen($data['top'])>6){
            exit(jsonERR("Hay un error con el TOP"));
        }

        //Revisión del bottom
        if(empty($data['bottom']) || strlen($data['bottom'])>6){
            exit(jsonERR("Hay un error con el BOTTOM"));
        }

        //Revisión de la fehca de aplicación del laser
        if(empty($data['fechaLaser']) || strlen($data['fechaLaser'])>8){
            exit(jsonERR("Hay un error con la fehca de aplicación del laser"));
        }

        //Revisión del número de certificación del Ericcsen
        if(empty($data['numEriccsen']) || strlen($data['numEriccsen'])>19){
            exit(jsonERR("Hay un error con el número de certificación del Ericcsen"));
        }

        //Revisión de la fecha de caducidad de aluminio
        if(empty($data['fechaCaducidad']) || strlen($data['fechaCaducidad'])>8){
            exit(jsonERR("Hay un error con la fecha de caducidad de aluminio"));
        }

        //Revisión de la fecha de embarque
        if(empty($data['fechaEmbarque']) || strlen($data['fechaEmbarque'])>8){
            exit(jsonERR("Hay un error con fecha de embarque"));
        }

        //Revisión de la hora
        if(empty($data['time'])){
            exit(jsonERR("Hay un error con la hora"));
        }
        

        //Creación del texto del QR
        $code = start;
        $code .= str_pad($data['part'],13,' ');
        $code .= str_pad($data['ran'],8,' ');
        $code .= str_pad($data['cantidad'],4,'0',STR_PAD_LEFT);
        $code .= str_pad($data['fechaPro'],8,'0',STR_PAD_LEFT);
        $code .= str_pad($data['lote'],20,' ');
        $code .= str_pad($data['origen'],50,' ');
        $code .= str_pad($data['molino'],20,' ');
        $code .= str_pad($data['pesoPlaca'],7,'0',STR_PAD_LEFT);
        $code .= str_pad($data['ancho'],4,'0',STR_PAD_LEFT);
        $code .= str_pad($data['avance'],4,'0',STR_PAD_LEFT);
        $code .= str_pad($data['espesor'],4,'0',STR_PAD_LEFT);
        $code .= str_pad($data['fechaIngreso'],8,'0', STR_PAD_LEFT);
        $code .= str_pad($data['numInspeccion'],20,' ');
        $code .= str_pad($data['curDesc'],15,' ');
        $code .= str_pad($data['pesoRollo'],7,'0',STR_PAD_LEFT);
        $code .= str_pad($data['yp'],6,'0',STR_PAD_LEFT);
        $code .= str_pad($data['ts'],6,'0',STR_PAD_LEFT);
        $code .= str_pad($data['el'],6,'0',STR_PAD_LEFT);
        $code .= str_pad($data['top'],6,'0',STR_PAD_LEFT);
        $code .= str_pad($data['bottom'],6,'0',STR_PAD_LEFT);
        $code .= str_pad($data['fechaLaser'],8,' ');
        $code .= str_pad($data['numEriccsen'],19,' ');
        $code .= str_pad($data['fechaCaducidad'],8,' ');
        $code .= str_pad($data['fechaEmbarque'],8,' ');
        $code .= end;

        //$code =  start.$part.$snp.$ran.$supplier.$serial.$loc1.$loc2.$loc3.$loc4.$data['date'].$data['time'].$free.end;
        
        //Creación del QR y las barras
        return array(
                "qr"    => genQRCode($code),
                "part"  => genBarCode("P".$data['part'],2),//genBarImg("P".$data['part'],2,30),
                "quant" => genBarCode("Q".$data['cantidad'],1.5),//genBarImg("Q".$data['quant'],1,38),
                "ran"   => genBarCode("15K".$data['ran'],1.5),//genBarImg("15K".$data['ran'],1,30),
                "sup"   => genBarCode("V".$data['origen'],1.5),//genBarImg("V".$data['supplier'],2,30),
                "serial" => strval($serial),
                "serialCode"=> genBarCode("4S".$serial,1.3),//genBarImg("4S".$serial,1,30),
            );
    }
    
    function genBarImg($text,$width,$height){
        $generator = new BarcodeGeneratorPNG();
        return "data:image/png;base64,".base64_encode($generator->getBarcode($text, $generator::TYPE_CODE_39,$width,$height));
    }

    function genBarCode($code,$sizeFactor){
        //Directorio donde estará el archivo
        $tempDir = '../bars/';

        //Se genera el nombre del archivo
        $fileName = md5($code).'.png';

        //Se revisa si existe el directorio si no se crea
        if(!is_dir($tempDir)){
            if(!mkdir($tempDir, 0777)){
                exit(jsonERR("No se pudo crear la carpeta"));
            }
        }
    
        $pngAbsoluteFilePath = $tempDir.$fileName;
    
        // Generando la imagen del código de barras
        if(!file_exists($pngAbsoluteFilePath)){
            barcode( $pngAbsoluteFilePath , $code , "30" , "horizontal", "code39", false, $sizeFactor );
        }

        // Cargando la imagen
        $data = file_get_contents($pngAbsoluteFilePath);
        if($data === false) { exit(jsonERR("No se pudo consultar la imagen")); }

        // Decodificando la imagen en base64
        $base64 = base64_encode($data);
        if(!$base64){ exit(jsonERR("No se pudo codificar la imagen")); }
        $base64 = 'data:image/png;base64,'.$base64;
    
        // Eliminando la imagen
        unlink($pngAbsoluteFilePath);

        return $base64;
    }

    function genQRCode($code){

        //Directorio donde estará el archivo
        $tempDir = '../qr/';

        //Se genera el nombre del archivo
        $fileName = md5($code).'.png';

        //Se revisa si existe el directorio si no se crea
        if(!is_dir($tempDir)){
            if(!mkdir($tempDir, 0777)){
                exit(jsonERR("No se pudo crear la carpeta"));
            }
        }
    
        $pngAbsoluteFilePath = $tempDir.$fileName;
    
        // Generando la imagen con el qr
        if(!file_exists($pngAbsoluteFilePath)){
            QRcode::png($code, $pngAbsoluteFilePath,QR_ECLEVEL_L,2.3,0);
        }

        // Cargando la imagen
        $data = file_get_contents($pngAbsoluteFilePath);
        if($data === false) { exit(jsonERR("No se pudo consultar la imagen")); }

        // Decodificando la imagen en base64
        $base64 = base64_encode($data);
        if(!$base64){ exit(jsonERR("No se pudo codificar la imagen")); }
        $base64 = 'data:image/png;base64,'.$base64;
    
        // Eliminando la imagen
        unlink($pngAbsoluteFilePath);

        return $base64;
    }
?>
