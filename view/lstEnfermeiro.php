<?php 
  include_once '../modal/Enfermeiro.class.php';


  $enfermeiro =  new Enfermeiro;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';

  switch ($order) {
    case 'nome':
      $enf = $enfermeiro->findAllOrder('nome_enferm '.$y);
      break;
    case '':
      $enf = $enfermeiro->findAllOrder('id_enferm ' .$y);
      break;
    case 'coren':
      $enf = $enfermeiro->findAllOrder('coren_enferm ' .$y);
      break;
    case 'pesq':
      if ($campo == 'coren') $enf = $enfermeiro->findAllPesq('coren_enferm' ,$pesq);
      else if ($campo == 'nome') $enf = $enfermeiro->findAllPesqDoisCampos('nome_enferm','sobrenome_enferm' ,$pesq);
      
      break;
    default:
      echo 'deu ruim';
      include('includes/footer.php');
      break;
  }

  $contador = 1;
  /*echo '<pre>';
  var_dump($enf);
  exit();*/
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
      

          <h2>Listagem de Enfermeiros <a href="cadEnfermeiroView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a></h2><br>

          <div class="panel panel-primary">
            <div class="panel-body">
            <div class="row">
                <form method="POST" action="lstEnfermeiro.php">
                  <div class="form-group col-md-3">
                    <select class="form-control selectpicker" id="slc_campo" name="slc_campo">
                        <option value="coren">COREN</option>
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
                      <a href="lstEnfermeiro.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            if ($y == 'asc') echo '<a href="lstEnfermeiro.php?ord=desc">#';
                            else echo '<a href="lstEnfermeiro.php?">#';
                            if ($order=='' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstEnfermeiro.php?order=coren&ord=desc">COREN';
                            else echo '<a href="lstEnfermeiro.php?order=coren">COREN';
                            if ($order=='coren' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='coren' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstEnfermeiro.php?order=nome&ord=desc">Nome';
                            else echo '<a href="lstEnfermeiro.php?order=nome">Nome';
                            if ($order=='nome' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='nome' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        
                        <th>
                            Campus
                        </th>
                        <th >
                            Ações
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      include '../modal/Campus.class.php'; 
                      $cam = new Campus;
                  
                      foreach ($enf as $valor) {
                        $arrayC = $cam->find($valor['id_campus']);
                        echo '<tr' ;
                        if ($valor['inativo'] == 1 ) echo ' class="danger"';
                        echo '>
                        <th scope="row">
                            
                        <td>
                            '. $valor['coren_enferm'] . '
                        </td>
                       
                        <td>
                            '. $valor['nome_enferm'] . ' ' .$valor['sobrenome_enferm'] .  '
                        </td>
                        
                        <td>
                            '. $arrayC['dsc_campus'] . '
                        </td>';
                        if ($valor['inativo'] == 1 ) echo '<td> 
                          <a href="altEnfermeiroView.php?op=ati&id='. $valor['id_enferm'] . '" >Reativar</a>
                        </td>';
                        else echo '   
                        <td >
                            <a href="altEnfermeiroView.php?id='. $valor['id_enferm'] . '" >Alterar</a> / <a href="altEnfermeiroView.php?op=del&id='. $valor['id_enferm'] . '">Desativar</a>
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
          $total = $enfermeiro->BuscaTotal();
          echo "<p align='right'> Total de enfermeiros: $total";
        ?>



  </div>
</div>
   <?php include_once('includes/footerNovo.php'); ?>