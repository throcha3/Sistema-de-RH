<?php 
  include_once '../modal/Presenteismo.class.php';


  $presenteismo = new Presenteismo;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';

  switch ($order) {
    case 'id':
      $pres = $presenteismo->findAllOrder('id_presenteismo ' .$y);
      break;
    case 'func':
      $pres = $presenteismo->findAllOrderFunc('nome_funcionario ' .$y);
      break;
    case 'enf':
      $pres = $presenteismo->findAllOrder('id_enfermeiro ' .$y);
      break;
    case 'data':
      $pres = $presenteismo->findAllOrder('data_presenteismo ' .$y);
      break;
    case 'pesq':
        if ($campo == 'funcionario') $pres = $presenteismo->findAllPesqFuncionario('cad_funcionario.nome_funcionario',$pesq);
        else if ($campo == 'enfermeiro') $pres = $presenteismo->findAllPesqEnfermeiro('cad_enfermeiro.nome_enferm' ,$pesq);
      break;
    case '':
      $pres = $presenteismo->findAll();
      break;
    default:
      echo 'deu ruim';
      break;
  }
 
  $contador = 1;
  //echo '<pre>';
  //var_dump($pres);

  //exit(); Essa tela ta organizando pelo id do funcionario e não pelo seu nome... mentira agora ta certo
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
      

          <h2>Listagem de Presenteísmos
              <a href="cadPresenteismoView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2><br>

          <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <form method="POST" action="lstPresenteismo.php">
                      <div class="form-group col-md-3">
                        <select class="form-control selectpicker" id="slc_campo" name="slc_campo">
                            <option value="funcionario">Funcionário</option>
                            <option value="enfermeiro">Enfemeiro</option>
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
                          <a href="lstPresenteismo.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            if ($y == 'asc') echo '<a href="lstPresenteismo.php?order=id&ord=desc">ID';
                            else echo '<a href="lstPresenteismo.php?order=id">ID';
                            if ($order=='id' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='id' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstPresenteismo.php?order=func&ord=desc">Funcionário';
                            else echo '<a href="lstPresenteismo.php?order=func">Funcionário';
                            if ($order=='func' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='func' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstPresenteismo.php?order=enf&ord=desc">Enfermeiro';
                            else echo '<a href="lstPresenteismo.php?order=enf">Enfermeiro';
                            if ($order=='enf' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='enf' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                          <?php 
                            if ($y == 'asc') echo '<a href="lstPresenteismo.php?order=data&ord=desc">Data';
                            else echo '<a href="lstPresenteismo.php?order=data">Data';
                            if ($order=='data' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='data' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            Problema
                        </th>
                        <th >
                            Ações
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      include '../modal/FuncionarioCrud.php'; 
                      $func = new FuncionarioCrud;
                      include '../modal/Enfermeiro.class.php'; 
                      $enf = new Enfermeiro;
                      //$array = $func->find();
                    //. $contador++ .
                      foreach ($pres as $valor) {
                        $arrayF = $func->find($valor['id_funcionario']);
                        $arrayE = $enf->find($valor['id_enfermeiro']);
                        echo '<tr>

                        <td>
                            '. $valor['id_presenteismo'] . '
                        </td>
                       
                        <td>
                            '. $arrayF['cad_prontuario'] . ' - '. $arrayF['nome_funcionario'] . ' '. $arrayF['sobrenome_funcionario'] . '
                        </td>
                        <td>
                            '. $arrayE['coren_enferm'] . ' - ' . $arrayE['nome_enferm'] . ' ' . $arrayE['sobrenome_enferm'] . '
                        </td>

                        <td>
                            '. reverteData($valor['data_presenteismo'])  . ' 
                        </td>

                        <td>
                            '. $valor['cad_problema'] . '
                        </td>
                        <td >
                            <a href="altPresenteismoView.php?id='. $valor['id_presenteismo'] . '" >Alterar</a> / <a href="altPresenteismoView.php?op=del&id='. $valor['id_presenteismo'] . '" >Deletar</a> 
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
          $total = $presenteismo->BuscaTotal();
          echo "<p align='right'> Total de presenteísmos: $total";
        ?>

  </div>
</div>
   <?php include_once('includes/footerNovo.php'); ?>