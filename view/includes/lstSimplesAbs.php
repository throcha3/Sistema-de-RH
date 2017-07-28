<?php ?>

<h4 align="center">Últimos Absenteísmos</h4>
<div class="bs-example" data-example-id="contextual-table">

          <div class="bs-example" data-example-id="hoverable-table" style="border: 1px solid grey">
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
                            Médico
                        </th>
                        <th>
                            Data
                        </th>
                        <th>
                            Tipo
                        </th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $func = new FuncionarioCrud; 
                      $med = new Medico;
                      //$array = $func->find();
                    //. $contador++ .
                      foreach ($array_abs as $valor) {
                        $arrayF = $func->find($valor['id_funcionario']);
                        $arrayM = $med->find($valor['id_medico']);

                        echo '<tr>

                        <td>
                            '. $valor['id_absenteismo'] . '
                        </td>
                       
                        <td>
                            '. $arrayF['nome_funcionario'] . ' 
                        </td>
                        <td>
                            '.  $arrayM['nome_medico'] . '
                        </td>

                        
                            ';
                        if ($valor['tipo_doc'] === 'atestado') {
                            $dataFinal = reverteData($valor["data_inicio"]) .' - '. reverteData($valor["data_final"]);
                            echo "<td>$dataFinal</td>";
                        }else {
                          $dataFinal = reverteDataHora($valor["data_inicio"]) .' - '. substr($valor["data_final"], 10,6);

                        echo "<td>$dataFinal</td>";
                        };

                        echo '</td>

                        <td>
                            ';
                        if ($valor['tipo_doc']=='atestado') echo 'A';
                        else if ($valor['tipo_doc']=='declaracao') echo 'D'; //. $valor['tipo_doc'] . '
                        echo '</td>
                        
                      
                    </tr>  ';
                      }
                      $func = null;
                      $med = null;
                    ?>
                </tbody>
             </table>
          </div>
        </div>