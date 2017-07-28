<?php
include_once('includes/novoHeader.php');
include_once '../modal/Medico.class.php';
include_once '../modal/Cid.class.php';
include_once '../modal/FuncionarioCrud.php';
include_once '../modal/Absenteismo.class.php';
// include_once '../modal/tipoAfastamento.class.php';

//$funcionario = new FuncionarioCrud; //DESTA FORMA TEMOS MUITAS CONEXOES ABERTAS GERANDO ERROS [NAO UTILIZAR]
//$medico      = new Medico; //DESTA FORMA TEMOS MUITAS CONEXOES ABERTAS GERANDO ERROS [NAO UTILIZAR]
//$cid         = new Cid; //DESTA FORMA TEMOS MUITAS CONEXOES ABERTAS GERANDO ERROS [NAO UTILIZAR]
//$abs         = new Absenteismo; //DESTA FORMA TEMOS MUITAS CONEXOES ABERTAS GERANDO ERROS [NAO UTILIZAR]

$op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

$funcionario = new FuncionarioCrud;
$id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
$listaFuncionario = $funcionario->findAll();
$funcionario = null;//KILL NA CONEXAO DEPOIS DE ESTANCIAR OK

$medico      = new Medico;
$listaCRM = $medico->findAll();
$medico      = null;//KILL NA CONEXAO DEPOIS DE ESTANCIAR OK

$cid         = new Cid;
$listaCid = $cid->findAll();
$cid = null;//KILL NA CONEXAO DEPOIS DE ESTANCIAR OK

// $tipoAfasta = new TipoAfastamento;
// $listaTiposAfasta = $tipoAfasta->findAll();
// $tipoAfasta = null;

  $abs         = new Absenteismo;
  if ($id > 0) $campos = $abs->find($id);

  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
  }
  $abs = null;//KILL NA CONEXAO DEPOIS DE ESTANCIAR OK

