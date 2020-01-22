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
        $h = $this->peticion->prepare("INSERT INTO productos VALUES(NULL, :nombre, :costo, :precio, :stock)");
        $h->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $h->bindParam(':costo', $data['costo'], PDO::PARAM_STR);
        $h->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $h->bindParam(':stock', $data['stock'], PDO::PARAM_STR);
        $res = $h->execute();

      }catch (\Exception $e) {}
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
        $h = $this->peticion->prepare("UPDATE productos SET nombre=:nombre, costo=:costo, precio=:precio WHERE id_producto=:id_producto");
        $h->bindParam(':id_producto', $data['id_producto'], PDO::PARAM_INT);
        $h->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $h->bindParam(':costo', $data['costo'], PDO::PARAM_INT);
        $h->bindParam(':precio', $data['precio'], PDO::PARAM_INT);
        $res = $h->execute();

      }catch (\Exception $e) {}
         return $res;

    }

        function surtProduct($data)
    {
      try {
        $h = $this->peticion->prepare("UPDATE productos SET stock=:stock WHERE id_producto=:id_producto");
        $h->bindParam(':id_producto', $data['id_producto'], PDO::PARAM_INT);
        $h->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $res = $h->execute();

      }catch (\Exception $e) {}
         return $res;

    }

      function findPro($id)
    {
      try {
        $h = $this->peticion->prepare("SELECT * FROM productos WHERE id_producto=:id");
        $h->bindParam(':id', $id, PDO::PARAM_INT);
        $h->execute();
        $result = $h->fetch(PDO::FETCH_OBJ);
      } catch (\Exception $e) { }
      return $result;
    }



        function createFac($data)
    {
      try {
        $h = $this->peticion->prepare("INSERT INTO facturas VALUES(NULL, :fecha, :proveedor, :total_fac)");
        $h->bindParam(':fecha', $data['fecha'], PDO::PARAM_STR);
        $h->bindParam(':proveedor', $data['proveedor'], PDO::PARAM_STR);
        $h->bindParam(':total_fac', $data['total_fac'], PDO::PARAM_INT);
        $res = $h->execute();

      }catch (\Exception $e) {}
         return $res;

    }

    function sellProducts($data, $data2)
    {     
      foreach ($data as $key => $row) {
        $dif = ($data[$key]->stock + $data[$key]->cantidad) - $data[$key]->cantidad;
        try {
          $h = $this->peticion->prepare("UPDATE productos SET stock= :stock WHERE id_producto= :id_producto");
          $h->bindParam(':id_producto', $data[$key]->id_producto, PDO::PARAM_INT);
          $h->bindParam(':stock', $dif, PDO::PARAM_INT);
          $res = $h->execute();
          
        }catch (\Exception $e) {}
      }
      if ($res){
         try {
        $h = $this->peticion->prepare("INSERT INTO ventas VALUES (NULL, :fecha , :total, :utilidad)");
        $h->bindParam(':fecha', $data2['fecha_ven'], PDO::PARAM_STR);
        $h->bindParam(':total', $data2['total_ven'], PDO::PARAM_INT);
        $h->bindParam(':utilidad', $data2['utilidad'], PDO::PARAM_INT);
        $res2 = $h->execute();
      

      }catch (\Exception $e) {}
          return $res2;

      }
     
  
    }

    function generateReport($data){
      
      if ($data['val'] == 'mes') {
        date_default_timezone_set('America/Bogota');
        $mes = "%".$data['mes']."%";
        try {
          $h = $this->peticion->prepare("SELECT * FROM ventas WHERE fecha_ven LIKE :mes ");
          $h->bindParam(':mes', $mes, PDO::PARAM_STR);
          $res = $h->execute();
          
          $result = $h->fetchAll(PDO::FETCH_OBJ);
          
        } catch (\Exception $e) {}
        return $result;
      } else if($data['val'] == 'dia') {
        $dia = $data['dia'];
        
        try {
          $h = $this->peticion->prepare("SELECT * FROM ventas WHERE fecha_ven = :dia ");
          $h->bindParam(':dia', $dia, PDO::PARAM_STR);
          $res = $h->execute();
          
          $result = $h->fetchAll(PDO::FETCH_OBJ);
          
        } catch (\Exception $e) {}
        return $result;
        
      }elseif ($data['val'] == 'balance') {
        date_default_timezone_set('America/Bogota');
        $mes = "%".$data['mes']."%";
        try {
          $h = $this->peticion->prepare("SELECT SUM(total_fac) AS compras  FROM facturas WHERE fecha_fac LIKE :mes ");
          $h->bindParam(':mes', $mes, PDO::PARAM_STR);
          $res = $h->execute();
          
          $result = $h->fetch(PDO::FETCH_OBJ);

          $i = $this->peticion->prepare("SELECT SUM(total_ven) AS ventas  FROM ventas WHERE fecha_ven LIKE :mes ");
          $i->bindParam(':mes', $mes, PDO::PARAM_STR);
          $res2 = $i->execute();
          
          $result2 = $i->fetch(PDO::FETCH_OBJ);
          
        } catch (\Exception $e) {}
        $dat = [
          "compras"=>$result->compras,
          "ventas"=>$result2->ventas
        ];
        return $dat;

      }
      

    }

    function sumProducts(){

      try {
        $h = $this->peticion->prepare("SELECT COUNT(id_producto) AS suma FROM productos");
        $h->execute();

        $result = $h->fetch(PDO::FETCH_OBJ);
      } catch (\Exception $e) {}
        return $result;
    }

    function sellsToday(){
      date_default_timezone_set('America/Bogota');
      $mes = date('Y-m-d');
      try {
        $h = $this->peticion->prepare("SELECT SUM(total_ven) AS total_v FROM ventas WHERE fecha_ven = :mes");
        $h->bindParam(':mes', $mes, PDO::PARAM_STR);
        $h->execute();

        $result = $h->fetch(PDO::FETCH_OBJ);
      } catch (\Exception $e) {}
        return $result;
    }

    function sellsMonth(){
      date_default_timezone_set('America/Bogota');
      $mes = "%".date('Y-m-')."%";
      try {
        $h = $this->peticion->prepare("SELECT SUM(total_ven) AS total_vm FROM ventas WHERE fecha_ven LIKE :mes");
        $h->bindParam(':mes', $mes, PDO::PARAM_STR);
        $h->execute();

        $result = $h->fetch(PDO::FETCH_OBJ);
      } catch (\Exception $e) {}
        return $result;
    }

    function buysMonth(){
      date_default_timezone_set('America/Bogota');
      $mes = "%".date('Y-m-')."%";
      try {
        $h = $this->peticion->prepare("SELECT SUM(total_fac) AS total_cm FROM facturas WHERE fecha_fac LIKE :mes");
        $h->bindParam(':mes', $mes, PDO::PARAM_STR);
        $h->execute();

        $result = $h->fetch(PDO::FETCH_OBJ);
      } catch (\Exception $e) {}
        return $result;
    }

    function buysToday() {
      date_default_timezone_set('America/Bogota');
      $dia = date('Y-m-d');
      try {
        $h = $this->peticion->prepare("SELECT SUM(total_fac) AS total_c FROM facturas WHERE fecha_fac = :dia");
        $h->bindParam(':dia', $dia, PDO::PARAM_STR);
        $h->execute();

        $result = $h->fetch(PDO::FETCH_OBJ);
      } catch (\Exception $e) {}
        return $result;
    }

    function utilityMonth() {
      date_default_timezone_set('America/Bogota');
      $mes = "%".date('Y-m-')."%";
      try {
        $h = $this->peticion->prepare("SELECT SUM(utilidad) AS total_ut FROM ventas WHERE fecha_ven LIKE :mes");
        $h->bindParam(':mes', $mes, PDO::PARAM_STR);
        $h->execute();

        $result = $h->fetch(PDO::FETCH_OBJ);
      } catch (\Exception $e) {}
        return $result;
    }

    function utilityToday() {
      date_default_timezone_set('America/Bogota');
      $dia = date('Y-m-d');
      try {
        $h = $this->peticion->prepare("SELECT SUM(utilidad) AS total_ut_today FROM ventas WHERE fecha_ven = :dia");
        $h->bindParam(':dia', $dia, PDO::PARAM_STR);
        $h->execute();

        $result = $h->fetch(PDO::FETCH_OBJ);
      } catch (\Exception $e) {}
        return $result;
    }




  }

?>
