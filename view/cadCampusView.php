<?php
include_once('includes/novoHeader.php');
include '../modal/Estado.class.php';

$estado = new Estado;
$listestado = $estado->findAll();
?> 

<meta charset="UTF-8">

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <h3 class="page-header display-4">Cadastro de Campus</h3>

    <hr />
  <form action="../control/cadCampusControl.php" class="container" method="POST" id="CampusForm">
    <div class="row">

      <div class="form-group col-md-6">
        <label for="txt_campus">Nome do Campus</label>
        <input type="text" class="form-control" id="txt_campus" placeholder="Digite o campus" name="txt_campus" required="true"/>
      </div>

      <div class="form-group col-md-2">
        <label for="slc_estado">Estado
          <a href="cadEstadoView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
        </label>
        <select charset="UTF-8"  class="form-control selectpicker" id="slc_estado" name="slc_estado" required="true">
        <option selected="">Selecione uma opção</option>
         <?php
              include '../modal/Cidade.class.php';

              $array = array();
              $cidade = new Cidade;
              $array = $cidade->findAll();

              foreach ($listestado as $valor) {
                  echo '<option value="'.$valor['id_uf'].'">'.$valor['cod_uf'].'</option>';
              }
          ?>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="slc_cidade">Cidade
          <a href="cadCidadeView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
        </label>
        <select charset="UTF-8" class="form-control selectpicker" id="slc_cidade" name="slc_cidade" required="true">
        </select>
      </div>
      <script type="text/javascript">
            $('#slc_cidade').prop("disabled", true);
          $('#slc_estado').change(
              function() {
                  var estado = $("#slc_estado option:selected").text();
                  $.ajax({
                      type: "GET",
                      url: "../modal/cidades.ajax.php?cod_estados="+estado,
                      success: function(data) {
                        $('#slc_cidade').prop("disabled", false);
                        $('#slc_cidade').html(data);
                      },
                      error: function(xhr, status, error){
                        alert(error);
                      },
                      dataType: 'text'
                  });
              }
          );
        </script>
        </select>

    </div><br />

    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-success" id='op' name="op" value="INS">Salvar</button>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
    </div>

  </form>
  </div>
</div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaCampus.js"></script>
<?php include_once('includes/footerNovo.php');