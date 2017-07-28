<?php 
include_once '../modal/Estado.class.php';
include_once('includes/novoHeader.php');

$estado = new Estado;

$listaEstado = $estado->findAll();

?>
<!-- CÓDIGO REALMENTE COMEÇA AQUI -->

    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
    	<h3 class="page-header display-4">Cadastro de Cidades</h3>

    	<hr />
    
	    <form action="../control/cadCidadeControl.php" class="container" method="POST">
	      <div class="row">
	        <div class="form-group col-md-6">
	          <label for="nome_cidade">Nome</label>
	          <input type="text" class="form-control" id="nome_cidade" placeholder="" name="nome_cidade" required="true">
	        </div>
	        <div class="form-group col-md-3">
	          <label for="slc_estado">Estado
				<a href="cadEstadoView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
	          </label>
	          <select class="form-control selectpicker" id="slc_estado" name="slc_estado" required="true">
	          <?php
	            foreach ($listaEstado as $key) {
	              echo "<option value='{$key["cod_uf"]}'>{$key['cod_uf']}</option>";
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
</div>
    <?php include_once('includes/footerNovo.php'); ?>
