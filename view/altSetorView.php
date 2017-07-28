<?php 
  include_once '../modal/Setor.class.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

  $setor = new Setor;

  if ($id > 0) $set = $setor->find($id);
  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
  }
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div id="main" class="container" style="padding-top: 0%">
      <div class="jumbotron">
      
  
    <?php
      if ($op == 'del') echo '<h3 class="page-header display-4">EXCLUSÃO de Setor</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Setor</h3>';
    ?>

    <hr />
    
    <form action="../control/cadSetorControl.php" class="container" method="POST" id="SetorForm">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="txt_setor">Descrição Setor</label>
          <input type="text" class="form-control" id="txt_setor" placeholder="" name="txt_setor" required="true" <?php echo 'value="'.$set['dsc_setor']. '"'; if($op!='alt') echo ' disabled';  ?> >
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
<script type="text/javascript" src="../layout/js/ValidaForms/validaSetor.js"></script>
<?php include_once('includes/footerNovo.php'); ?>