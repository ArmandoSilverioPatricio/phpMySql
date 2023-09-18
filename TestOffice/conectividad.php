<?php
date_default_timezone_set('America/Mexico_City');

$path = "/home/masteruser/Crones/ConectividadUpfield/";
//---- Requires ----//
   require "{$path}PHPMailer/class.phpmailer.php";
   require "{$path}PHPMailer/class.smtp.php";
   require "{$path}SimpleXLSXGen.php";

   //---- Correo ----//
   $Mail       = new PHPMailer();
   $Mail->Host = "smtp-relay.gmail.com";
   $Mail->IsSMTP();
   $Mail->SMTPDebug = 0;
   $Mail->Mailer    = "smtp";
   $Mail->SMTPAuth  = FALSE;
   $Mail->Subject   = "Reporte de Conectividad";
   $Mail->From      = "no-reply@webmaps.com.mx";
   $Mail->FromName  = "Sistema de Rastreo";

   $fecha = date("Y-m-d H:i:s");

   $sql = "SELECT h.c_cliente_nombre AS CLIENTE,
                                        g.c_flotilla_nombre AS FLOTILLA,
                                        b.c_unidad_nombre AS Nombre,
                                        b.c_unidad_alias AS ALIAS,
                                        b.c_unidad_vin AS VIN,
                                        b.c_unidad_placa AS PLACA,
                                        b.c_unidad_marca AS MARCA,
                                        b.c_unidad_modelo AS SUBMARCA,
                                        b.c_unidad_anio AS MODELO,
                                        b.c_unidad_color AS COLOR,
                                        b.c_unidad_centrocostos AS CC,
                                        d.c_dispositivo_imei AS IMEI,
                                        d.c_dispositivo_linea AS LINEA,
                                        j.c_apn_nombre AS APN,
                                        a.d_ultimaposicion_fechaequipo AS FECHA,
                                        i.c_evento_nombre AS EVENTO,
                                        a.n_ultimaposicion_longitude/60 AS LON,
                                        a.n_ultimaposicion_latitude/60 AS LAT,
                                        a.c_ultimaposicion_direccion AS DIRECCIO                                          N,
                                        a.n_ultimaposicion_velocidad AS VELOCIDA                                          D,
                                        a.n_ultimaposicion_odometro AS ODOMETRO,
                                        a.n_ultimaposicion_orientacion AS RUMBO,
                                        a.n_ultimaposicion_bateria AS BATERIA_PO                                          RCENTAJE,
                                        a.n_ultimaposicion_nsatelites AS SATELIT                                          ES,
                                        IF(a.n_estadounidad_id = 1, 'Encendido',                                           'Apagado') AS IGNICION,
                                        IF(TIMEDIFF(NOW(),a.d_ultimaposicion_fec                                          haequipo) = '838:59:59', '> 1 Mes', TIMEDIFF(NOW(),a.d_ultimaposicion_fechaequip                                          o)) AS TIEMPO_SIN_REPORTAR,
                                                                               (                                          SELECT c_controlventa_id from dat_controlventa where n_controlventa_id = b.n_uni                                          dad_controlventa) AS IDCONTROLVENTA,
                                                                               (                                          SELECT c_controlventa_codigoproducto from dat_controlventa where n_controlventa_                                          id = b.n_unidad_controlventa) AS CODIGOPRODUCTO,
                                                                               (                                          SELECT c_controlventa_versionproducto from dat_controlventa where n_controlventa                                          _id = b.n_unidad_controlventa) AS VERSIONPRODUCTO,
                                                                               (                                          SELECT c_controlventa_etapacomercial from dat_controlventa where n_controlventa_                                          id = b.n_unidad_controlventa) AS ETAPACOMERCIAL,
                                                                               (                                          SELECT c_controlventa_estadovehiculo from dat_controlventa where n_controlventa_                                          id = b.n_unidad_controlventa) AS ESTADOVEHICULO
                                        FROM dat_UltimaPosicion a, dat_Unidad b,                                           rel_UnidadDispositivo c, dat_Dispositivo d, cat_TipoDispositivo e, rel_UnidadFl                                          otilla f, dat_Flotilla g, dat_Cliente h, dat_Evento i, cat_Apn j
                                        WHERE a.n_unidad_id = b.n_unidad_id
                                        AND b.n_unidad_id = f.n_unidad_id
                                        AND i.n_evento_id = a.n_evento_id
                                        AND g.n_flotilla_id = f.n_flotilla_id
                                        AND h.n_cliente_id = b.n_cliente_id
                                        AND h.n_estatus_id = 1
                                        AND g.n_estatus_id = 1
                                        AND f.n_estatus_id = 1
                                        AND b.n_unidad_id = c.n_unidad_id
                                        AND c.n_dispositivo_id = d.n_dispositivo                                          _id
                                        AND e.n_tipodispositivo_id = d.n_tipodis                                          positivo_id
                                        AND b.n_estatus_id=1
                                        AND c.n_estatus_id = 1
                                        AND d.n_estatus_id=4
                                        AND e.n_estatus_id = 1
                                        AND d.n_apn_id = j.n_apn_id
                                        ORDER BY b.c_unidad_alias ASC;";

