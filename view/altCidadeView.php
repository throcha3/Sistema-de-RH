<?php
include_once '../modal/Estado.class.php';
include_once '../modal/Cidade.class.php';
include_once('includes/novoHeader.php');

 
$estado = new Estado;
$listaEstado = $estado->findAll();

$id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
$op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';
$cidade = new Cidade;
  if ($id > 0) $campos = $cidade->find($id);
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
      if ($op == 'del') echo '<h3 class="page-header display-4">Exclusão de Cidades</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Cidades</h3>';
    ?>

    <hr />

    <form action="../control/cadCidadeControl.php" class="container" method="POST">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="nome_cidade">Nome</label>
          <input type="text" class="form-control" id="nome_cidade" placeholder="" name="nome_cidade" required="true"
          value="<?=$campos['nome_cidade']?>" <?php ; if($op!='alt') echo ' disabled';?> >
        </div>
        <div class="form-group col-md-3">
          <label for="slc_estado">Estado</label>
          <select class="form-control selectpicker" id="slc_estado" name="slc_estado" required="true" <?php ; if($op!='alt') echo ' disabled';?>>
          <option selected value="<?=$campos['cod_uf']?>"><?= $campos['cod_uf']?></option>
          <?php
            foreach ($listaEstado as $key) {
              echo "<option value='{$key["cod_uf"]}'>{$key['cod_uf']}</option>";
            }
          ?>

          </select>
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
