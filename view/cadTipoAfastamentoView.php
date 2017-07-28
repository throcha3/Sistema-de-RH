<?php   include_once('includes/novoHeader.php'); ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <h3 class="page-header display-4">Cadastro de tipo de afastamento</h3>

    <hr />

    <form action="../control/tipoAfastamentoControl.php" class="container" method="POST" id="tipoAfastamentoForm">
      <div class="row">

        <div class="form-group col-md-8">
          <label for="txt_cargo">Descrição</label>
          <input type="text" class="form-control" id="txt_tipo_afastamento" placeholder="Digite a descrição" name="txt_tipo_afastamento" required="true">
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




