<?php ?>

<h4 align="center">Últimos Presenteísmos</h4>
<div class="bs-example" data-example-id="contextual-table">

          <div class="bs-example" style="border: 1px solid grey">
            <table class="table table-hover" >
                <thead>
                    <tr style="border-bottom-style: solid;">
                        <th>
                          ID
                        </th>
                        <th>
                            Funcionário
                          </a>
                        </th>
                        <th>
                            Enfermeiro
                        </th>
                        <th>
                          Data
                        </th>
                        <th>
                            Problema
                        </th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php  
                      $func = new FuncionarioCrud; 
                      $enf = new Enfermeiro;
                      //$array = $func->find();
                    //. $contador++ .
                      foreach ($array_pres as $valor) {
                        $arrayF = $func->find($valor['id_funcionario']);
                        $arrayE = $enf->find($valor['id_enfermeiro']);

                        echo '<tr>

                        <td>
                            '. $valor['id_presenteismo'] . '
                        </td>
                       
                        <td>
                            '. $arrayF['nome_funcionario'] . ' 
                        </td>
                        <td>
                            '. $arrayE['nome_enferm'] . '
                        </td>

                        <td>
                            '. reverteData($valor['data_presenteismo'])  . ' 
                        </td>

                        <td>
                            '. $valor['cad_problema'] . '
                        </td>
                        
                      
                    </tr>  ';
                      }
                      $func = null;
                      $enf = null;
                    ?>
                </tbody>
             </table>
          </div>
        </div>