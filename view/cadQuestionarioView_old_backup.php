<?php
include_once('includes/header.php');
?>
<div class="container">
<div class="jumbotron">
    <form method="POST" action="../control/cadQuestionarioControl.php">
  <div class="container">


  <h1 class="display-4">Questionário!</h1>
    <p>Por favor, descreva suas experiências no trabalho nos últimos 30 dias.<br> Essas experiências podem ter sido influenciadas por diversos fatores pessoais e do ambiente e alteradas ao longo do tempo. Para cada afirmativa abaixo, escolha uma única resposta que melhor retrata seu grau de concordância ou discordância, considerando suas experiências de trabalho nos últimos 30 dias.
    </p>

    <p>As expressões “dor nas costas”, “problema cardiovascular”, “doença”, “problema de estômago” e outros termos semelhantes podem ser substituídos pela palavra “problema de saúde” em qualquer um desses itens.
    </p>
    
    <p>Por favor, utilize a seguinte escala:</p>
    
    <p>
      <ol>
      <li>Eu discordo totalmente</li>
      <li>Eu discordo parcialmente</li>
      <li>Não concordo nem discordo</li>
      <li>Eu concordo parcialmente</li>
      <li>Eu concordo totalmente</li>
      </ol>
    </p>

    <div class="form-group col-sm-6">
      <label class="" for="problema"><b>Problema de saúde</b></label>
      <input type="text" class="form-control" name="problema" placeholder="Descreva o problema de saúde" id="problema" required="true">
    </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
        <div class="form-group col-sm-6">
        <!-- <label class="" for="funcionario">Funcionário
        <input type="text" class="form-control" name="funcionario" placeholder="Nome completo do funcionario" id="funcionario" required="true"> -->
          <label for="funcionario">Funcionário
            <a href="cadFuncionarioView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
          </label>
          <select class="form-control selectpicker" id="funcionario" name="funcionario" required="true">

            <?php
              include '../modal/FuncionarioCrud.php';
              $array = array();
              $func = new FuncionarioCrud;
              $array = $func->findAllOrder('cad_prontuario');

              foreach ($array as $valor) {
                  echo '<option value="'.$valor['cad_prontuario']. ' - '.$valor['nome_funcionario'].' '.$valor['sobrenome_funcionario'].'">
                  '.$valor['cad_prontuario']. ' - '.$valor['nome_funcionario'].' '.$valor['sobrenome_funcionario'].'
                  </option>';
              }
            ?>
            </select>
        </div>

        <div class="form-group col-sm-6">
        <!-- <label class="" for="enfermeiro">Enfermeiro</label>
        <input type="text" class="form-control" name="enfermeiro" placeholder="Nome completo do enfermeiro" id="enfermeiro" required="true"> -->
        <label for="enfermeiro">
          Enfermeiro <a href="cadEnfermeiroView.php" data-toggle="tooltip" title="Novo Cadastro!"><span class="glyphicon glyphicon-plus"></span></a>
        </label>
          <select class="form-control selectpicker" id="enfermeiro" name="enfermeiro" required="true">

            <?php
              include '../modal/Enfermeiro.class.php';
              $array = array();
              $enf = new Enfermeiro;
              $array = $enf->findAllOrder('coren_enferm');

              foreach ($array as $valor) {
                  echo '<option value="'.$valor['coren_enferm']. ' - '.$valor['nome_enferm'].' '.$valor['sobrenome_enferm'].'">'.$valor['coren_enferm']. ' - '.$valor['nome_enferm'].' '.$valor['sobrenome_enferm'].'</option>';
              }
            ?>
          </select>
        </div>
     </div>     
      <!-- Example row of columns -->

    <div class="row">
    <div class="col-md-4"><br>

      <h4>Questão 1</h4>
      <p>Devido ao meu (Problema de saúde)* foi difícil lidar com o estresse no meu trabalho?</p>
      <input type="radio" id="questao1" name="questao1" value="1" required="true">Eu discordo totalmente<br>
      <input type="radio" id="questao1" name="questao1" value="2" required="true">Eu discordo parcialmente<br>
      <input type="radio" id="questao1" name="questao1" value="3" required="true">Não concordo nem discordo<br>
      <input type="radio" id="questao1" name="questao1" value="4" required="true">Eu concordo parcialmente<br>
      <input type="radio" id="questao1" name="questao1" value="5" required="true">Eu concordo totalmente<br>
    </div>

    <div class="col-md-4">
      <br>
      <h4>Questão 2</h4>
      <p> Apesar do meu (problema de saúde)*, consegui terminar tarefas difíceis no meu trabalho?</p>
      <input type="radio" id="questao2" name="questao2" value="1" required="true">Eu discordo totalmente<br>
      <input type="radio" id="questao2" name="questao2" value="2" required="true">Eu discordo parcialmente<br>
      <input type="radio" id="questao2" name="questao2" value="3" required="true">Não concordo nem discordo<br>
      <input type="radio" id="questao2" name="questao2" value="4" required="true">Eu concordo parcialmente<br>
      <input type="radio" id="questao2" name="questao2" value="5" required="true">Eu concordo totalmente<br>
     </div>
     

    <div class="col-md-4">
      <br>
      <h4>Questão 3</h4>
      <p>Devido ao meu (problema de saúde)*, não pude ter prazer no trabalho? </p>
      <input type="radio" id="questao3" name="questao3" value="1" required="true">Eu discordo totalmente<br>
      <input type="radio" id="questao3" name="questao3" value="2" required="true">Eu discordo parcialmente<br>
      <input type="radio" id="questao3" name="questao3" value="3" required="true">Não concordo nem discordo<br>
      <input type="radio" id="questao3" name="questao3" value="4" required="true">Eu concordo parcialmente<br>
      <input type="radio" id="questao3" name="questao3" value="5" required="true">Eu concordo totalmente<br>
    </div>
    </div>


    <div class="row">
    <div class="col-md-4">
      <br>
      <h4>Questão 4</h4>
      <p>Eu me senti sem ânimo para terminar algumas tarefas no trabalho, devido ao meu (problema de saúde)?</p>
      <input type="radio" id="questao4" name="questao4" value="1" required="true">Eu discordo totalmente<br>
      <input type="radio" id="questao4" name="questao4" value="2" required="true">Eu discordo parcialmente<br>
      <input type="radio" id="questao4" name="questao4" value="3" required="true">Não concordo nem discordo<br>
      <input type="radio" id="questao4" name="questao4" value="4" required="true">Eu concordo parcialmente<br>
      <input type="radio" id="questao4" name="questao4" value="5" required="true">Eu concordo totalmente<br>
    </div>

    <div class="col-md-4">
      <br>
      <h4>Questão 5</h4>
      <p> No trabalho consegui me concentrar nas minhas metas apesar do meu (problema de saúde)*? </p>
      <input type="radio" id="questao5" name="questao5" value="1" required="true">Eu discordo totalmente<br>
      <input type="radio" id="questao5" name="questao5" value="2" required="true">Eu discordo parcialmente<br>
      <input type="radio" id="questao5" name="questao5" value="3" required="true">Não concordo nem discordo<br>
      <input type="radio" id="questao5" name="questao5" value="4" required="true">Eu concordo parcialmente<br>
      <input type="radio" id="questao5" name="questao5" value="5" required="true">Eu concordo totalmente<br>
     </div>
     

    <div class="col-md-4">
      <br>
      <h4>Questão 6</h4>
      <p> Apesar do meu (problema de saúde)*, tive energia para terminar todo o meu trabalho?</p>
      <input type="radio" id="questao6" name="questao6" value="1" required="true">Eu discordo totalmente<br>
      <input type="radio" id="questao6" name="questao6" value="2" required="true">Eu discordo parcialmente<br>
      <input type="radio" id="questao6" name="questao6" value="3" required="true">Não concordo nem discordo<br>
      <input type="radio" id="questao6" name="questao6" value="4" required="true">Eu concordo parcialmente<br>
      <input type="radio" id="questao6" name="questao6" value="5" required="true">Eu concordo totalmente<br>
    </div>
    </div>
  
    <hr>
      <p><input type="submit" name="save" data-target="#myModal" class="btn btn-primary btn-lg right" value="Enviar questionário">
      <!-- <div class="navbar-text navbar-right" style="padding-right: 5px;"> -->
          <button type="button" class="btn btn-success btn-lg pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-download" aria-hidden="true" style="padding-right: 5px;"></i>Gerar relatório</button>
        <!-- </div> --></p>
</div>
</form>

<!-- INICIO DO MODAL -->
  
<!-- Trigger the modal with a button -->

<script>
  function clearThis(target){
    if (target.value != ""){
      target.value = ""
    }
  }
</script>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Baixar relatório</h4>
    </div>
    <div class="modal-body">
    <form method="GET" action="../view/lstQuestionarioExcel.php">
      <p>Digite a senha:</p>
        <input type="password" class="form-control" name="password" required="" onfocus="clearThis(this)" />
      </div>
      <div class="modal-footer">
        <button  class="btn btn-danger" data-dismiss="modal" >Fechar</button>
        <input type="submit" name="autenticar" class="btn btn-success" value="Download">
    </form>
    </div>
    </div>
  </div>
  </div>
</div> 
<!-- final div wrapper -->


<!-- <script type="text/javascript">
  $("#autenticar").click(function()){
    document.getElementById('password').value='';
  }


</script> -->
<!-- FIM DO MODAL  -->

    <?php include_once('includes/footer.php'); ?>