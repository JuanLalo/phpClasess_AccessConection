<?php



class Access_Conection{

    private $conexion, $dsn, $user, $password;


    public function __construct($dsn)
     {
        $this->dsn = $dsn;
        $this->user = "root";
        $this->password = "root";

        try {
            $this->conexion = odbc_connect($dsn, $this->user , $this->password); 
            if($this->conexion == ''){
                echo 'Error al conectar a Access!';
            }          
        } catch (PDOException $e) {
            $e->getMessage() . "<br/>";
            die("Ocurrio un error al conectar a Accss. Error del sistema" + $e );
        }
    }

    public function ejecutarConsulta($sql)
    {
        try {
            if ($res = odbc_exec($this->conexion, $sql)) {
                return $res;

            }
            else {

                echo "Error al ejecutar la sentencia SQL";
                return false;
            } 
        } catch (Exception $e) {
            echo "Imposible ejecutar" . $e->getMessage;
            return false;
        }
    }


}


?>