<?php
  include_once '../modal/Enfermeiro.class.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';
  $enfermeiro = new Enfermeiro;

  if ($id > 0) $enf = $enfermeiro->find($id);
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
      if ($op == 'del') echo '<h3 class="page-header display-4">Desativação de Enfermeiro</h3>';
      else if ($op == 'ati') echo '<h3 class="page-header display-4">Reativação de Enfermeiro</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Enfermeiro</h3>';
    ?>

    <hr />

    <form action="../control/cadEnfermeiroControl.php" class="container" method="POST" id="EnfermeiroForm" >
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_nome">Nome</label>
          <input type="text" class="form-control" id="txt_nome" placeholder="" name="txt_nome" maxlength="100" required="true" <?php echo 'value="'.$enf['nome_enferm']. '"'; if($op!='alt') echo ' disabled'; ?> >
        </div>
        <div class="form-group col-md-6">
          <label for="txt_nome">Sobrenome</label>
          <input type="text" class="form-control" id="txt_sobrenome" placeholder="" name="txt_sobrenome" maxlength="100" required="true" <?php echo 'value="'.$enf['sobrenome_enferm']. '"'; if($op!='alt') echo ' disabled'; ?> >
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_coren">COREN</label>
          <input type="text" class="form-control" id="txt_coren" placeholder="" name="txt_coren" required="true" <?php echo 'value="'.$enf['coren_enferm']. '"'; if($op!='alt') echo ' disabled'; ?>>
        </div>
        <div class="form-group col-md-6">
            <label for="slc_campus">Campus
            <a href="cadCampusView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
            </label>
            <select class="form-control selectpicker" id="slc_campus" name="slc_campus" required="true" <?php ; if($op!='alt') echo ' disabled'; ?>>

              <?php
                include '../modal/Campus.class.php';
                $array = array();
                $campus = new Campus;
                $array = $campus->findAll();

                foreach ($array as $valor) {
                    if ($valor['id_campus'] == $enf['id_campus']) echo '<option value="'.$valor['id_campus'].'" selected>'.$valor['dsc_campus'].'</option>';
                    else echo '<option value="'.$valor['id_campus'].'">'.$valor['dsc_campus'].'</option>';
                }
            ?>
            </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <input type="hidden" name="id" <?php echo 'value="'.$id.'"'?> >
          <?php 
            if ($op == 'del') echo '<button type="submit" class="btn btn-danger" id="op" name="op" value="DEL">Desativar</button>';
            else if ($op == 'ati') echo '<button type="submit" class="btn btn-success" id="op" name="op" value="ATI">Reativar</button>';
            else echo '<button type="submit" class="btn btn-primary" id="op" name="op" value="ALT">Alterar</button>';
          ?>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
      </div>

    </form>
   </div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaEnfermeiro.js"></script>
<?php include_once('includes/footerNovo.php');?>