?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="jumbotron">
    <?php if ($op == 'del'){
      echo "<h3 class='display-4'>Exclusão de Absenteísmo médico</h3>";
    } else {
      echo "<h3 class='display-4'>Alteração de Absenteísmo médico</h3>";
    } ?>
    <form action="../control/AbsenteismoControl.php" enctype="multipart/form-data" method="post" id="AbsenteismoForm">
       <div class="row">
        <div class="form-group col-sm-6">
          <label for="txt_crm">CRM ou CRO
          <a href="cadMedicoView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control" id="txt_crm" name="txt_crm" required="true">
            <option value="">Selecione</option>
            <?php foreach ($listaCRM as $crm) {
              echo "<option value='{$crm['id_medico']}'".(($crm['id_medico'] == $campos['id_medico']) ?'selected="selected"':"").">".$crm['cad_crm']. ' - '.$crm['nome_medico'].' '.$crm['sobrenome_medico']. "</option>";
              };?>
          </select>
        </div>
          <div class="form-group col-sm-6">
            <label for="slc_cid">CID</label>
            <a href="cadCidView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
            <select class="form-control" id="slc_cid" name="slc_cid" required="true">
            <option value="">Selecione</option>
             <?php foreach ($listaCid as $key) {
              echo "<option value='{$key['cod_cid']}'".(($key['cod_cid'] == $campos['cod_cid']) ?'selected="selected"':"").">".$key['cod_cid'] .' - '.$key['dsc_cid']."</option>";
              };?>
          </select>
          </div>
       </div>
       <div class="row">
          <div class="form-group col-sm-6">
            <label for="txt_funcionario">Prontuário ou Nome do Funcionario</label>
            <a href="cadFuncionarioView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
            </label>
            <select class="form-control" id="txt_funcionario" name="txt_funcionario" required="true">
            <option value="">Selecione</option>
            <?php foreach ($listaFuncionario as $fun) {
               if ($fun['inativo'] == 0 || $fun['id_funcionario'] == $campos['id_funcionario']){
              echo "<option value='{$fun['id_funcionario']}'".(($fun['id_funcionario'] == $campos['id_funcionario']) ?'selected="selected"':"").">".$fun['cad_prontuario'].' - '.$fun['nome_funcionario'].' '.$fun['sobrenome_funcionario']. "</option>";
              }};?>
          </select>
          </div>
          <div class="form-group col-sm-6">
          <label for="txt_tipo_abs">Tipo de absenteísmo</label>
            <select class="form-control" id="txt_tipo_abs" name="txt_tipo_abs">
            <option value="" selected="">Selecione</option>
               <?php
               if ($campos['tipo_abs'] == 'absenteismo_medico'){
                echo '<option selected value="absenteismo_medico">Absenteísmo médico</option>';
                echo '<option value="absenteismo_odontologico">Absenteísmo odontológico</option>';
               } else{
                echo '<option value="absenteismo_medico">Absenteísmo médico</option>';
                echo '<option selected value="absenteismo_odontologico">Absenteísmo odontológico</option>';
               }
               ?>
            </select>
          </div>
       </div>
        <br />
       <div class="uparquivo row">
        <div class="form-group col-sm-12">

        <label for="txt_tipo_doc">Selecione o tipo de documento</label>
          <select class="form-control" id="txt_tipo_doc" name="txt_tipo_doc" required="true">
          <option value="" selected="">Selecione</option>
           <?php
             if ($campos['tipo_doc'] == 'atestado'){
                echo '<option selected value="atestado">Atestado</option>';
                echo '<option value="declaracao">Declaração</option>';
              } else{
                echo '<option value="atestado">Atestado</option>';
                echo '<option selected value="declaracao">Declaração</option>';
              }
           ?>
          </select>
       </div>

      <div class="campos" id="atestado">

        <div class="form-group col-sm-4">
          <label for="anexo_atestado">Adicionar Arquivo</label>
          <input type="file" class="filestyle" name="fileToUpload" id="anexo_arquivo" accept="application/pdf">

          <input type="text" name="defaultFile" hidden="true" value="<?php echo $campos['arquivo_upload']; ?>">
        </div>

        <div id="datas-atestado">
          <div class="form-group col-md-4">
            <label for="txt_data_i" id="txt_data_i_label">Data inicial do afastamento</label>
            <div class='input-group date'>
                <input type='text' class="form-control" name="txt_data_i" id='txt_data_i' required="true"
                value="<?=reverteData($campos['data_inicio'])?>" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label for="txt_data_f" id="txt_data_f_label">Data final do afastamento</label>
            <div class='input-group date'>
                <input type='text' class="form-control" name="txt_data_f" id='txt_data_f' required="true"
                value="<?=reverteData($campos['data_final'])?>" />
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
                  <input type='text' class="form-control" name="txt_data_ini" id='txt_data_ini' required="true"
                  value="<?=reverteData($campos['data_inicio'])?>" />


                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>

            <div class="form-group col-md-2">
              <label for="txt_hora_i" id="txt_hora_i_label">Hora Inicial</label>
              <div class='input-group date' id="txt_hora_i">
                  <input type='text' class="form-control" name="txt_hora_i" id='txt_hora_i' required="true" 
                  value="<?=substr($campos['data_inicio'], 11, 5)?>"/>
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                  </span>
              </div>
            </div>

            <div class="form-group col-md-2">
              <label for="txt_hora_f" id="txt_hora_f_label">Hora Final</label>
              <div class='input-group date' id="txt_hora_f">
                  <input type='text' class="form-control" name="txt_hora_f" id='txt_hora_f' required="true"
                  value="<?=substr($campos['data_final'], 11, 5)?>" />
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                  </span>
              </div>
            </div>
          </div>
        </div>

          <div class="form-group col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Arquivo Anexado</th>
                  <th>Tamanho</th>
                  <th>Usuario</th>
                  <th>Data do upload</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>
                    <?php echo '<a target="_blank" href="'.$campos['arquivo_upload'].'" />'.$campos['arquivo_nome'].'</a><br />';?>
                  </td>
                  <td>
                    <?=converte_bytes($campos['tamanho_upload'])?>
                  </td>
                  <td>
                    Usuario Exemplo
                  </td>
                  <td>
                  <?=$campos['data_upload']?>
                  </td>
                </tr>
              </tbody>

            </table>
          </div>

        </div>

        <div class="form-group col-sm-12">
          <label for="txt_tipo_afastamento">Tipo do afastamento</label>
          <select class="form-control" name="txt_tipo_afastamento">
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
              <textarea class="form-group col-sm-12" id="cad_observacao" name="cad_observacao"><?php echo $campos['cad_observacao'] ?></textarea>
            </div>
        <input type="hidden" name="id" value="<?=$id?>" >
        <input type="hidden" name="op" value="ALT" />
         <?php
            if ($op == 'del') echo '<button type="delete" class="btn btn-danger" id="op" name="op" value="DEL">Deletar</button>';
            else echo '<button type="submit" class="btn btn-primary" id="op" name="op" value="ALT">Alterar</button>';
          ?>
        <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a></p>
  </form>
  </div>
</div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaAbsenteismo.js"></script>
<?php include_once('includes/footerNovo.php');?>
<script type="text/javascript">
$(document).ready(function (){
    if ($('#txt_tipo_doc').val() == 'atestado'){
       $('#datas-declaracao').hide();
      }
      else {
        $('#datas-atestado').hide();}

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
        $('.campos').show();}

    if ($('#txt_tipo_doc').val() == '' || $('#txt_tipo_doc').val() == null){
        $('.campos').hide();
        $('#txt_data_i,#txt_data_f').val('');
      };
    });
});
</script>




