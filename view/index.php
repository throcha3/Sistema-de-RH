<?php
include_once('includes/novoHeader.php');
include_once '../modal/Medico.class.php';
include_once '../modal/Enfermeiro.class.php';
include_once '../modal/Presenteismo.class.php';
include_once '../modal/Absenteismo.class.php';
include_once '../modal/FuncionarioCrud.php'; //Usado na dependencia

    $obj = null;
//Medico
    $obj = new Medico;
    $var = $obj->buscaTotal();
    $num_medicos = $var;
    $obj = null;
//Enfermeiro
    $obj = new Enfermeiro;
    $var = $obj->buscaTotal();
    $num_enfermeiros = $var;
    $obj = null;
//Presenteismo
    $obj = new Presenteismo;
    $var = $obj->buscaTotal();
    $num_pres = $var;

    $var = $obj->buscaUltimosDez();
    $array_pres = $var;
    $obj = null;
//Absenteismo
    $obj = new Absenteismo;
    $var = $obj->buscaTotal();
    $num_abs = $var;

    $var = $obj->buscaUltimosDez();
    $array_abs = $var;
    $obj = null;
?>

<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="jumbotron">
        <h1 class="display-4"><img src="includes/img/r_logo.png" width="80px"/>HSYS</h1><br>
        	<div class="row">
        		<div class="col-md-3 col-sm-12 col-12" style="border: 1px solid black">
        		  <div class="row">
        				<a href="lstMedico.php">
                    <div class="col-md-6 " style="text-align: center;">
                        <h3><strong>Médico</strong></h3>
                        <h3><strong><?php echo $num_medicos;?> </strong></h3>
                        <h4>Inseridos</h4>
                    </div>
                    <div class="col-md-6 " style="text-align: center;">
                            <i class="fa fa-user-md fa-5x" aria-hidden="true" style="padding-top: 40%;"></i>
                        </a>
        			</div>
        		  </div>
        		</div>
        		<div class="col-md-3 col-sm-12 col-12" style="border: 1px solid black">
        		  <div class="row">
                        <a href="lstEnfermeiro.php">
                    <div class="col-md-6 " style="text-align: center;">
                        <h3><strong>Enfermeiro</strong></h3>
                        <h3><strong><?php echo $num_enfermeiros;?></strong></h3>
                        <h4>Inseridos</h4>
                    </div>
                    <div class="col-md-6 " style="text-align: center;">
        				    <i class="fa fa-stethoscope fa-5x" aria-hidden="true" style="padding-top: 40%;"></i>
                        </a>
        			</div>
        		  </div>
        		</div>
                <div class="col-md-3 col-sm-12 col-12" style="border: 1px solid black">
                  <div class="row">
                        <a href="lstPresenteismo.php">
                    <div class="col-md-6 " style="text-align: center;">
                        <h3><strong>Presenteísmo</strong></h3>
                        <h3><strong><?php echo $num_pres;?></strong></h3>
                        <h4>Inseridos</h4>
                    </div>
                    <div class="col-md-6 " style="text-align: center;">
                            <i class="fa fa-medkit fa-5x" aria-hidden="true" style="padding-top: 40%;"></i>
                        </a>
                    </div>
                  </div>
                </div>
        		<div class="col-md-3 col-sm-12 col-12" style="border: 1px solid black">
                  <div class="row">
                        <a href="lstPresenteismo.php">
                    <div class="col-md-6 " style="text-align: center;">
                        <h3><strong>Absenteísmo</strong></h3>
                        <h3><strong><?php echo $num_abs;?></strong></h3>
                        <h4>Inseridos</h4>
                    </div>
                    <div class="col-md-6 " style="text-align: center;">
                            <i class="fa fa-plus-square fa-5x" aria-hidden="true" style="padding-top: 40%;"></i>
                        </a>
                    </div>
                  </div>
                </div>
        	</div>
            
            

            </div>
            <div class="jumbotron" style="padding: 10px">
                <div class="row">
                    <a href="lstPresenteismo.php" title="Ver lista de Presenteismo">
                    <div class="col-md-6 " >

                            <?php include_once('includes/lstSimplesPres.php'); ?> 

                    </div>
                    </a>
                    <a href="lstAbsenteismo.php" title="Ver lista de Absenteismo">
                    <div class="col-md-6  " >
                        
                        <?php include_once('includes/lstSimplesAbs.php'); ?>   
                        
                    </div>
                    </a>
                </div>
            </div>
           <br />
        </div>
        
        

    </div>


<?php include_once('includes/footerNovo.php'); ?>