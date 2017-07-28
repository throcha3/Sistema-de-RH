<?php include_once('includes/novoHeader.php'); ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <h3 class="page-header display-4">Cadastro de Presenteísmo</h3>
    

    <hr />

    <form action="../control/PresenteismoControl.php" class="container" method="POST" id="PresenteismoForm">
      <div class="row">

        <div class="form-group col-md-6">
          <label for="slc_funcionario">Funcionário
            <a href="cadFuncionarioView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_funcionario" name="slc_funcionario">
          <option value="" selected="">Selecione</option>
            <?php
              include '../modal/FuncionarioCrud.php';
              $array = array();
              $func = new FuncionarioCrud;
              $array = $func->findAllOrder('cad_prontuario');

              foreach ($array as $valor) {
                 if ($valor['inativo'] == 0){
                  echo '<option value="'.$valor['id_funcionario'].'">'.$valor['cad_prontuario']. ' - '.$valor['nome_funcionario'].' '.$valor['sobrenome_funcionario'].'</option>';
                }
              }
            ?>

          </select>
        </div>
        <div class="form-group col-md-6">
        <label for="slc_enfermeiro">
          Enfermeiro <a href="cadEnfermeiroView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
        </label>
          <select class="form-control selectpicker" id="slc_enfermeiro" name="slc_enfermeiro">
          <option value="" selected="">Selecione</option>
            <?php
              include '../modal/Enfermeiro.class.php';
              $array = array();
              $enf = new Enfermeiro;
              $array = $enf->findAllOrder('coren_enferm');

              foreach ($array as $valor) {
                 if ($valor['inativo'] == 0){
                  echo '<option value="'.$valor['id_enferm'].'">'.$valor['coren_enferm']. ' - '.$valor['nome_enferm'].' '.$valor['sobrenome_enferm'].'</option>';
                }
              }
            ?>

          </select>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-4">
          <label for="date_nasc">Data</label>
          <div class='input-group date'  >
              <input type='text' class="form-control" name="date_nasc2" id='date_nasc2' />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>

        <div class="form-group col-md-8">
            <label for="txt_problema">Descrição Problema</label>
            <input type="text" class="form-control" id="txt_problema" placeholder="" name="txt_problema">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-12">
            <label for="txt_obs">Observações</label>
            <input type="text" class="form-control" id="txt_obs" placeholder="" name="txt_obs">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary" id='op' name="op" value="INS">Salvar</button>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
      </div>

    </form>
   </div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaPresenteismo.js"></script>
<?php include_once('includes/footerNovo.php');?>
