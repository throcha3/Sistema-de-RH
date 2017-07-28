<?php
include_once '../modal/Estado.class.php';
include_once '../modal/Cidade.class.php';
include_once '../modal/Especialidade.class.php';
include_once '../modal/Medico.class.php';
include_once('includes/novoHeader.php');

$estado = new Estado;
$listaEstado = $estado->findAll();
$estado = null;

$cidade = new Cidade;
$listaCidade = $cidade->findAll();
$cidade = null;

$espec  = new Especialidade;
$listaEspec  = $espec->findAll();
$espec = null;

$med    = new Medico;

$id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
$op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';


if ($id > 0) $campos = $med->find($id);
  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
}
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <?php
      if ($op == 'del') echo '<h3 class="page-header display-4">Desativação de Médico</h3>';
      else if ($op == 'ati') echo '<h3 class="page-header display-4">Reativação de Médico</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Médico</h3>';
    ?>

    <hr />

    <form action="../control/cadMedicoControl.php" class="container" method="POST" id="MedicoForm">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="txt_primeiro_nome">Nome</label>
          <input type="text" class="form-control" id="txt_primeiro_nome" placeholder="" name="txt_primeiro_nome" maxlength="100" required="true"
          value="<?=$campos['nome_medico']?>" <?php ; if($op!='alt') echo ' disabled'; ?>>
        </div>
        <div class="form-group col-md-4">
          <label for="txt_segundo_nome">Sobrenome</label>
          <input type="text" class="form-control" id="txt_segundo_nome" placeholder="" name="txt_segundo_nome" maxlength="100" required="true"
          value="<?=$campos['sobrenome_medico']?>"<?php ; if($op!='alt') echo ' disabled'; ?>>
        </div>
        <div class="form-group col-md-4">
          <label for="txt_crm">CRM/CRO</label>
          <input type="text" class="form-control" id="txt_crm" placeholder="" name="txt_crm" maxlength="20" required="true" value="<?=$campos['cad_crm']?>"<?php ; if($op!='alt') echo ' disabled'; ?>>
        </div>
      </div>

      <div class="row">
          <div class="form-group col-md-2">
          <label for="slc_estado">Estado Atuação</label>
          <select class="form-control selectpicker" id="slc_estado" name="slc_estado" required="true" <?php ; if($op!='alt') echo ' disabled'; ?>>
            <?php
              foreach ($listaEstado as $key) {
                echo "<option value='{$key['id_uf']}'".(($key['id_uf'] == $campos['id_estado_atuacao']) ?'selected':"").">".$key['cod_uf']."</option>";
              }
            ?>
          </select>

        </div>
        <div class="form-group col-md-4">
          <label for="slc_cidade">Cidade Atuação</label>
          <select class="form-control selectpicker" id="slc_cidade" name="slc_cidade" required="true" <?php ; if($op!='alt') echo ' disabled'; ?>>
            <?php
              foreach ($listaCidade as $key) {
                echo "<option value='{$key['id_cidade']}'".(($key['id_cidade'] == $campos['id_cidade_atuacao']) ?'selected':"").">".$key['nome_cidade']."</option>";
              }
            ?>
          </select>
           <script type="text/javascript">
          $('#slc_estado').change(
              function() {
                  var estado = $("#slc_estado option:selected").text();
                  $.ajax({
                      type: "GET",
                      url: "../modal/cidades.ajax.php?cod_estados="+estado,
                      success: function(data) {
                        $('#carregando').hide();
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
        </div>
        <div class="form-group col-md-6">
          <label for="slc_especialidade">Especialidade
          <a href="cadEspecialidadeView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_especialidade" name="slc_especialidade" required="true" <?php ; if($op!='alt') echo ' disabled'; ?>>
            <?php
              foreach ($listaEspec as $key) {
                echo "<option value='{$key['id_especialidade']}'".(($key['id_especialidade'] == $campos['id_especialidade']) ?'selected':"").">".$key['dsc_especialidade']."</option>";
              }
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <input type="hidden" name="id" value="<?=$id?>" >
          <?php 
            if ($op == 'del') echo '<button type="submit" class="btn btn-danger" id="op" name="op" value="DEL">Desativar</button>';
            else if ($op == 'ati') echo '<button type="submit" class="btn btn-success" id="op" name="op" value="ATI">Reativar</button>';
            else echo '<button type="submit" class="btn btn-primary" id="op" name="op" value="ALT">Alterar</button>';
          ?>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
      </div>

    </form>
   </div>
</div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaMedico.js"></script>
<?php include_once('includes/footerNovo.php');?>
