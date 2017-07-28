<?php
include_once '../modal/Estado.class.php';
include_once '../modal/Cidade.class.php';
include_once '../modal/Especialidade.class.php';
include_once('includes/novoHeader.php');

$estado = new Estado;
$cidade = new Cidade;
$espec  = new Especialidade;

$listaEstado = $estado->findAll();
$listaCidade = $cidade->findAll();
$listaEspec  = $espec->findAll();

?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <h3 class="page-header display-4">Cadastro de Médico</h3>

    <hr />

    <form action="../control/cadMedicoControl.php" class="container" method="POST" id="MedicoForm">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="txt_primeiro_nome">Nome</label>
          <input type="text" class="form-control" id="txt_primeiro_nome" placeholder="" name="txt_primeiro_nome" maxlength="100" required="true">
        </div>
        <div class="form-group col-md-4">
          <label for="txt_segundo_nome">Sobrenome</label>
          <input type="text" class="form-control" id="txt_segundo_nome" placeholder="" name="txt_segundo_nome" maxlength="100" required="true">
        </div>
        <div class="form-group col-md-4">
          <label for="txt_crm">CRM/CRO</label>
          <input type="text" class="form-control" id="txt_crm" placeholder="" maxlength="20" name="txt_crm">
        </div>
      </div>

      <div class="row">
          <div class="form-group col-md-2">
          <label for="slc_estado">Estado Atuação</label>
          <select class="form-control selectpicker" id="slc_estado" name="slc_estado" required="true">
          <option value="" selected="">Selecione</option> 
            <?php
              foreach ($listaEstado as $key) {
                echo "<option value='{$key["id_uf"]}'>{$key['cod_uf']}</option>";
              }
            ?>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="slc_cidade">Cidade Atuação</label>
          <select class="form-control selectpicker" id="slc_cidade" name="slc_cidade" required="true">
           <option value="" selected="">Selecione</option> 
            <?php
              foreach ($listaCidade as $key) {
                echo "<option value='{$key["id_cidade"]}'>{$key['nome_cidade']}</option>";
              }
            ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="slc_especialidade">Especialidade
          <a href="cadEspecialidadeView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_especialidade" name="slc_especialidade" required="true">
          <option value="" selected="">Selecione</option> 
            <?php
              foreach ($listaEspec as $key) {
                echo "<option value='{$key["id_especialidade"]}'>{$key['dsc_especialidade']}</option>";
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
<script type="text/javascript" src="../layout/js/ValidaForms/validaMedico.js"></script>
<?php include_once('includes/footerNovo.php');?>
