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
      // echo "<pre>"; print_r($data2); echo "</pre>";

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
      // code...
      include_once('views/layouts/head.html');
      include_once('views/admin/header.html');
      include_once('views/admin/surt_pro.php');
      include_once('views/layouts/foot.html');
    }
  }else {
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
