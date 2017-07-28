altCargoView arrumar NovoHeader! *done
lstCampus arrumar o link de delete *done
altCidade ta quebrando *DONE
orrigir altCampus *done

PRESENTEISMO - 
      Permissão de data estranha!!!!!!!!!!!!!!!!!!!!!!!!!!!!! ?? Verificar como validar isso

ValidaFuncionario e Presenteismo alterados. *DONE

cad e alt cidade e index HEADER *DONE

verificar cadastro de medico que não altera( ou aparece mensagem errado n sei);

Log de alterações 17/05 - 16:42
Banco de dados
  -cad_usuario
    *adicionado 'email' varchar(100)
    *login alterado para varchar(20)
    *adicionado nivel int (questao de compatibilidade das classes)
Absenteismo.class.php
  *adicionado 4 novas funções de pesquisa
lstAbsenteismo.php
  *adicionado função de pesquisa por func. e médico (não testei pq não tem cadastro pra isso)
loginControl.php
  *adicionado parametros pro campo de email.
  *retirado parametro 'id'
Usuario.class.php
  *adicionado campo email
Adicionado formulario cadLoginView.php (precisa verificar questão do autocomplete)
Adicionado lstLogins.php *testar

TODO Hoje
  * alguém precisa revisar as rotas. Princialmente LoginControl e cadCidControl
  * Alteração de usuarios (altLoginView) * DONE TESTAR!!!
  * CRUD para cid

Desativação de cadastro de funcionario *DONE
Fazer ativação agora :) *DONE

Filtro ajax em funcionário - setor cargo
Index com dados reais *DONE
exclusao do campo 'cad_ativo' de enferm/medico/funcionario *DONE

------------------------------------
nivel de acesso por tela *
log de nome e data de cadastro e alteração
funcao de esquecer a senha

trocar id de CID no abs. para CODIGO e dar order by *DONE

select order by e não aparecer inativos *DONE alt/cad abs e pres  e questionario 
---------------
Alteração de usuario ta funcionando aparentemente...
  Falta tratar a senha/confirmação de senha!
  Bloquear campos que não podem ser alterados
LOG DE CAD ALT
Funçao de esquecer a senha!!!

Depois de expirar a sessão ele não volta pra tela de login aparentemente




  <?php

  else if ($op == 'ati') echo '<h3 class="page-header display-4">Reativação de Funcionário</h3>';

  else if ($op == 'ati') echo '<button type="submit" class="btn btn-success" id="op" name="op" value="ATI">Reativar</button>';


--------------------------------------------------------------------------------------------------------------
	  $order      = (isset($_REQUEST['order']))             ? $_REQUEST['order']        : '';
	  $y = (isset($_REQUEST['ord']))             ? $_REQUEST['ord']        : 'asc';
	  $pesq      = (isset($_POST['txt_pesq']))             ? $_POST['txt_pesq']        : '';
	  $campo      = (isset($_POST['slc_campo']))             ? $_POST['slc_campo']        : '';


	  case 'pesq':
	      if ($campo == 'coren') $enf = $enfermeiro->findAllPesq('coren_enferm' ,$pesq);
	      else if ($campo == 'nome') $enf = $enfermeiro->findAllPesqDoisCampos('nome_enferm','sobrenome_enferm' ,$pesq);
      break;

      header('lstCampus.php?result=0');

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

  ?>