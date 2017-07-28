


<?php 

include_once '../helpers.php';
include_once '../control/acessoControl.php';

$pagina = $_SERVER['PHP_SELF']; // "/view/loginView.php"

if (isset($_GET['result'])) {
echo '<meta http-equiv="refresh" content="1; url='.$pagina.'">';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>RHSys - Sist. de Gerenciamento</title>

<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', 'b361023b3419001e01c515f31466614589c63f89');
</script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../layout/css/bootstrap.css" id="bootstrap-css" />
    <link rel="stylesheet" href="../layout/css/sidebar-final.css" />
    <link rel="stylesheet" href="../layout/css/font-awesome.min.css"  />
    <link rel="stylesheet" href="../layout/css/sweetalert2.min.css" />
    <link rel="stylesheet" type="text/css" href="../layout/css/custom.min.css">
    <link rel="icon" href="../favicon-plus.ico">

    <link rel="stylesheet" type="text/css" href="../layout/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../layout/css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="../layout/css/jquery-ui.theme.min.css" />
    <link rel="stylesheet" type="text/css" href="../layout/css/jquery-ui.structure.css" />

    <script type="text/javascript" src="../layout/js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="../layout/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap-filestyle.min.js"></script>
    <script type="text/javascript" src="../layout/js/bootstrap-3.3.7.min.js"></script>

    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }

    </script>
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><span><img src="includes/img/r_logo.png" width="35px" class="img-thumbnail"/> HSYS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Bem vindo,</span>
                <h2 style="font-size: 22px;"><?=$_SESSION['nome']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">

                <ul class="nav side-menu">

                <?php if($_SESSION['absenteismo']=='1') echo '<li><a href="../view/lstAbsenteismo.php"><i class="fa fa-ambulance"></i>Absenteísmo<span class="fa fa"></span></a>' ?>
                <?php if($_SESSION['presenteismo']=='1') echo '<li><a href="../view/lstPresenteismo.php"><i class="fa fa-plus"></i>Presenteísmo<span class="fa fa"></span></a> '?>
                 <?php if($_SESSION['questionario']=='1') echo '<li><a href="../view/cadQuestionarioView.php"><i class="fa fa-question"></i>Questionário<span class="fa fa"></span></a> '?>
                  <li><a><i class="fa fa-user"></i>Cadastro de Pessoas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($_SESSION['funcionario']=='1') echo '<li><a href="../view/lstFuncionario.php">Funcionários</a></li>'?>
                      <?php if($_SESSION['medico']=='1') echo '<li><a href="../view/lstMedico.php">Médicos</a></li>'?>
                      <?php if($_SESSION['enfermeiro']=='1') echo '<li><a href="../view/lstEnfermeiro.php">Enfermeiros</a></li>'?>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i>Cadastros Adicionais<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($_SESSION['cargo']=='1') echo '<li><a href="../view/lstCargo.php">Cargo</a></li>'?>
                      <?php if($_SESSION['setor']=='1') echo '<li><a href="../view/lstSetor.php">Setor</a></li>'?>
                      <?php if($_SESSION['especialidade']=='1') echo '<li><a href="../view/lstEspecialidade.php">Especialidade</a></li>'?>
                      
                      <?php if($_SESSION['cid']=='1') echo '<li><a href="../view/lstCid.php">CID</a></li>'?>
                      <?php if($_SESSION['campus']=='1') echo '<li><a href="../view/lstCampus.php">Campus</a></li>'?>
                      <?php if($_SESSION['cidade']=='1') echo '<li><a href="../view/lstCidade.php">Cidade</a></li>'?>
                      <?php if($_SESSION['estado']=='1') echo '<li><a href="../view/lstEstado.php">Estado</a></li>'?>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-key"></i>Acesso Administrativo<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($_SESSION['usuario']=='1') echo '<li><a href="../view/lstLogin.php">Usuário</a></li> '?>
                    </ul>
                  </li>



                </ul>

              </div>
            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?=$_SESSION['nome']?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">Ajuda</a></li>
                    <li><a href="../control/logoutControl.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                  </ul>
                </li>
                </ul>
            </nav>
          </div>
        </div>