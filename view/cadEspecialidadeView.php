<?php include_once('includes/novoHeader.php'); ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div id="main" class="container" style="padding-top: 1%">
      <div class="jumbotron">
      
  
    <h3 class="page-header display-4">Cadastro de Especialidade</h3>

    <hr />
    
    <form action="../control/cadEspecialidadeControl.php" class="container" method="POST" id="EspecForm">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="txt_especialidade">Especialidade</label>
          <input type="text" class="form-control" id="txt_especialidade" placeholder="" name="txt_especialidade" required="true">
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
<script type="text/javascript" src="../layout/js/ValidaForms/validaEspecialidade.js"></script>
<?php include_once('includes/footerNovo.php'); ?>