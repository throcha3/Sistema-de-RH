<?php 
include_once('includes/novoHeader.php');

?>
<!-- CÓDIGO REALMENTE COMEÇA AQUI -->

    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
    	<h3 class="page-header display-4">Cadastro de Estados</h3>

    	<hr />
    
	    <form action="../control/cadCidadeControl.php" class="container" method="POST">
	      <div class="row">
	        <div class="form-group col-md-6">
	          <label for="nome_uf">Estado</label>
	          <input type="text" class="form-control" id="nome_uf" placeholder="" name="nome_uf" required="true">
	        </div>
	        <div class="form-group col-md-3">
	          <label for="cod_uf">Código UF</label>
	          <input type="text" class="form-control" id="cod_uf" placeholder="" name="cod_uf" required="true">
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
</div>
    <?php include_once('includes/footerNovo.php'); ?>
