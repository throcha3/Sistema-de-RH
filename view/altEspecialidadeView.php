<?php include_once('includes/novoHeader.php');
include_once '../modal/Especialidade.class.php';

$id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
$op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

$espec = new Especialidade;

  if ($id > 0) $campos = $espec->find($id);
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
      if ($op == 'del') echo '<h3 class="page-header display-4">Exclusão de Especialidade</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Especialidade</h3>';
    ?>

    <hr />

    <form action="../control/cadEspecialidadeControl.php" class="container" method="POST" id="EspecForm">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="txt_especialidade">Especialidade</label>
          <input type="text" class="form-control" id="txt_especialidade" placeholder="" name="txt_especialidade" required="true"
          value="<?=$campos['dsc_especialidade']?>" <?php ; if($op!='alt') echo ' disabled'; ?> >
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
<script type="text/javascript" src="../layout/js/ValidaForms/validaEspecialidade.js"></script>
<?php include_once('includes/footerNovo.php'); ?>