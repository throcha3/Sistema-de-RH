<?php 
  include_once '../modal/FuncionarioCrud.php';


  $funcionario = new FuncionarioCrud;

  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';

  switch ($order) {
    case 'nome':
      $func = $funcionario->findAllOrder('nome_funcionario '.$y);
      break;
    case 'pront':
      $func = $funcionario->findAllOrder('cad_prontuario '.$y);
      break;
    case 'setor':
      $func = $funcionario->findAllOrder('id_setor '.$y);
      break;
    case 'pesq':
      if ($campo == 'prontuario') $func = $funcionario->findAllPesq('cad_prontuario' ,$pesq);
      else if ($campo == 'nome') $func = $funcionario->findAllPesqDoisCampos('nome_funcionario','sobrenome_funcionario' ,$pesq);
      break;
    case '':
      $func = $funcionario->findAll();
      break;
    default:
      echo 'ERRO';
      break;
  }

  $contador = 1;
  /*echo '<pre>';
  var_dump($func);
  exit();*/
  include_once('includes/novoHeader.php');
?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
      <div class="jumbotron">
      

          <h2>Listagem de Funcionários
              <a href="cadFuncionarioView.php"><button type="button" class="btn btn-primary pull-right">Novo Cadastro</button></a>
          </h2>
          <br>

          <div class="panel panel-primary">
            <div class="panel-body">
            <div class="row">
                <form method="POST" action="lstFuncionario.php">
                  <div class="form-group col-md-3">
                    <select class="form-control selectpicker" id="slc_campo" name="slc_campo">
                        <option value="prontuario">Prontuário</option>
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
                      <a href="lstFuncionario.php"><button type="button" class="btn btn-default pull-right">Limpar</button></a>
                  </div>
                  <input type="hidden" name="order" value="pesq">
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
                            if ($y == 'asc') echo '<a href="lstFuncionario.php?order=pront&ord=desc">Prontuário';
                            else echo '<a href="lstFuncionario.php?order=pront">Prontuário';
                            if ($order=='pront' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='pront' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstFuncionario.php?order=nome&ord=desc">Nome';
                            else echo '<a href="lstFuncionario.php?order=nome">Nome';
                            if ($order=='nome' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='nome' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            <?php 
                            if ($y == 'asc') echo '<a href="lstFuncionario.php?order=setor&ord=desc">Setor';
                            else echo '<a href="lstFuncionario.php?order=setor">Setor';
                            if ($order=='setor' and $y=='asc') 
                              echo '<span class="glyphicon glyphicon-arrow-down"></span>';
                            if ($order=='setor' and $y=='desc') 
                              echo '<span class="glyphicon glyphicon-arrow-up"></span>';
                          ?>
                          </a>
                        </th>
                        <th>
                            Cargo
                        </th>
                        <th >
                            Ações
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      include '../modal/Setor.class.php'; 
                      $setor = new Setor;
                      include '../modal/Cargo.class.php'; 
                      $cargo = new Cargo;
                    //. $contador++ .
                      foreach ($func as $valor) {
                        $arrayS = $setor->find($valor['id_setor']);
                        $arrayC = $cargo->find($valor['id_cargo']);
                        echo '<tr' ;
                        if ($valor['inativo'] == 1 ) echo ' class="danger"';
                        echo '>

                            
                        <td>
                            '. $valor['cad_prontuario'] . '
                        </td>
                       
                        <td>
                            '. $valor['nome_funcionario'] . ' ' .$valor['sobrenome_funcionario'] .  '
                        </td>
                        <td>
                            '. $arrayS['dsc_setor'] . '
                        </td>

                        <td>
                            '. $arrayC['dsc_cargo'] . '
                        </td> ';
                        if ($valor['inativo'] == 1 ) echo '<td> 
                          <a href="altFuncionarioView.php?op=ati&id='. $valor['id_funcionario'] . '" >Reativar</a>
                        </td>';
                        else echo '
                          <td >
                              <a href="altFuncionarioView.php?id='. $valor['id_funcionario'] . '" >Alterar</a> / <a href="altFuncionarioView.php?op=del&id='. $valor['id_funcionario'] . '">Desativar</a>
                          </td> 
                      
                        </tr>  ';
                      }
                      $setor = null;
                      $cargo = null;
                    ?>

                    
                </tbody>
             </table>

          </div>

        </div>
        <hr />
        <?php
          $total = $funcionario->BuscaTotal();
          echo "<p align='right'> Total de funcionarios: $total";
        ?>
   </div>
</div>

   <?php include_once('includes/footerNovo.php'); ?>