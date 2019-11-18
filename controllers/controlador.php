<?php
require_once('models/modelo.php');

class Controlador
{
// start
  function __construct()
  {
    $this->o=new Modelo();
  }

  function index()
  {
    if ( isset($_SESSION['admin']) || isset($_SESSION['operator'])) {
      $this->panel();
    }
    else {
    include_once('views/layouts/head.html');
    include_once('views/login.php');
    include_once('views/layouts/foot.html');
    }
  }

  function userVerify()
  {
      $data=[
        'user'=>$_POST['user'],
        'pass'=>$_POST['pass']
      ];
    $res = $this->o->userVerify($data);
    if (!empty($res)) {

      if ($res[0]->rol == 1) {
        $_SESSION['admin']=$res;
        header("location:?b=panel");
      }
      else if ($res[0]->rol == 2) {
        $_SESSION['operator']=$res;
        header("location:?b=panel");
      }

    }else {
      echo "<script language='javascript'>";
      echo "alert('Usuario y/o Contraseña incorrectos');";
      echo "window.location.replace('?b=index')";
      echo "</script>";
    }

  }

  function panel()
  {
    if (isset($_SESSION['admin'])) {
      include_once('views/layouts/head.html');
      include_once('views/admin/header.html');
      include_once('views/layouts/foot.html');
    }
    elseif (isset($_SESSION['operator'])) {
      include_once('views/layouts/head.html');
      include_once('views/operator/header.html');
      include_once('views/layouts/foot.html');
    }
    else {
      header("location:?b=index");
    }
  }

  function compra()
  {
    if (isset($_SESSION['admin']))
    {
      include_once('views/layouts/head.html');
      include_once('views/admin/header.html');
      include_once('views/admin/compras.php');
      include_once('views/layouts/foot.html');
    }
    else
    {
      header("location:?b=index");
    }
  }

    function createPro(){
    if (isset($_SESSION['admin'])){
      $data=[
        'nombre'=>$_POST['nombre'],
        'costo'=>$_POST['costo'],
        'precio'=>$_POST['precio'],
        'stock'=>$_POST['stock']
      ];

      $res = $this->o->createProd($data);
      if ($res) {
        echo "<script language='javascript'>";
        echo "alert('¡Producto creado!');";
        echo "window.location.replace('?b=compra')";
        echo "</script>";
      }else {
        echo "<script language='javascript'>";
        echo "alert('Ocurrió un error al cargar los archivos');";
        echo "window.location.replace('?b=newPro')";
        echo "</script>";
      }

    }else {
      header("location:?b=index");
    }
  }

  function inventario(){
     if (isset($_SESSION['admin']) || isset($_SESSION['operator'])){

       include_once('views/layouts/head.html');
       if (isset($_SESSION['admin'])) {
         include_once('views/admin/header.html');
       }
       elseif (isset($_SESSION['operator'])) {
         include_once('views/operator/header.html');
       }
       $res = $this->o->listProducts();
       include_once('views/inventario.php');
       include_once('views/layouts/foot.html');

     }else {
       header("location:?b=index");
     }

   }

     function editarProducto(){
    if (isset($_SESSION['admin'])) {
      if (isset($_POST['btn_editarPro']))
      {
        $data2=[
          'id_producto'=>$_POST['id_producto'],
          'nombre'=>$_POST['nombre'],
          'costo'=>$_POST['costo'],
          'precio'=>$_POST['precio']
        ];
        $res = $this->o->editProduct($data2);
        if ($res) {
          echo "<script language='javascript'>";
          echo "alert('¡Producto editado!');";
          echo "window.location.replace('?b=inventario')";
          echo "</script>";
        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error');";
          echo "window.location.replace('?b=inventario')";
          echo "</script>";
        }
      }
      else
      {
        $data=[
          'id_producto'=>$_GET['prod'],
          'nombre'=>$_GET['nom'],
          'costo'=>$_GET['cos'],
          'precio'=>$_GET['pre']
        ];
        include_once('views/layouts/head.html');
        include_once('views/admin/header.html');
        include_once('views/admin/edit_pro.php');
        include_once('views/layouts/foot.html');
      }

    }else {
      header("location:?b=index");
    }
  }

    function surtPro(){
    if (isset($_SESSION['admin'])) {
      if (isset($_POST['btn_surtPro']))
      {
        $data2=[
          'id_producto'=>$_POST['id_producto'],
          'stock'=>$_POST['cantidad']+$_POST['stock']
        ];

        $res = $this->o->surtProduct($data2);
        if ($res) {
          echo "<script language='javascript'>";
          echo "alert('¡Producto surtido!');";
          echo "window.location.replace('?b=inventario')";
          echo "</script>";

        }else {
          echo "<script language='javascript'>";
          echo "alert('Ocurrió un error');";
          echo "window.location.replace('?b=inventario')";
          echo "</script>";
        }
      }
      else
      {
        $data=[
          'id_producto'=>$_GET['prod'],
          'nombre'=>$_GET['nom'],
          'stock'=>$_GET['sto']
        ];
        include_once('views/layouts/head.html');
        include_once('views/admin/header.html');
        include_once('views/admin/surt_pro.php');
        include_once('views/layouts/foot.html');
      }
    }else {
      header("location:?b=index");
    }
  }

