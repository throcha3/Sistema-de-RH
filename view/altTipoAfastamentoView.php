    <?php
include_once('includes/novoHeader.php');
include_once '../modal/TipoAfastamento.class.php';

$id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']   : 0;
$op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

$afasta = new tipoAfastamento;

  if ($id > 0) $tipoAf = $afasta->find($id);
  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
  }

?>
<meta charset="UTF-8">

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="jumbotron">

    <?php
      if ($op == 'del') echo '<h3 class="page-header display-4">Exclusão de tipo afastamento</h3>';
      else echo '<h3 class="page-header display-4">Alteração de tipo afastamento</h3>';
    ?>

    <hr />
<form action="../control/tipoAfastamentoControl.php" class="container" method="POST" id="tipoAfastamentoForm">
  <div class="row">
    <div class="form-group col-md-6">
      <label for="txt_campus">Descrição</label>
      <input type="text" class="form-control" id="txt_tipo_afastamento" name="txt_tipo_afastamento" required="true" <?php echo 'value="'.$tipoAf['dsc_tipo_afasta']. '"'; if($op!='alt') echo ' disabled'; ?> >
        <input type="hidden" name="id" <?php echo 'value="'.$id.'"'?> ><br />
          <?php
            if ($op == 'del') echo '<button type="submit" class="btn btn-danger" id="op" name="op" value="DEL">Deletar</button>';
            else echo '<button type="submit" class="btn btn-primary" id="op" name="op" value="ALT">Alterar</button>';
          ?>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
    </div>
  </div>
</form>
</div>
</div>
</div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaCampus.js"></script>
<?php include_once('includes/footerNovo.php'); ?>