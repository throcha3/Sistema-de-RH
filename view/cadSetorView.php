<?php include_once('includes/novoHeader.php'); ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
      
  
    <h3 class="page-header display-4">Cadastro de Setor</h3>

    <hr />
    
    <form action="../control/cadSetorControl.php" class="container" method="POST" id="SetorForm">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="txt_setor">Descrição Setor</label>
          <input type="text" class="form-control" id="txt_setor" placeholder="" name="txt_setor" required="true">
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
<script type="text/javascript" src="../layout/js/ValidaForms/validaSetor.js"></script>
<?php include_once('includes/footerNovo.php'); ?>