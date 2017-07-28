<?php   include_once('includes/novoHeader.php'); ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
      <h3 class="page-header display-4">Cadastro de CIDs</h3>
      <hr />
    <form action="../control/cadCidControl.php" class="container" method="POST" id="CidForm">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="txt_cargo">Código CID</label>
          <input type="text" class="form-control" id="txt_dsc_cid" placeholder="" name="txt_dsc_cid" required="true">
        </div>
        <div class="form-group col-md-8">
          <label for="txt_cargo">Descrição CID</label>
          <input type="text" class="form-control" id="txt_cod_cid" placeholder="" name="txt_cod_cid" required="true">
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
<?php include_once('includes/footerNovo.php'); ?>




