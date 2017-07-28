<?php 
  include_once '../modal/Usuario.class.php';


  $user = new Usuario;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';

  switch ($order) {
    case 'login':
      $us = $user->findAllOrder('login ' .$y);
      break;
    case 'nome':
      $us = $user->findAllOrder('nome ' .$y);
      break;
    case '':
      $us = $user->findAll();
      break;
    case 'pesq':
        if ($campo == 'login'){
        $us = $user->findAllPesq('login' ,$pesq);
        break;	
        } 
    default:
      echo 'ERRO';
      break;
  }
 
  $contador = 1;
  //echo '<pre>';
  //var_dump($func);
  //exit();
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
      

          <h2>Listagem de Usuários
              <a href="cadLoginView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2><br>
          

          <div class="panel panel-primary">
              <div class="panel-body">
                  <div class="row">
                      <form method="POST" action="lstLogin.php">
                        <div class="form-group col-md-3">
                          <select class="form-control selectpicker" id="slc_campo" name="slc_campo">
                              <option value="login">Login</option>
                          </select>
                        </div>

                        <div class="form-group col-md-6">
                          <div class="input-group">
                            <input type="text" class="form-control" aria-label="..." name="txt_pesq" id="txt_pesq">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></button>
                              </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-md-6 -->

                        <div class="form-group col-md-1">
                            <a href="lstLogin.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
                        </div>
                        <input type="hidden" name="order" value="pesq" >
                      </form>
                  </div> <!--row-->
              </div> <!-- panel-body -->
          </div> <!--panel-primary-->

          <div class="bs-example" data-example-id="contextual-table">

          <div class="bs-example" data-example-id="hoverable-table">
            <table class="table table-hover" >
                <thead>
                    <tr style="border-bottom-style: solid;">
                        
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstLogin.php?order=login&ord=desc">Login';
                            else echo '<a href="lstLogin.php?order=login">Login';
                            if ($order=='login' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='login' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstLogin.php?order=nome&ord=desc">Nome';
                            else echo '<a href="lstLogin.php?order=nome">Nome';
                            if ($order=='nome' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='nome' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th >
                            Ações
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 

                      foreach ($us as $valor) {
                        echo '<tr>

                            
                        <td>
                            '. $valor['login'] . '
                        </td>
                       
                        <td>
                            '. $valor['nome'] . ' 
                        </td>
                        
                        <td >
                            <a href="altLoginView.php?id='. $valor['id'] . '" >Alterar</a> / <a href="altLoginView.php?op=del&id='. $valor['id'] . '">Deletar</a>
                        </td>
                      
                    </tr>  ';
                      }
                    ?>

                    
                </tbody>
             </table>

          </div>

        </div>
        <hr />
   </div>
  </div>

   <?php include_once('includes/footerNovo.php'); ?>