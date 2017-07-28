<?php include_once('includes/novoHeader.php'); ?>

<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <h3 class="page-header display-4">Cadastro de Funcionário</h3><hr />

    <form action="../control/cadFuncionarioControl.php" class="container" method="POST" id="FuncionarioForm">
      <div class="row">
        <div class="form-group col-md-2">
          <label for="txt_pront">Prontuário</label>
          <input type="text" class="form-control" id="txt_pront" placeholder="" name="txt_pront" required="true">
        </div>
        <div class="form-group col-md-2">
          <label for="txt_cpf">CPF</label>
          <input type="text" class="form-control" id="txt_cpf" placeholder="" name="txt_cpf" required="true">
        </div>
        <div class="form-group col-md-4">
          <label for="txt_nome">Nome</label>
          <input type="text" class="form-control" id="txt_nome" placeholder="" name="txt_nome" required="true">
        </div>
        <div class="form-group col-md-4">
          <label for="txt_sobrenome">Sobrenome</label>
          <input type="text" class="form-control" id="txt_sobrenome" placeholder="" name="txt_sobrenome" required="true">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-3">
          <label for="slc_setor">Setor
            <a href="cadSetorView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_setor" name="slc_setor" required="true">
          <option value="" selected="">Selecione</option>
            <?php
              include '../modal/Setor.class.php';
              $array = array();
              $setor = new Setor;
              $array = $setor->findAll();

              foreach ($array as $valor) {
                  echo '<option value="'.$valor['id_setor'].'">'.$valor['dsc_setor'].'</option>';
              }
            ?>

          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="slc_cargo">Cargo
            <a href="cadCargoView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="slc_cargo" name="slc_cargo" required="true">
          <option value="" selected="">Selecione</option>
            <?php
              include '../modal/Cargo.class.php';
              $array = array();
              $cargo = new Cargo;
              $array = $cargo->findAll();

              foreach ($array as $valor) {
                  echo '<option value="'.$valor['id_cargo'].'">'.$valor['dsc_cargo'].'</option>';
              }
            ?>

          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="slc_sexo">Sexo</label>
          <select class="form-control selectpicker" id="slc_sexo" name="slc_sexo" required="true">
            <option value="" selected="">Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="date_nasc2">Data de Nascimento</label>
          <input type="text" class="form-control" id="date_nasc2" placeholder="" name="date_nasc2">
        </div>
        <div class="form-group col-md-2">
            <label for="slc_campus">Campus
            <a href="cadCampusView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
            </label>
            <select class="form-control selectpicker" id="slc_campus" name="slc_campus"  required="true">
              <option value="" selected="">Selecione</option>
              <?php
                include '../modal/Campus.class.php';
                $array = array();
                $campus = new Campus;
                $array = $campus->findAll();

                foreach ($array as $valor) {
                    echo '<option value="'.$valor['id_campus'].'">'.$valor['dsc_campus'].'</option>';
                }
            ?>
            </select>
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
</div>
<script type="text/javascript" src="../layout/js/ValidaForms/validaFuncionario.js"></script>
<?php include_once('includes/footerNovo.php'); ?>