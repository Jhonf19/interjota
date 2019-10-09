<?php
require_once('models/modelo.php');
/**
 *
 */
class Controlador
{

  function __construct()
  {
    $this->o=new Modelo();
  }

  function index()
  {
    include_once('views/layouts/head.html');
    include_once('views/login.php');
    include_once('views/layouts/foot.html');
  }





} ?>
