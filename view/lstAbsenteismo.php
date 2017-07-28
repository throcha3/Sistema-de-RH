<?php
  include_once '../modal/Absenteismo.class.php';


  $absenteismo = new Absenteismo;
  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';

  switch ($order) {
    case 'id':
      $abs = $absenteismo->findAllOrder('id_absenteismo');
      break;
    case 'func':
      $abs = $absenteismo->findAllOrder('id_funcionario');
      break;
    case 'enf':
      $abs = $absenteismo->findAllOrder('id_enfermeiro');
      break;
    case 'pesq':
      if ($campo == 'funcionario') $abs = $absenteismo->findAllPesqFuncionario('cad_funcionario.nome_funcionario' ,$pesq);
      else if ($campo == 'medico') $abs = $absenteismo->findAllPesqMed('cad_medico.nome_medico' ,$pesq);
      break;
    case '':
      $abs = $absenteismo->findAll();
      break;
    default:
      echo 'deu ruim';
      break;
  }

  $contador = 1;
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">


          <h2>Listagem de Absenteísmos
          <a href="cadAbsenteismoView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a></h2></br/>

          <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <form method="POST" action="lstAbsenteismo.php">
                      <div class="form-group col-md-3">
                        <select class="form-control selectpicker" id="slc_campo" name="slc_campo">
                            <option value="funcionario">Funcionário</option>
                            <option value="medico">Médico</option>
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
                          <a href="lstAbsenteismo.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            <a href="lstAbsenteismo.php?order=id">ID <?php if ($order=='id') echo '<span class="glyphicon glyphicon-arrow-down"></span>';?></a>
                        </th>
                        <th>
                            <a href="lstAbsenteismo.php?order=func">Funcionário<?php if ($order=='func') echo '<span class="glyphicon glyphicon-arrow-down"></span>';?></a>
                        </th>
                        <th>
                            <a href="lstAbsenteismo.php?order=enf">Médico<?php if ($order=='enf') echo '<span class="glyphicon glyphicon-arrow-down"></span>';?></a>
                        </th>
                        <th>
                            Tipo do Documento
                        </th>
                        <th>
                            Data Inicial
                        </th>
                        <th>
                            Anexo
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
                      include '../modal/Medico.class.php';
                      $med = new Medico;
                      //$array = $func->find();
                      //. $contador++ .
                      foreach ($abs as $valor) {
                        $arrayF = $func->find($valor['id_funcionario']);
                        $arrayE = $med->find($valor['id_medico']);

                        echo '<tr>

                        <td>
                            '. $valor['id_absenteismo'] . '
                        </td>

                        <td>
                            '. $arrayF['nome_funcionario'] . '
                        </td>
                        <td>
                            '. $arrayE['nome_medico'] .' '. $arrayE['sobrenome_medico'] . '
                        </td>
                        <td>
                            '. $valor['tipo_doc'] .'
                        </td>';
                        if ($valor['tipo_doc'] === 'atestado') {
                            $dataFinal = reverteData($valor["data_inicio"]) .' - '. reverteData($valor["data_final"]);
                            echo "<td>$dataFinal</td>";
                        }else {
                          $dataFinal = reverteData($valor["data_inicio"]) .'  '. substr($valor["data_inicio"], 11, 5) .' - '. substr($valor["data_final"], 11,5);

                        echo "<td>$dataFinal</td>";
                        };
                        echo '
                        <td>
                            <a href="'. $valor["arquivo_upload"] .'" target="_blank" title="'. $valor['arquivo_nome'] .'">Baixar Anexo</a>
                        </td>
                        <td >
                            <a href="altAbsenteismoView.php?id='. $valor['id_absenteismo'] . '" >Alterar</a> / 
                            <a href="altAbsenteismoView.php?op=del&id='. $valor['id_absenteismo'] . '" >Deletar</a>
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
          $total = $absenteismo->BuscaTotal();
          echo "<p align='right'> Total de absenteismos: $total";
        ?>


   </div>
</div>
   <?php include_once('includes/footerNovo.php'); ?>