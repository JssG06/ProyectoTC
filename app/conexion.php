<?php
  class Conexion{
    public function Conectar(){
      
      $host = 'db-seguros'; 
      $port = '5432';
      $dbname = 'agencia_seguros';
      $user = 'user';
      $pass = '1234';

      try{
        
        $bd = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $bd -> setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $bd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bd;
      }catch(Exception $e){
          echo "Error de Conexión: ".$e->getMessage();
      }
    }
  }
?>