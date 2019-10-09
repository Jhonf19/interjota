<?php
session_start();
  class Modelo
  {

    private $peticion;
    private $respuesta;

    function __construct(){
      $this->peticion=MySQL::conectar();
    }


        function userVerify($data)
    {
      try {
        $h = $this->peticion->prepare("SELECT id_persona, documento, nombre, rol, estado FROM personas WHERE documento=:user AND password=:pass AND estado=1");
        $h->bindParam(':user', $data['user'], PDO::PARAM_STR);
        $h->bindParam(':pass', $data['pass'], PDO::PARAM_STR);
        $h->execute();
        $resultado = $h->fetchALL(PDO::FETCH_OBJ);

       }catch (\Exception $e) {}

        return    $resultado;
        $this->peticion=MySQL::desconectar();
    }

        function createProd($data)
    {
      try {
        // $this->peticion->query("SET NAMES 'utf8'");
        $h = $this->peticion->prepare("INSERT INTO productos VALUES(NULL, :nombre, :costo, :precio, :stock)");
        $h->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $h->bindParam(':costo', $data['costo'], PDO::PARAM_STR);
        $h->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $h->bindParam(':stock', $data['stock'], PDO::PARAM_STR);
        $res = $h->execute();

      }catch (\Exception $e) {}
         // echo "<pre>"; print_r($res.'kk'); echo "</pre>";
         return $res;

    }

      function listProducts()
    {
      try {
        $h = $this->peticion->prepare("SELECT * FROM productos");
        $h->execute();
        $result = $h->fetchALL(PDO::FETCH_OBJ);
      } catch (\Exception $e) { }
      return $result;
    }

        function editProduct($data)
    {
      try {
        // $this->peticion->query("SET NAMES 'utf8'");
        $h = $this->peticion->prepare("UPDATE productos SET nombre=:nombre, costo=:costo, precio=:precio WHERE id_producto=:id_producto");
        $h->bindParam(':id_producto', $data['id_producto'], PDO::PARAM_INT);
        $h->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $h->bindParam(':costo', $data['costo'], PDO::PARAM_INT);
        $h->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
        $res = $h->execute();

      }catch (\Exception $e) {}
         // echo "<pre>"; print_r($res); echo "</pre>";
         return $res;

    }

        function surtProduct($data)
    {
      try {
        // $this->peticion->query("SET NAMES 'utf8'");
        $h = $this->peticion->prepare("UPDATE productos SET stock=:stock WHERE id_producto=:id_producto");
        $h->bindParam(':id_producto', $data['id_producto'], PDO::PARAM_INT);
        $h->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $res = $h->execute();

      }catch (\Exception $e) {}
         // echo "<pre>"; print_r($cantidad); echo "</pre>";
         return $res;

    }






  }

?>
