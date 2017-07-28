<?php   include_once('includes/novoHeader.php'); ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <h3 class="page-header display-4">Cadastro de Cargo</h3>

    <hr />

    <form action="../control/cadCargoControl.php" class="container" method="POST" id="CargoForm">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="slc_setor">Setor
            <a href="cadSetorView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_setor" name="slc_setor" required="true">
          <option value="" selected="">Selecione</option>
            <?php
              include '../modal/Setor.class.php';
              $array = array();
              $setor = new Setor;
              $array = $setor->findAll();

              foreach ($array as $valor) {
                  echo '<option value="'.$valor['id_setor'].'">'.$valor['dsc_setor'].'</option>';
              }
            ?>
          </select>
        </div>
        <div class="form-group col-md-8">
          <label for="txt_cargo">Descrição Cargo</label>
          <input type="text" class="form-control" id="txt_cargo" placeholder="" name="txt_cargo" required="true">
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary" id='op' name="op" value="INS">Salvar</button>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
      </div>

    </form>
   </div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaCargo.js"></script>
<?php include_once('includes/footerNovo.php'); ?>




