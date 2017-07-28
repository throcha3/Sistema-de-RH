<?php
  include_once '../modal/Cargo.class.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

  $cargo = new Cargo;

  if ($id > 0) $car = $cargo->find($id);
  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
  }

  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <?php
      if ($op == 'del') echo '<h3 class="page-header display-4">Exclusão de Cargo</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Cargo</h3>';
    ?>

    <hr />

    <form action="../control/cadCargoControl.php" class="container" method="POST" id="CargoForm">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="slc_setor">Setor
          <a href="cadSetorView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_setor" name="slc_setor" required="true" <?php ; if($op!='alt') echo ' disabled';?>>
          <option value="" selected="">Selecione</option>
            <?php
              include '../modal/Setor.class.php';
              $array = array();
              $setor = new Setor;
              $array = $setor->findAll();

              foreach ($array as $valor) {
                  if ($valor['id_setor'] == $car['id_setor']) echo '<option value="'.$valor['id_setor'].'" selected>'.$valor['dsc_setor'].'</option>';
                  else echo '<option value="'.$valor['id_setor'].'">'.$valor['dsc_setor'].'</option>';
              }
            ?>
          </select>
        </div>
        <div class="form-group col-md-8">
          <label for="txt_cargo">Descrição Cargo</label>
          <input type="txt_cargo" class="form-control" id="txt_cargo" placeholder="" name="txt_cargo" required="true" <?php echo 'value="'.$car['dsc_cargo']. '"'; if($op!='alt') echo ' disabled'; ?>>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-12">
          <input type="hidden" name="id" <?php echo 'value="'.$id.'"'?> >
          <?php 
            if ($op == 'del') echo '<button type="submit" class="btn btn-danger" id="op" name="op" value="DEL">Deletar</button>';
            else echo '<button type="submit" class="btn btn-primary" id="op" name="op" value="ALT">Alterar</button>';
          ?>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
      </div>

    </form>
  </div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaCargo.js"></script>
<?php include_once('includes/footerNovo.php'); ?>