  function createFac()
  {
    date_default_timezone_set('America/Bogota');
    if (isset($_SESSION['admin']))
    {
      // $fec = date('Y-m-d-h:i a');
      // $fec = date('Y-m-d');
      // echo $fec;

      $data=[
        'fecha'=>$_POST['fecha'],
        'proveedor'=>$_POST['proveedor'],
        'total_fac'=>$_POST['total_fac']
      ];
      $res = $this->o->createFac($data);
      if ($res) {
        echo "<script language='javascript'>";
        echo "alert('¡Factura ingresada!');";
        echo "window.location.replace('?b=compra')";
        echo "</script>";

      }else {
        echo "<script language='javascript'>";
        echo "alert('Ocurrió un error');";
        echo "window.location.replace('?b=compra')";
        echo "</script>";
      }
    }
    else
    {
      header("location:?b=index");
    }
  }

  function venta()
  { echo "<pre>"; print_r($_SESSION['n_venta']); echo "</pre>";
    if (isset($_SESSION['admin']))
    {
      include_once('views/layouts/head.html');
      include_once('views/admin/header.html');
      include_once('views/admin/venta.php');
      include_once('views/layouts/foot.html');
    }
    elseif (isset($_SESSION['operator']))
    {
      include_once('views/layouts/head.html');
      include_once('views/operator/header.html');
      include_once('views/admin/venta.php');
      include_once('views/layouts/foot.html');
    }
    else
    {
      header("location:?b=index");
    }
  }

  function addCar()
  {
    if (isset($_SESSION['admin']) || isset($_SESSION['operator']))
    {
      $id=$_POST['codigo'];
      $cantidad=$_POST['cantidad'];
      $res = $this->o->findPro($id);
      if ($res)
      {
        $data=$res;


        if ($cantidad > $data->stock)
        {
          echo '<script>
            var cant="'.$data->stock.'"
            var pro="'.$data->nombre.'"
            alert("Solo hay "+cant+" "+pro+" en inventario")
            window.location.replace("?b=venta")
          </script>';
        }
        elseif ($cantidad <= 0)
        {
          echo '<script>
            alert("Ingresa una cantidad mayor a cero");
            window.location.replace("?b=venta")
          </script>';
        }
        else
        {
          if(!isset($_SESSION['n_venta']))
          {
            $data->cantidad=$cantidad;
            $data->stock=$data->stock-$cantidad;
            $_SESSION['n_venta'][]=$data;
            header("location:?b=venta");
          }
          else
          {
            foreach ($_SESSION['n_venta'] as $key => $row) {
              if ($row->id_producto == $data->id_producto) {
                $idq=$row->id_producto;
                $keyq=$key;
                
              }
              
            }
                if ($idq) {
                  if ($cantidad > $_SESSION['n_venta'][$keyq]->stock) {
                    echo '<script>
                    var cant="'.$_SESSION['n_venta'][$keyq]->stock.'"
                    var nom="'.$_SESSION['n_venta'][$keyq]->nombre.'"
                    alert("Solo quedan "+cant+" unidades de "+nom+" en inventario")
                    window.location.replace("?b=venta")
                  </script>';
                   
                  }else {
                    # code...
                    $_SESSION['n_venta'][$keyq]->stock -= $cantidad;
                    $_SESSION['n_venta'][$keyq]->cantidad += $cantidad;
                    header("location:?b=venta");
                  }
                }else {
                  $data->cantidad=$cantidad;
              $data->stock=$data->stock-$cantidad;
              $_SESSION['n_venta'][]=$data;
              header("location:?b=venta");
                }

          }
        }
      }

    }
    else
    {
      header("location:?b=index");
    }
  }

    function removeCart(){
    if (isset($_SESSION['admin']) || isset($_SESSION['operator'])) {
      $id = $_GET['id'];
      unset($_SESSION['n_venta'][$id]);
      if (count($_SESSION['n_venta'])==0) {
        unset($_SESSION['n_venta']);
        header("location:?b=venta");
      }else {
        header("location:?b=venta");
      }

    }else {
      header("location:?b=index");
    }
  }

    function cancelVenta(){
    if (isset($_SESSION['admin']) || isset($_SESSION['operator'])) {
      unset($_SESSION['n_venta']);
      header("location:?b=venta");
    }else {
      header("location:?b=index");
    }
  }

  function reporte()
  {
    if (isset($_SESSION['admin']))
    {
      include_once('views/layouts/head.html');
      include_once('views/admin/header.html');
      include_once('views/admin/reporte.php');
      include_once('views/layouts/foot.html');

    }
    else
    {
      header("location:?b=index");
    }
  }



  function exit() {
   // unset($_SESSION['admin']);
   session_destroy();
   header("location:?b=index");
 }
  // echo "<pre>"; print_r($res); echo "</pre>";



// end
} ?>
