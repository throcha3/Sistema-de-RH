<?php
  include_once '../modal/Cid.class.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

  $cid = new Cid;

  if ($id > 0) $c = $cid->find($id);
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
      if ($op == 'del') echo '<h3 class="page-header display-4">Exclusão de CID</h3>';
      else echo '<h3 class="page-header display-4">Alteração de CID</h3>';
    ?>

    <hr />

    <form action="../control/cadCidControl.php" class="container" method="POST" id="CidForm">
      <div class="row">
        <div class="form-group col-md-8">
          <label for="txt_cargo">Descrição CID</label>
          <input type="txt_cargo" class="form-control" id="txt_dsc_cid" placeholder="" name="txt_dsc_cid" required="true" <?php echo 'value="'.$c['dsc_cid']. '"'; if($op!='alt') echo ' disabled'; ?>>
        </div>
        <div class="form-group col-md-4">
          <label for="txt_cargo">Código CID</label>
          <input type="txt_cargo" class="form-control" id="txt_cod_cid" placeholder="" name="txt_cod_cid" required="true" <?php echo 'value="'.$c['cod_cid']. '"'; if($op!='alt') echo ' disabled'; ?>>
        </div>
      </div>
      <br />
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


