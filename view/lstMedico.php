<?php 
  include_once '../modal/Medico.class.php';


  $medico = new Medico;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';

  switch ($order) {
    case 'nome':
      $med = $medico->findAllOrder('nome_medico ' .$y);
      break;
    case '':
      $med = $medico->findAllOrder('id_medico ' .$y);
      break;
    case 'crm':
      $med = $medico->findAllOrder('cad_crm ' .$y);
      break;
    case 'espec':
      $med = $medico->findAllOrder('id_especialidade ' .$y);
      break;
    case 'cidade':
      $med = $medico->findAllOrder('id_cidade_atuacao ' .$y);
      break;
    case 'pesq':
        if ($campo == 'crm') $med = $medico->findAllPesq('cad_crm' ,$pesq);
        else if ($campo == 'nome') $med = $medico->findAllPesqDoisCampos('nome_medico','sobrenome_medico' ,$pesq);
      break;      
    default:
      echo 'deu ruim';
      break;
  }
 
  $contador = 1;
  //echo '<pre>';
  //var_dump($med);
  //exit();
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
      

          <h2>Listagem de Médicos
              <a href="cadMedicoView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2><br>

          <div class="panel panel-primary">
            <div class="panel-body">
                <div class="row">
                    <form method="POST" action="lstMedico.php">
                      <div class="form-group col-md-3">
                        <select class="form-control selectpicker" id="slc_campo" name="slc_campo">
                            <option value="crm">CRM/CRO</option>
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
                          <a href="lstMedico.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
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
                            if ($y == 'asc') echo '<a href="lstMedico.php?ord=desc">#';
                            else echo '<a href="lstMedico.php?">#';
                            if ($order=='' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstMedico.php?order=crm&ord=desc">CRM/CRO';
                            else echo '<a href="lstMedico.php?order=crm">CRM';
                            if ($order=='crm' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='crm' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstMedico.php?order=nome&ord=desc">Nome';
                            else echo '<a href="lstMedico.php?order=nome">Nome';
                            if ($order=='nome' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='nome' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>

                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstMedico.php?order=espec&ord=desc">Especialidade';
                            else echo '<a href="lstMedico.php?order=espec">Especialidade';
                            if ($order=='espec' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='espec' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>

                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstMedico.php?order=cidade&ord=desc">Cidade';
                            else echo '<a href="lstMedico.php?order=cidade">Cidade';
                            if ($order=='cidade' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='cidade' and $y=='desc') 
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
                      include '../modal/Especialidade.class.php'; 
                      $espec = new Especialidade;
                      include '../modal/Cidade.class.php'; 
                      $cid = new Cidade; 
                    //. $contador++ .
                      foreach ($med as $valor) {
                        $arrayE = $espec->find($valor['id_especialidade']);
                        $arrayC = $cid->find($valor['id_cidade_atuacao']);
                        echo '<tr' ;
                        if ($valor['inativo'] == 1 ) echo ' class="danger"';
                        echo '>
                        <th scope="row">
                            
                        <td>
                            '. $valor['cad_crm'] . '
                        </td>
                       
                        <td>
                            '. $valor['nome_medico'] . ' ' .$valor['sobrenome_medico'] .  '
                        </td>
                        
                        <td>
                            '. $arrayE['dsc_especialidade'] . '
                        </td>
                        <td>
                            '. $arrayC['nome_cidade'] . '
                        </td>';
                        if ($valor['inativo'] == 1 ) echo '<td> 
                          <a href="altMedicoView.php?op=ati&id='. $valor['id_medico'] . '" >Reativar</a>
                        </td>';
                        else echo '                        
                        <td >
                            <a href="altMedicoView.php?id='. $valor['id_medico'] . '" >Alterar</a> / <a href="altMedicoView.php?op=del&id='. $valor['id_medico'] . '">Desativar</a>
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
          $total = $medico->BuscaTotal();
          echo "<p align='right'> Total de medicos: $total";
        ?>



   </div>
</div>
   <?php include_once('includes/footerNovo.php'); ?>