<?php include_once('includes/novoHeader.php'); ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="jumbotron">

    <h3 class="page-header display-4">Cadastro de Enfermeiro</h3>

    <hr />

    <form action="../control/cadEnfermeiroControl.php" class="container" method="POST" id="EnfermeiroForm">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_nome">Nome</label>
          <input type="text" class="form-control" id="txt_nome" placeholder="" name="txt_nome" maxlength="100" required="true">
        </div>
        <div class="form-group col-md-6">
          <label for="txt_nome">Sobrenome</label>
          <input type="text" class="form-control" id="txt_sobrenome" placeholder="" name="txt_sobrenome" maxlength="100" required="true">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_coren">COREN</label>
          <input type="text" class="form-control" id="txt_coren" placeholder="" name="txt_coren" required="true">
        </div>
        <div class="form-group col-md-6">
            <label for="slc_campus">Campus
            <a href="cadCampusView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
            </label>
            <select class="form-control selectpicker" id="slc_campus" name="slc_campus" required="true">
            <option value="" selected="">Selecione</option>

              <?php
                include '../modal/Campus.class.php';
                $array = array();
                $campus = new Campus;
                $array = $campus->findAll();

                foreach ($array as $valor) {
                    echo '<option value="'.$valor['id_campus'].'">'.$valor['dsc_campus'].'</option>';
                }
              ?>
            </select>
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
<script type="text/javascript" src="../layout/js/ValidaForms/validaEnfermeiro.js"></script>
<?php include_once('includes/footerNovo.php');?>
