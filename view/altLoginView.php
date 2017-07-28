<?php
  include_once '../modal/Usuario.class.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

  if ($op != 'del'){
    $required = 'required="true"';
  }//para nao exigir preencher os campos para deletar

  $usuario = new Usuario;



  if ($id > 0) $us = $usuario->find($id);
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
      if ($op == 'del') echo '<h3 class="page-header display-4">Exclusão de Usuário</h3>';
      else echo '<h3 class="page-header display-4">Alteração de Usuário</h3>';
    ?>

    <hr />

   <form action="../control/loginControl.php" class="container" method="POST" id="usuarioForm"> 
     <!-- <form action="#" class="container" method="POST" id="usuarioForm">-->
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_login">Email para login</label>
          <input type="email" class="form-control" id="txt_login" placeholder="" name="txt_login" <?php echo $required;?> <?php echo 'value="'.$us['login']. '"' ?>>
        </div>
        <div class="form-group col-md-6">
          <label for="txt_nova_senha">Nova Senha</label>
          <input type="password" class="form-control" id="txt_nova_senha" placeholder="" name="txt_nova_senha" <?php echo $required;?> >
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_nome">Nome de Exibição</label>
          <input type="text" class="form-control" id="txt_nome" placeholder="" name="txt_nome" <?php echo $required;?> <?php echo 'value="'.$us['nome']. '"' ?>>
        </div>
        <div class="form-group col-md-6">
          <label for="txt_c_senha">Confirme a Nova Senha</label>
          <input type="password" class="form-control" id="txt_c_senha" placeholder="" name="txt_c_senha" <?php echo $required;?> >
        </div>

      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_senha">Senha Antiga</label>
          <input type="password" class="form-control" id="txt_senha" placeholder="" name="txt_senha" <?php echo $required;?> >
        </div>

      </div>
      <br />
      <h4> <b> Este usuário terá acesso a: </b></h4>
      <div class="row">
        <div class="col-md-12" style="padding-left: 50px">
          <label class="checkbox-inline"><input type="checkbox" name="presenteismo" value="1"<?php if($us['presenteismo'])echo ' checked="true"' ?> >Presenteísmo</label>
          <label class="checkbox-inline"><input type="checkbox" name="absenteismo" value="1"<?php if($us['absenteismo'])echo ' checked="true"' ?>>Absenteísmo</label>
          <label class="checkbox-inline"><input type="checkbox" name="funcionario" value="1"<?php if($us['funcionario'])echo ' checked="true"' ?>>Funcionário</label>
          <label class="checkbox-inline"><input type="checkbox" name="enfermeiro" value="1"<?php if($us['enfermeiro'])echo ' checked="true"' ?>>Enfermeiro</label>
          <label class="checkbox-inline"><input type="checkbox" name="medico" value="1"<?php if($us['medico'])echo ' checked="true"' ?>>Médico</label>
          <label class="checkbox-inline"><input type="checkbox" name="setor" value="1"<?php if($us['setor'])echo ' checked="true"' ?>>Setor</label>
          <label class="checkbox-inline"><input type="checkbox" name="cargo" value="1"<?php if($us['cargo'])echo ' checked="true"' ?>>Cargo</label>
          <label class="checkbox-inline"><input type="checkbox" name="cid" value="1"<?php if($us['cid'])echo ' checked="true"' ?>>CID</label>        
          <label class="checkbox-inline"><input type="checkbox" name="especialidade" value="1"<?php if($us['especialidade'])echo ' checked="true"' ?>>Especialidade</label>
          <label class="checkbox-inline"><input type="checkbox" name="questionario" value="1"<?php if($us['questionario'])echo ' checked="true"' ?>>Questionario</label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12" style="padding-left: 50px">
          <label class="checkbox-inline"><input type="checkbox" name="campus" value="1"<?php if($us['campus'])echo ' checked="true"' ?>>Campuss</label>
          <label class="checkbox-inline"><input type="checkbox" name="cidade" value="1"<?php if($us['cidade'])echo ' checked="true"' ?>>Cidade</label>
          <label class="checkbox-inline"><input type="checkbox" name="estado" value="1"<?php if($us['estado'])echo ' checked="true"' ?>>Estado</label>
          <label class="checkbox-inline"><input type="checkbox" name="usuario" value="1"<?php if($us['usuario'])echo ' checked="true"' ?>>Usuario</label>
        </div>
      </div>

      <br />
      <div class="row">
        <div class="col-md-12"> 
          <input type="hidden" name="id" <?php echo 'value="'.$id.'"'?> >
          <?php 
            if ($op == 'del') echo '<button type="submit" class="btn btn-danger" id="op" name="op" value="DEL">Deletar</button>';
            else echo '<button type="submit" class="btn btn-primary" id="op" name="op" value="ALT" >Alterar</button>';
          ?>
          <a href="#" class="btn btn-default" onclick="goBack()">Cancelar</a>
        </div>
      </div>

    </form>
  </div>
  <script >
    var c_senha = document.getElementById('txt_c_senha');
    var n_senha = document.getElementById('txt_nova_senha');

    document.getElementById("op").onclick = function(e) {
      alert('document.getElementById("txt_c_senha").value');
      e.preventDefault();
    }
  </script>
<!-- <script type="text/javascript" src="../layout/js/ValidaForms/validausuario.js"></script> -->
<?php include_once('includes/footerNovo.php'); ?>


