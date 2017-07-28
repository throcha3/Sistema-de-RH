<?php 
  include_once '../modal/Cargo.class.php';


  $cargo = new Cargo;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';


  switch ($order) {
    case 'nome':
      $car = $cargo->findAllOrder('dsc_cargo ' .$y);
      break;
    case 'id':
      $car = $cargo->findAllOrder('id_cargo ' .$y);
      break;
    case 'setor':
      $car = $cargo->findAllOrder('id_setor ' .$y);
      break;
    case '':
      $car = $cargo->findAll();
      break;
    case 'pesq':
        if ($campo == 'descr') $car = $cargo->findAllPesq('dsc_cargo' ,$pesq);
      break;
    default:
      echo 'deu ruim';
      exit();
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
      

          <h2>Listagem de Cargo
              <a href="cadCargoView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2><br>
          
          <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <form method="POST" action="lstCargo.php">
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
                          <a href="lstCargo.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            if ($y == 'asc') echo '<a href="lstCargo.php?order=id&ord=desc">ID';
                            else echo '<a href="lstCargo.php?order=id">ID';
                            if ($order=='id' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='id' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstCargo.php?order=nome&ord=desc">Descrição';
                            else echo '<a href="lstCargo.php?order=nome">Descrição';
                            if ($order=='nome' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='nome' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstCargo.php?order=setor&ord=desc">Setor';
                            else echo '<a href="lstCargo.php?order=setor">Setor';
                            if ($order=='setor' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='setor' and $y=='desc') 
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
                      include '../modal/Setor.class.php'; 
                      $set = new Setor;
                      foreach ($car as $valor) {
                        $arrayS = $set->find($valor['id_setor']);
                        echo '<tr>
                        <td>
                            '. $valor['id_cargo'] . '
                        </td>
                       
                        <td>
                            '. $valor['dsc_cargo'] . ' 
                        </td>

                        <td>
                            '. $arrayS['dsc_setor'] . ' 
                        </td>
                        
                        <td >
                            <a href="altCargoView.php?id='. $valor['id_cargo'] . '" >Alterar</a> / <a href="altCargoView.php?op=del&id='. $valor['id_cargo'] . '">Deletar</a>
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
          $total = $cargo->BuscaTotal();
          echo "<p align='right'> Total de cargos: $total";
        ?>
       
   </div>
</div>

   <?php include_once('includes/footerNovo.php'); ?>