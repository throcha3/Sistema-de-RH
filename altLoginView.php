<?php
  include_once '../modal/Usuario.class.php';
  $id        = (int)(isset($_GET['id']))              ? (int)$_GET['id']             : 0;
  $op        = (isset($_GET['op']))              ? $_GET['op']             : 'alt';

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
      <div class="row">
        <div class="form-group col-md-6">
          <label for="txt_login">Login</label>
          <input type="text" class="form-control" id="txt_login" placeholder="" name="txt_login" required="true" <?php echo 'value="'.$us['login']. '"' ?>>
        </div>
        <div class="form-group col-md-6">
          <label for="txt_senha">Senha</label>
          <input type="password" class="form-control" id="txt_senha" placeholder="" name="txt_senha" required="true" >
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-8">
          <label for="txt_email">Email</label>
          <input type="email" class="form-control" id="txt_email" placeholder="" name="txt_email" required="true" <?php echo 'value="'.$us['email']. '"' ?>>
        </div>
      </div>
      <br />
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
<!-- <script type="text/javascript" src="../layout/js/ValidaForms/validausuario.js"></script> -->
<?php include_once('includes/footerNovo.php'); ?>


