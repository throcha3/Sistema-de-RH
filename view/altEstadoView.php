<?php
include_once('includes/novoHeader.php');
include_once '../modal/Estado.class.php';

$id        = (int)(isset($_GET['id']))         ? (int)$_GET['id']             : 0;
$op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';
$estado = new Estado;
  if ($id > 0) $campos = $estado->find($id);
  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
  }
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="jumbotron">

    <?php
      if ($op == 'del') echo '<h3 class="page-header display-4">Exclusão de Estados</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Estados</h3>';
    ?>

    <hr />

    <form action="../control/cadEstadoControl.php" class="container" method="POST">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="nome_uf">Nome</label>
          <input type="text" class="form-control" id="nome_uf" placeholder="" name="nome_uf" required="true"
          value="<?=$campos['nome_uf']?>">
        </div>
        <div class="form-group col-md-3">
          <label for="nome_uf">Nome</label>
          <input type="text" class="form-control" id="cod_uf" placeholder="" name="cod_uf" required="true"
          value="<?=$campos['cod_uf']?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <input type="hidden" name="id" value="<?=$id?>" >
          <?php 
            if ($op == 'del') echo '<button type="submit" class="btn btn-danger" id="op" name="op" value="DEL">Deletar</button>';
            else echo '<button type="submit" class="btn btn-primary" id="op" name="op" value="ALT">Alterar</button>';
          ?>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
      </div>

    </form>
   </div>

    <?php include_once('includes/footerNovo.php'); ?>
