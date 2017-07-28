<?php 
  include_once('includes/novoHeader.php');
  include_once '../modal/Campus.class.php';


  $campus = new Campus;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';


  switch ($order) {
    case 'nome':
      $cam = $campus->findAllOrder('dsc_campus ' .$y);
      break;
    case 'est':
      $cam = $campus->findAllOrder('id_estado ' .$y);
      break;
    case 'cid':
      $cam = $campus->findAllOrder('id_cidade ' .$y);
      break;
    case '':
      $cam = $campus->findAll();
      break;
    case 'pesq':
      if ($campo == 'descr') $cam = $campus->findAllPesq('dsc_campus' ,$pesq);
    break;
    default:
      header('lstCampus.php?result=0');
      break;
  }
 
  $contador = 1;
  //echo '<pre>';
  //var_dump($func);
  //exit();
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="jumbotron">
      

          <h2>Listagem de Campus
            <a href="cadCampusView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2><br>

          <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <form method="POST" action="lstCampus.php">
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
                          <a href="lstCampus.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            if ($y == 'asc') echo '<a href="lstCampus.php?order=nome&ord=desc">Nome';
                            else echo '<a href="lstCampus.php?order=nome">Nome';
                            if ($order=='nome' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='nome' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstCampus.php?order=cid&ord=desc">Cidade';
                            else echo '<a href="lstCampus.php?order=cid">Cidade';
                            if ($order=='cid' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='cid' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                          <?php 
                            if ($y == 'asc') echo '<a href="lstCampus.php?order=est&ord=desc">Estado';
                            else echo '<a href="lstCampus.php?order=est">Estado';
                            if ($order=='est' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='est' and $y=='desc') 
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
                      include '../modal/Cidade.class.php'; 
                      $cid = new Cidade;
                      include '../modal/Estado.class.php'; 
                      $est = new Estado;
                      foreach ($cam as $valor) {
                        $arrayE = $est->find($valor['id_estado']);
                        $arrayC = $cid->find($valor['id_cidade']);
                        echo '<tr>
                        <td>
                            '. $valor['dsc_campus'] . '
                        </td>
                       
                        <td>
                            '. $arrayC['nome_cidade'] . ' 
                        </td>

                        <td>
                            '. $arrayE['nome_uf'] . ' 
                        </td>
                        
                        <td >
                            <a href="altCampusView.php?id='. $valor['id_campus'] . '" >Alterar</a> / <a href="altCampusView.php?op=del&id='. $valor['id_campus'] . '">Deletar</a>
                        </td>
                      
                    </tr>  ';
                      }
                      $cid = null;
                      $est = null;
                    ?>

                    
                </tbody>
             </table>

          </div>

        </div>
        <hr />
   </div>

  </div>
   <?php include_once('includes/footerNovo.php'); ?>