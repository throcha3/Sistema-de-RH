<?php 
  include_once '../modal/Setor.class.php';


  $setor = new Setor;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';

  switch ($order) {
    case 'nome':
      $set = $setor->findAllOrder('dsc_setor ' .$y);
      break;
    case 'id':
      $set = $setor->findAllOrder('id_setor ' .$y);
      break;
    case '':
      $set = $setor->findAll();
      break;
    case 'pesq':
        if ($campo == 'descr') $set = $setor->findAllPesq('dsc_setor' ,$pesq);
      break;
    default:
      echo 'deu ruim';
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
      

          <h2>Listagem de Setor
              <a href="cadSetorView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2><br>
          

          <div class="panel panel-primary">
              <div class="panel-body">
                  <div class="row">
                      <form method="POST" action="lstSetor.php">
                        <div class="form-group col-md-3">
                          <select class="form-control selectpicker" id="slc_campo" name="slc_campo">
                              <option value="descr">Descrição</option>
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
                            <a href="lstSetor.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            if ($y == 'asc') echo '<a href="lstSetor.php?order=id&ord=desc">ID';
                            else echo '<a href="lstSetor.php?order=id">ID';
                            if ($order=='id' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='id' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstSetor.php?order=nome&ord=desc">Descrição';
                            else echo '<a href="lstSetor.php?order=nome">Descrição';
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
                      foreach ($set as $valor) {
                        echo '<tr>

                            
                        <td>
                            '. $valor['id_setor'] . '
                        </td>
                       
                        <td>
                            '. $valor['dsc_setor'] . ' 
                        </td>
                        
                        <td >
                            <a href="altSetorView.php?id='. $valor['id_setor'] . '" >Alterar</a> / <a href="altSetorView.php?op=del&id='. $valor['id_setor'] . '">Deletar</a>
                        </td>
                      
                    </tr>  ';
                      }
                    ?>

                    
                </tbody>
             </table>

          </div>

        </div>
        <hr />
        <?php
          $total = $setor->BuscaTotal();
          echo "<p align='right'> Total de setores: $total";
        ?>
   </div>
  </div>

   <?php include_once('includes/footerNovo.php'); ?>