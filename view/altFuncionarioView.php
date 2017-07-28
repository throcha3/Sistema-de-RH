<?php
  include_once '../modal/FuncionarioCrud.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';
  
  $funcionario = new FuncionarioCrud;

  if ($id > 0) $func = $funcionario->find($id);
  else {
    echo 'Precisa-se de um id para alterar.';
    exit();
  }
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <?php
      if ($op == 'del') echo '<h3 class="page-header display-4">Desativação de Funcionário</h3>';
      else if ($op == 'ati') echo '<h3 class="page-header display-4">Reativação de Funcionário</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Funcionário</h3>';
    ?>

    <hr />

    <form action="../control/cadFuncionarioControl.php" class="container" method="POST" id="FuncionarioForm">
      <div class="row">
        <div class="form-group col-md-2">
          <label for="txt_pront">Prontuário</label>
          <input type="text" class="form-control" id="txt_pront" placeholder="" name="txt_pront" required="true" <?php echo 'value="'.$func['cad_prontuario']. '"'; if($op!='alt') echo ' disabled'; ?> >
        </div>
        <div class="form-group col-md-2">
          <label for="txt_cpf">CPF</label>
          <input type="text" class="form-control" id="txt_cpf" placeholder="" name="txt_cpf" required="true" <?php echo 'value="'.$func['cad_cpf']. '"'; if($op!='alt') echo ' disabled';  ?>>
        </div>
        <div class="form-group col-md-4">
          <label for="txt_nome">Nome</label>
          <input type="text" class="form-control" id="txt_nome" placeholder="" name="txt_nome" required="true" <?php echo 'value="'.$func['nome_funcionario']. '"'; if($op!='alt') echo ' disabled';  ?> >
        </div>
        <div class="form-group col-md-4">
          <label for="txt_sobrenome">Sobrenome</label>
          <input type="text" class="form-control" id="txt_sobrenome" placeholder="" name="txt_sobrenome" required="true" <?php echo 'value="'.$func['sobrenome_funcionario']. '"'; if($op!='alt') echo ' disabled';  ?> >
        </div>

      </div>

      <div class="row">
        <div class="form-group col-md-3">
          <label for="slc_setor">Setor
          <a href="cadSetorView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_setor" name="slc_setor" required="true" <?php if($op!='alt') echo ' disabled';  ?> >

            <?php
              include '../modal/Setor.class.php';
              $array = array();
              $setor = new Setor;
              $array = $setor->findAll();

              foreach ($array as $valor) {
                  if ($valor['id_setor'] == $func['id_setor']) echo '<option value="'.$valor['id_setor'].'" selected>'.$valor['dsc_setor'].'</option>';
                  else echo '<option value="'.$valor['id_setor'].'">'.$valor['dsc_setor'].'</option>';
              }
              $setor = null;
            ?>

          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="slc_cargo">Cargo
            <a href="cadCargoView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_cargo" name="slc_cargo" required="true" <?php ; if($op!='alt') echo ' disabled'; ?> >

            <?php
              include '../modal/Cargo.class.php';
              $array = array();
              $cargo = new Cargo;
              $array = $cargo->findAll();

              foreach ($array as $valor) {
                  if ($valor['id_cargo'] == $func['id_cargo']) echo '<option value="'.$valor['id_cargo'].'" selected>'.$valor['dsc_cargo'].'</option>';
                  else echo '<option value="'.$valor['id_cargo'].'">'.$valor['dsc_cargo'].'</option>';
              }
              $cargo = null;
            ?>

          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="slc_sexo">Sexo</label>
          <select class="form-control selectpicker" id="slc_sexo" name="slc_sexo" required="true" <?php ; if($op!='alt') echo ' disabled'; ?>>
            <option value="M" <?php if ($func['cad_sexo']=='M') echo 'selected'?> >Masculino</option>
            <option value="F" <?php if ($func['cad_sexo']=='F') echo 'selected'?>>Feminino</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="date_nasc2">Data de Nascimento</label>
          <input type="text" class="form-control" id="date_nasc2" placeholder="" name="date_nasc2" <?php echo 'value="'. reverteData($func['cad_data_nasc']). '"'; if($op!='alt') echo ' ';  ?> >


        </div>
        <div class="form-group col-md-2">
            <label for="slc_campus">Campus
              <a href="cadCampusView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
            </label>
            <select class="form-control selectpicker" id="slc_campus" name="slc_campus" required="true"<?php ; if($op!='alt') echo ' disabled'; ?>>
              <?php
                include '../modal/Campus.class.php';
                $array = array();
                $campus = new Campus;
                $array = $campus->findAll();

                foreach ($array as $valor) {
                    if ($valor['id_campus'] == $func['id_campus']) echo '<option value="'.$valor['id_campus'].'" selected>'.$valor['dsc_campus'].'</option>';
                    else echo '<option value="'.$valor['id_campus'].'">'.$valor['dsc_campus'].'</option>';
                }
                $campus = null;
            ?>
            </select>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-md-12">
          <input type="hidden" name="id" <?php echo 'value="'.$id.'"'?> >
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

    <?php include_once('includes/footerNovo.php'); ?>