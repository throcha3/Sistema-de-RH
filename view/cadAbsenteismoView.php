<?php
include_once('includes/novoHeader.php');
include_once '../modal/Medico.class.php';
include_once '../modal/Cid.class.php';
include_once '../modal/FuncionarioCrud.php';
include_once '../modal/TipoAfastamento.class.php';

$medico = new Medico;
$cid    = new Cid;
$funcionario = new FuncionarioCrud;

$listaFuncionario = $funcionario->findAll();
$listaCRM = $medico->findAll();
$cids = $cid->findAll();

// $tipoAfasta = new TipoAfastamento;
// $listaTiposAfasta = $tipoAfasta->findAll();
// $tipoAfasta = null;

?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="jumbotron">
      <h3 class="display-4">Absenteísmo médico</h3>

    <form action="../control/AbsenteismoControl.php" enctype="multipart/form-data" method="post" id="AbsenteismoForm">
       <div class="row">
        <div class="form-group col-sm-6">
          <label for="txt_crm">CRM ou CRO
          <a href="cadMedicoView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control" id="txt_crm" name="txt_crm" required="true">
          <option value="" selected="">Selecione</option>
            <?php foreach ($listaCRM as $crm) {
              echo '<option value="'.$crm['id_medico'].'">'.$crm['cad_crm']. ' - '.$crm['nome_medico'].' '.$crm['sobrenome_medico'].'</option>';
              };?>
          </select>
        </div>
          <div class="form-group col-sm-6">
            <label for="slc_cid"><b>CID</b></label>
             <a href="cadCidView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
            <select class="form-control" id="slc_cid" name="slc_cid" required="true">
            <option value="" selected="">Selecione</option>
            <?php foreach ($cids as $key) {
              echo '<option value="'.$key['cod_cid'].'">'.$key['cod_cid']. ' - ' .$key['dsc_cid'].'</option>';
              };?>
          </select>
          </div>
       </div>
       <div class="row">
          <div class="form-group col-sm-6">
            <label for="txt_funcionario">Prontuário ou Nome do Funcionário
            <a href="cadFuncionarioView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
            </label>
            <select class="form-control" id="txt_funcionario" name="txt_funcionario" required="true">
            <option value="" selected="">Selecione</option>
            <?php foreach ($listaFuncionario as $fun) {
              echo '<option value="'.$fun['id_funcionario'].'">'.$fun['cad_prontuario']. ' - '.$fun['nome_funcionario'].' '.$fun['sobrenome_funcionario']. '</option>';
              };?>
          </select>
          </div>
          <div class="form-group col-sm-6">
          <label for="txt_tipo_abs">Tipo de absenteísmo</label>
            <select class="form-control" id="txt_tipo_abs" name="txt_tipo_abs" required="true">
            <option value="" selected="">Selecione</option>
              <option value="absenteismo_medico">Absenteísmo médico</option>
              <option value="absenteismo_odontologico">Absenteísmo odontológico</option>
            </select>
          </div>
       </div>
        <br />
       <div class="uparquivo row">
        <div class="form-group col-sm-12">
        <label for="txt_tipo_doc">Selecione o tipo de documento</label>
          <select class="form-control" id="txt_tipo_doc" name="txt_tipo_doc" required="true">
          <option value="" selected="">Selecione</option>
            <option value="atestado">Atestado</option>
            <option value="declaracao">Declaração</option>
          </select>
       </div>

      <div class="campos" id="atestado">

        <div class="form-group col-sm-4">
          <label for="anexo_atestado">Adicionar Arquivo</label>
          <input type="file" class="filestyle" name="fileToUpload" id="anexo_arquivo" accept="application/pdf" />
        </div>

        <div id="datas-atestado">
          <div class="form-group col-md-4">
            <label for="txt_data_i" id="txt_data_i_label">Data inicial do afastamento</label>
            <div class='input-group date'>
                <input type='text' class="form-control" name="txt_data_i" id='txt_data_i'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label for="txt_data_f" id="txt_data_f_label">Data final do afastamento</label>
            <div class='input-group date' id="div_data_final">
                <input type='text' class="form-control" name="txt_data_f" id='txt_data_f'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
        </div>


      <div id="datas-declaracao">
          <div class="form-group col-md-4">
            <label for="txt_data_ini" id="txt_data_i_ini_label">Data do afastamento</label>
            <div class='input-group date'>
                <input type='text' class="form-control" name="txt_data_ini" id='txt_data_ini'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>

          <div class="form-group col-md-2">
            <label for="txt_hora_i" id="txt_hora_i_label">Hora Inicial</label>
            <div class='input-group date' id="txt_hora_i">
                <input type='text' class="form-control" name="txt_hora_i" id='txt_hora_i'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
          </div>

          <div class="form-group col-md-2">
            <label for="txt_hora_f" id="txt_hora_f_label">Hora Final</label>
            <div class='input-group date' id="txt_hora_f">
                <input type='text' class="form-control" name="txt_hora_f" id='txt_hora_f'/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
          </div>
        </div>

      </div>

        <div class="form-group col-sm-12">
          <label for="txt_tipo_afastamento">Tipo do afastamento</label>
          <select class="form-control" name="txt_tipo_afastamento" required="true">
          <option value="" selected="">Selecione</option>
<!--           <?php foreach ($listaTiposAfasta as $afasta) {
              echo '<option value="'.$afasta['id_tipo_afasta'].'">'.$afasta['dsc_tipo_afasta'].'</option>';
              };?> -->
            <option value="" selected="">Selecione</option>
            <option value="prisao">Prisão</option>
            <option value="nupcias">Núpcias</option>
            <option value="luto">Luto</option>
            <option value="nascimento">Nascimento</option>
            <option value="outros">Outros</option>
          </select>
        </div>

            <div class="form-group col-sm-12">
              <label class="" for="cad_observacao">Observações</label>
              <textarea class="form-group col-sm-12" id="cad_observacao" name="cad_observacao" maxlength="255"></textarea>
              </div>
              <input type="hidden" name="op" value="INS" />
        <button type="submit" class="btn btn-primary" name="submit" value="submit">Salvar</button>
        <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a></p>
  </form>
</div>
</div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaAbsenteismo.js"></script>
<?php include_once('includes/footerNovo.php');?>
<script type="text/javascript">
$(document).ready(function (){
  $('.campos').hide()
    $('#txt_tipo_doc').change(function(){
    if ($('#txt_tipo_doc').val() == 'atestado'){
        $('#datas-declaracao').hide();
        $("#txt_data_i,#txt_data_f").mask("?99/99/9999");
        $("#txt_data_i,#txt_data_f").prop("required",true);
        $("#txt_hora_i,#txt_hora_f,#txt_data_ini").removeAttr('required');
        $('#datas-atestado').show();
        $('.campos').show();}

    if ($('#txt_tipo_doc').val() == 'declaracao'){
        $('#datas-atestado').hide();
        $("#txt_data_ini").mask("?99/99/9999");
        $("#txt_hora_i,#txt_hora_f").mask("?99:99");
        $("#txt_data_ini,#txt_hora_i,#txt_hora_f").prop("required",true);
        $("#txt_data_i,#txt_data_f").removeAttr('required');
        $('#datas-declaracao').show();
        $('.campos').show();

      } if ($('#txt_tipo_doc').val() == '' || $('#txt_tipo_doc').val() == null){
        $('.campos').hide();
        $('#txt_data_i,#txt_data_f').val('');
      };
    });
});
</script>
