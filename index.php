<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//        $dbName = $_SERVER["DOCUMENT_ROOT"] . "/access/VERDULEROS.mdb";
//        //if (!file_exists($dbName)) {
//           // die("Could not find database file.");
//            
//       // }
//                    echo $dbName.'<br><br><br>';
//      // $conexion = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$dbName", '', '');
//       $conexion = odbc_connect('VERDULEROS', 'rootasdasd', 'root');
//        //$conexion = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=$dbName; Uid=; Pwd=;");
//        echo $conexion;
        
$dsn="VERDULEROS";
$user="root";
$password="root";
$conexion=odbc_connect($dsn,$user,$password);
    echo "Conectando a Access...... <br>";
       if(!$conexion)
       {
                 die("No se pudo establecer la conexion con MS Access");
       }
        else
        {
            echo '<br>  '. $conexion.' ';
            echo "<br>Se Conectó a Access exitosamente! :D";
        }

 echo "<br>ejecutando query a Access...... <br>";
        $query = "select * from Vendedores";

 	if($res = odbc_exec ($conexion, $query)){ 
      	echo "<br>La sentencia se ejecutó correctamente <br>";
        while ($fila = odbc_fetch_object($res)){ 
         	echo "<br>" . $fila->NombreVendedor; 
      	} 
      	 
   	}else{ 
      	echo "Error al ejecutar la sentencia SQL"; 
   	} 

        ?>
    </body>
</html>
