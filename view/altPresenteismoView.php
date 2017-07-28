<?php
  include_once '../modal/Presenteismo.class.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

  $presenteismo = new Presenteismo;

  if ($id > 0) $presen = $presenteismo->find($id);
  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
  }
?>

  <?php include_once('includes/novoHeader.php'); 

  //var_dump($presen); 
  ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">

    <?php
      if ($op == 'del') echo '<h3 class="page-header display-4">EXCLUSÃO de Presenteísmo</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Presenteísmo</h3>';
    ?>
    

    <hr />

    <form action="../control/PresenteismoControl.php" class="container" method="POST" id="PresenteismoForm">
      <div class="row">

        <div class="form-group col-md-6">
          <label for="slc_funcionario">Funcionário
            <a href="cadFuncionarioView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_funcionario" name="slc_funcionario" required="true"<?php ; if($op!='alt') echo ' disabled'; ?>>
          
            <?php
              include '../modal/FuncionarioCrud.php';
              $array = array();
              $func = new FuncionarioCrud;
              $array = $func->findAllOrder('cad_prontuario');

              foreach ($array as $valor) {
                if ($valor['inativo'] == 0 || $valor['id_funcionario'] == $presen['id_funcionario']){
                  if ($valor['id_funcionario'] == $presen['id_funcionario']) echo '<option value="'.$valor['id_funcionario'].'" selected>' .$valor['cad_prontuario'].' - '  .$valor['nome_funcionario'].' '.$valor['sobrenome_funcionario'].'</option>';
                  else echo '<option value="'.$valor['id_funcionario'].'">'.$valor['cad_prontuario'].' - '.$valor['nome_funcionario'].' '.$valor['sobrenome_funcionario'].'</option>';
                }
              }
            ?>

          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="slc_enfermeiro">Enfermeiro
          <a href="cadFuncionarioView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_enfermeiro" name="slc_enfermeiro" required="true"<?php ; if($op!='alt') echo ' disabled'; ?>>
          
            <?php
              include '../modal/Enfermeiro.class.php';
              $array = array();
              $enf = new Enfermeiro;
              $array = $enf->findAllOrder('coren_enferm');

              foreach ($array as $valor) {
                 if ($valor['inativo'] == 0 || $valor['id_enferm'] == $presen['id_enfermeiro']){
                  if ($valor['id_enferm'] == $presen['id_enfermeiro']) echo '<option value="'.$valor['id_enferm'].'" selected>'.$valor['coren_enferm'].' - '.$valor['nome_enferm'].' '.$valor['sobrenome_enferm']. '</option>';
                  else echo '<option value="'.$valor['id_enferm'].'">'.$valor['coren_enferm'].' - '.$valor['nome_enferm'].' '.$valor['sobrenome_enferm'].'</option>';
              }
            }
            ?>

          </select>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label for="date_nasc2">Data </label>
          <input type="text" class="form-control" id="date_nasc2" placeholder="" name="date_nasc2" <?php echo 'value="'.reverteData($presen['data_presenteismo']).'"' ?>  />
        </div>

        <div class="form-group col-md-8">
            <label for="txt_problema">Descrição Problema</label>
            <input type="text" class="form-control" id="txt_problema" placeholder="" name="txt_problema" required="true" <?php echo 'value="'.$presen['cad_problema']. '"'; if($op!='alt') echo ' disabled';  ?> >
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-12">
            <label for="txt_obs">Observações</label>
            <input type="text" class="form-control" id="txt_obs" placeholder="" name="txt_obs" <?php echo 'value="'.$presen['cad_observacao']. '"'; if($op!='alt') echo ' disabled';  ?>>
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
<script type="text/javascript" src="../layout/js/ValidaForms/validaPresenteismo.js"></script>
<?php include_once('includes/footerNovo.php');?>



