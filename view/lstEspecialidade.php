<?php 
  include_once '../modal/Especialidade.class.php';


  $especialidade = new Especialidade;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';

  switch ($order) {
    case 'descricao':
      $espec = $especialidade->findAllOrder('dsc_especialidade ' .$y);
      break;
    case '':
      $espec = $especialidade->findAllOrder('id_especialidade ' .$y);
      break;
    case 'pesq':
        if ($campo == 'descr') $espec = $especialidade->findAllPesq('dsc_especialidade' ,$pesq);
      break;
    default:
      echo 'deu ruim';
      break;
  }
 
  $contador = 1;
  //echo '<pre>';
  //var_dump($enf);
  //exit();
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
      

          <h2>Listagem de Especialidade
            <a href="cadEspecialidadeView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2><br>

          <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <form method="POST" action="lstEspecialidade.php">
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
                          <a href="lstEspecialidade.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            if ($y == 'asc') echo '<a href="lstEspecialidade.php?ord=desc">#';
                            else echo '<a href="lstEspecialidade.php?">#';
                            if ($order=='' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstEspecialidade.php?ordem=descricao&ord=desc">Descrição';
                            else echo '<a href="lstEspecialidade.php?ordem=descricao">Descrição';
                            if ($order=='descricao' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='descricao' and $y=='desc') 
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
                    //. $contador++ .
                      foreach ($espec as $valor) {
                        echo '<tr>
                        <th scope="row">
                            
                        <td>
                            '. $valor['dsc_especialidade'] . '
                        </td>
                        <td >
                            <a href="altEspecialidadeView.php?id='. $valor['id_especialidade'] . '" >Alterar</a> / <a href="altEspecialidadeView.php?op=del&id='. $valor['id_especialidade'] . '">Deletar</a>
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
          $total = $especialidade->BuscaTotal();
          echo "<p align='right'> Total de especialidades: $total";
        ?>


        </div>
   </div>

   <?php include_once('includes/footerNovo.php'); ?>