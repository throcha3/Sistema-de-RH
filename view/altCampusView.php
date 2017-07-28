    <?php
include_once('includes/novoHeader.php');
include '../modal/Estado.class.php';
include_once '../modal/Cidade.class.php';

$estado = new Estado;
$listestado = $estado->findAll();


  include_once '../modal/Campus.class.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']   : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

  $campus = new Campus;

  if ($id > 0) $cam = $campus->find($id);
  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
  }

?>
<meta charset="UTF-8">

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="jumbotron">

    <?php
      if ($op == 'del') echo '<h3 class="page-header display-4">Exclusão de Campus</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Campus</h3>';
    ?>

    <hr />
<form action="../control/cadCampusControl.php" class="container" method="POST" id="CampusForm">

  <div class="row">
    <div class="form-group col-md-6">
      <label for="txt_campus">Nome do Campus</label>
      <input type="text" class="form-control" id="txt_campus" placeholder="Digite o campus" name="txt_campus" required="true" <?php echo 'value="'.$cam['dsc_campus']. '"'; if($op!='alt') echo ' disabled'; ?> >
    </div>

    <div class="form-group col-md-2">
      <label for="slc_estado">Estado</label>
      <select charset="UTF-8" class="form-control selectpicker" id="slc_estado" name="slc_estado" required="true" <?php ; if($op!='alt') echo ' disabled';?>>
        <?php
          foreach ($listestado as $key) {
          echo "<option value='{$key['id_uf']}'".(($key['id_uf'] == $cam['id_estado']) ?'selected="selected"':"").">".$key['cod_uf']."</option>";
          }
        ?>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="slc_cidade">Cidade</label>
      <select charset="UTF-8" class="form-control selectpicker" id="slc_cidade" name="slc_cidade" required="true" <?php ; if($op!='alt') echo ' disabled';?>>
        <?php
          $cidade = new Cidade;
          $listaCidade = $cidade->findAll();
            foreach ($listaCidade as $key) {
            echo "<option value='{$key['id_cidade']}'".(($key['id_cidade'] == $cam['id_cidade']) ?'selected="selected"':"").">".$key['nome_cidade']."</option>";
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

  </div><br />

  <div class="row">
    <div class="col-md-12">
          <input type="hidden" name="id" <?php echo 'value="'.$id.'"'?> >
          <?php 
            if ($op == 'del') echo '<button type="submit" class="btn btn-danger" id="op" name="op" value="DEL">Deletar</button>';
            else echo '<button type="submit" class="btn btn-primary" id="op" name="op" value="ALT">Alterar</button>';
          ?>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
  </div>

  </form>
   </div>
   </div>
    <script type="text/javascript" src="../layout/js/ValidaForms/validaCampus.js"></script>
    <?php include_once('includes/footerNovo.php'); ?>