$arrRows = [
   ['Fecha de Generacion',
         'Cliente',
         'Flotilla',
                 'Nombre',
                 'Alias',
                 'VIN',
                 'Placa',
                 'Marca',
                 'Submarca',
                 'Year',
                 'Color',
                 'Centro de Costos',
                 'IMEI',
                 'Linea',
                 'APN',
                 'Fecha',
                 'Evento',
                 'Longitud',
                 'Latitud',
                 'Direccion',
                 'Velocidad [km/h]',
                 'Odometro[km]',
                 'Rumbo',
                 'Bateria [%]',
                 'Satelites',
                 'Ignicion',
                 'Tiempo sin Reporte',
                                 'ID de Serivicio',
                                 'Codigo de Producto',
                                 'Version de producto',
                                 'Etapa Comercial',
                                 'Estado del Vehículo'
                 ]
];
$i = 1;

if($conn = mysqli_connect("70.35.206.163", "thernandez", "J33pP4tr10t", "stopntr                                          ack")){
   if($result = mysqli_query($conn, $sql)){
      while($row = mysqli_fetch_array($result)){
             $datetime1 = new DateTime();
             $datetime2 = new DateTime($row[14]);

             $interval = $datetime1->diff($datetime2);

             $elapsed = $interval->format('%a d, %h hrs, %i min');

             $arrRows[$i] = array($fecha, Limpiar($row[0]),
                                                    Limpiar($row[1]),
                                                                                                                          Limpiar($row[2]),
                                                                                                                          Limpiar($row[3]),
                                                                                                                          Limpiar($row[4]),
                                                                                                                          Limpiar($row[5]),
                                                                                                                          Limpiar($row[6]),
                                                                                                                          Limpiar($row[7]),
                                                                                                                          Limpiar($row[8]),
                                                                                                                          Limpiar($row[9]),
                                                                                                                          Limpiar($row[10]),
                                                                                                                          Limpiar($row[11]),
                                                                                                                          Limpiar($row[12]),
                                                                                                                          Limpiar($row[13]),
                                                                                                                          Limpiar($row[14]),
                                                                                                                          Limpiar($row[15]),
                                                                                                                          Limpiar($row[16]),
                                                                                                                          Limpiar($row[17]),
                                                                                                                          Limpiar($row[18]),
                                                                                                                          Limpiar($row[19]),
                                                                                                                          Limpiar($row[20]),
                                                                                                                          Limpiar($row[21]),
                                                                                                                          Limpiar($row[22]),
                                                                                                                          Limpiar($row[23]),
                                                                                                                          Limpiar($row[24]),
                                                                               $                                          elapsed,
                                                                               L                                          impiar($row[26]),
                                                                               L                                          impiar($row[27]),
                                                                               L                                          impiar($row[28]),
                                                                               L                                          impiar($row[29]),
                                                                               L                                          impiar($row[30])
                                                                                                                          );
      $i++;
      }
   }
}

//$file = "conectividad_".date("Ymd").".xlsx";
$file = "conectividad_".date("Ymd").".csv";
//$xlsx = SimpleXLSXGen::fromArray($arrRows);
//$xlsx->saveAs("{$path}tmp/".$file);

if(count($arrRows) > 0){
   $fp = fopen("{$path}tmp/".$file, 'w');
   foreach($arrRows as $row){
      fputcsv($fp, $row);
   }
   fclose($fp);
}

$Mail->AddAttachment("{$path}tmp/".$file, $file);
//$cuerpo = "Estimado Usuario, se adjunta un reporte en formato Microsoft Excel                                           con el Reporte de Conectividad de sus unidades.";
$cuerpo = "Estimado Usuario, se adjunta un reporte en formato CSV con el Reporte                                           de Conectividad de sus unidades.";

$Mail->AddAddress("data@stopntrack.com.mx");
//$Mail->addBCC("carlos.martinez@webmaps.com.mx");
$Mail->addBCC("erik.castro@infosite.com.mx");
$Mail->addBCC("idali.roa@infosite.com.mx");

$Mail->MsgHTML($cuerpo);

 if($Mail->Send())
    echo date("d/m/Y H:i:s").": Mail OK\n";
 else
   echo date("d/m/Y H:i:s").": ".$Mail->ErrorInfo."\n";

$Mail->ClearAddresses();


function Limpiar($string = ""){
   return utf8_encode($string);
}
