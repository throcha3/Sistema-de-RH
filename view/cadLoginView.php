<?php  
  
 include_once('includes/novoHeader.php');
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


    <h3 class="page-header display-4">Cadastro de Usuário</h3>

    <hr />

    <form action="../control/loginControl.php" class="container" method="POST" id="UsuarioForm">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_nome">Nome de Exibição</label>
          <input type="text" class="form-control" id="txt_nome" placeholder="Digite seu nome" name="txt_nome" required="true">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_login">Email para login</label>
          <input type="email" class="form-control" id="txt_login" placeholder="Digite seu email" name="txt_login" required="true">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_senha">Senha</label>
          <input type="password" class="form-control" id="txt_senha" placeholder="" maxlength="25" name="txt_senha" required="true">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_c_senha">Confirme sua Senha</label>
          <input type="password" class="form-control" id="txt_c_senha" placeholder="" maxlength="25" name="txt_c_senha" required="true">
        </div>
      </div>
      <br />
      
      <h4> <b> Este usuário terá acesso a: </b></h4>
      <div class="row">
        <div class="col-md-12" style="padding-left: 50px">
          <label class="checkbox-inline"><input type="checkbox" name="presenteismo" value="1">Presenteísmo</label>
          <label class="checkbox-inline"><input type="checkbox" name="absenteismo" value="1">Absenteísmo</label>
          <label class="checkbox-inline"><input type="checkbox" name="funcionario" value="1">Funcionário</label>
          <label class="checkbox-inline"><input type="checkbox" name="enfermeiro" value="1">Enfermeiro</label>
          <label class="checkbox-inline"><input type="checkbox" name="medico" value="1">Médico</label>
          <label class="checkbox-inline"><input type="checkbox" name="setor" value="1">Setor</label>
          <label class="checkbox-inline"><input type="checkbox" name="cargo" value="1">Cargo</label>
          <label class="checkbox-inline"><input type="checkbox" name="cid" value="1">CID</label>        
          <label class="checkbox-inline"><input type="checkbox" name="especialidade" value="1">Especialidade</label>
          <label class="checkbox-inline"><input type="checkbox" name="questionario" value="1">Questionario</label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding-left: 50px">
          <label class="checkbox-inline"><input type="checkbox" name="campus" value="1">Campus</label>
          <label class="checkbox-inline"><input type="checkbox" name="cidade" value="1">Cidade</label>
          <label class="checkbox-inline"><input type="checkbox" name="estado" value="1">Estado</label>
          <label class="checkbox-inline"><input type="checkbox" name="usuario" value="1">Usuário</label>
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
<!-- <script type="text/javascript" src="../layout/js/ValidaForms/validaUsuario.js"></script> -->
<?php include_once('includes/footerNovo.php'); ?>




