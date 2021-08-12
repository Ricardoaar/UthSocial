<?php
session_start();
$uId = $_SESSION['info']['id'];

$id = $_REQUEST['id'];

if ($uId == $id) {
    header("Location: /public/adm/index.php?err=1");
}
if (isset($_REQUEST['del'])) {
    require('../Crud.php');
    $crud = new Crud('user');
    $crud->where_and("id", "=", $id)->delete();
    header('Location: /public/adm/');
}

require('../../partials/header.php');
require('../../partials/footer.php');


echo "
<script>
$(document).ready( function () {
  $('#modal').modal();
});
</script>
<div class='modal' tabindex='-1' id='modal' data-backdrop='static' data-keyboard='false'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>Usuario $id</h5>
        </button>
      </div>
      <div class='modal-body'>
        <img src='../assets/eliminar.png' alt='status' width='20%'>
        <b class='ml-5 text-justify'>¿Estas seguro?</b>
      </div> 
      <div class='modal-footer'>
        <button type='button' class='btn btn-primary'  onclick='redirect (\"../public/adm/\")' data-dismiss='modal'>Cancelar</button>
        <a type='button' class='btn btn-danger'  onclick='redirect(\"/bin/delete.php?id=$id&del=1\")'  data-dismiss='modal'>Eliminar</a>
      </div>
    </div>
  </div>
</div>
<script>
    function redirect (route)
    {
        window.open(route, '_self');
    }
</script>

";
