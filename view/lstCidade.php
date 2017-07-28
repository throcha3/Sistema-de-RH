<?php 
  include_once '../modal/Cidade.class.php';


  $cidade = new Cidade;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
    $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
    $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
    $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';


  switch ($order) {
    case 'desc':
      $cid = $cidade->findAllOrder('nome_cidade');
      break;
    case '':
      $cid = $cidade->findAll();
      break;
    case 'uf':
      $cid = $cidade->findAllOrder('cod_uf');
      break;
    case 'pesq':
        if ($campo == 'nome') $cid = $cidade->findAllPesq('nome_cidade' ,$pesq);
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
      

          <h2>Listagem de Cidades <a href="cadCidadeView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a></h2><br>

          <div class="bs-example" data-example-id="contextual-table">

          <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <form method="POST" action="lstCidade.php">
                      <div class="form-group col-md-3">
                        <select class="form-control selectpicker" id="slc_campo" name="slc_campo">
                            
                            <option value="nome">Nome</option>
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
                          <a href="lstCidade.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
                      </div>
                      <input type="hidden" name="order" value="pesq" >
                    </form>
                    
                </div> <!--row-->
            </div> <!-- panel-body -->
          </div> <!--panel-primary-->  

          <div class="bs-example" data-example-id="hoverable-table">
            <table class="table table-hover" >
                <thead>
                    <tr style="border-bottom-style: solid;">
                        <th>
                            <a href="lstCidade.php"># <?php if ($order=='') echo '<span class="glyphicon glyphicon-arrow-down"></span>';?></a>
                        </th>
                        <th>
                            <a href="lstCidade.php?order=desc">Descrição <?php if ($order=='desc') echo '<span class="glyphicon glyphicon-arrow-down"></span>';?></a>
                        </th>
                        <th>
                            <a href="lstCidade.php?order=uf">Estado <?php if ($order=='uf') echo '<span class="glyphicon glyphicon-arrow-down"></span>';?></a>
                        </th>
                        
                        <th >
                            Ações
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                      foreach ($cid as $valor) {
                        echo '<tr>
                        <th scope="row">
                            
                        <td>
                            '. $valor['nome_cidade'] . '
                        </td>
                        
                        <td>
                            '. $valor['cod_uf'] . '
                        </td>
                        <td >
                            <a href="altCidadeView.php?id='. $valor['id_cidade'] . '" >Alterar</a> / <a href="altCidadeView.php?op=del&id='. $valor['id_cidade'] . '">Deletar</a>
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
          $total = $cidade->BuscaTotal();
          echo "<p align='right'> Total de cidades: $total";
        ?>

      </div>
   </div>

   <?php include_once('includes/footerNovo.php'); ?>