<?php
  include_once('includes/novoHeader.php');
  include_once '../modal/TipoAfastamento.class.php';


  $TipoAfastamento = new TipoAfastamento;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';


  switch ($order) {
    case 'descricao':
      $cam = $TipoAfastamento->findAllOrder('dsc_tipo_afastamento ' .$y);
      break;

    case '':
      $cam = $TipoAfastamento->findAll();
      break;
    case 'pesq':
      if ($campo == 'descr') $cam = $TipoAfastamento->findAllPesq('dsc_tipo_afastamento' ,$pesq);
    break;
    default:
      header('lstTipoAfastamento.php?result=0');
      break;
  }

  $contador = 1;
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="jumbotron">


          <h2>Listagem de tipos de afastamento
            <a href="cadTipoAfastamentoView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2><br>

           <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <form method="POST" action="lstTipoAfastamento.php">

                      <div class="form-group col-md-10">
                        <div class="input-group">
                          <input type="text" class="form-control" aria-label="..." name="txt_pesq" id="txt_pesq" placeholder="Pesquise um tipo de afastamento">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></button>
                            </span>
                          </div><!-- /input-group -->
                      </div><!-- /.col-md-6 -->

                      <div class="form-group col-md-1">
                          <a href="lstTipoAfastamento.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            if ($y == 'asc') echo '<a href="lstTipoAfastamento.php?order=descricao&ord=desc">Descrição';
                            else echo '<a href="lstTipoAfastamento.php?order=descricao">descricao';
                            if ($order=='descricao' and $y=='asc')
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='descricao' and $y=='desc')
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                       	<th>
                       		
                       	</th>
                       	<th> 

                       	</th>
                      	<th class="pull-right">
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
                            '. $valor['dsc_tipo_afasta'] . '
                        </td>
                        <td> </td>
                        <td> </td>
                        <td class="pull-right">
                            <a href="altTipoAfastamentoView.php?id='. $valor['id_tipo_afasta'] . '" >Alterar</a> /
                            <a href="altTipoAfastamentoView.php?op=del&id='. $valor['id_tipo_afasta'] . '">Deletar</a>
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