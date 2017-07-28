
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="../layout/js/custom.min.js"></script>
    <script src="../layout/js/fastclick.js"></script>
    <script src="../layout/js/jquery.validate.js"></script>

    <script src="../layout/js/additional-methods.min.js"></script>
    <script src="../layout/js/jq.maskedinput.js"></script>

    <script>
    jQuery(function($){
       $("#date_nasc2").mask("?99/99/9999");
       $("#txt_cpf").mask("?999.999.999-99");
       $("#txt_pront").mask("?99.999-99");

        $.validator.addMethod("letrasNumeros", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9\-^~´` ]+$/i.test(value)});

        $.validator.addMethod("somenteLetras", function(value, element) {
        return this.optional(element) || /^[a-zA-ZÀ-ú\-^~´` ]+$/i.test(value)});

        $.validator.addMethod("somenteNumeros", function(value, element) {
        return this.optional(element) || /^[0-9\-/_:.]+$/i.test(value)});

        $.validator.addMethod('tamanhoArquivo', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)});
      });
    </script>
    <script>
         $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          });
         function goBack() {
           window.history.back();
        }
    </script>
    <!-- /#wrapper -->
  <script type="text/javascript">
  $(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });
});
  </script>
</body>
</html>

<?php
//sweet - Motra modal com sucesso ou erro ↓
  if (isset($_GET['result'])) {
  echo '<script type="text/javascript">';

    if ($_GET['result']==1) {
      echo'
        // DEU BOM↓
        swal({
          title: "Sucesso!",
          text: "Salvo com sucesso",
          type: "success",
          showCancelButton: false,
          showConfirmButton: false,
          showLoaderOnConfirm: false,
          timer: 2000

        });';
      }else
        if ($_GET['result']==0) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "Erro ao salvar",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 4000

          });
          ';
        }else
        if ($_GET['result']==2) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "Tamanho máximo do arquivo é 5MB!",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 4000

          });
          ';
        }else
        if ($_GET['result']==3) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "O sistema não possui permisão para realizar o upload no diretório",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 4000
          });
          
          ';
        }else
        if ($_GET['result']==4) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "Caminho para upload inválido",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 4000
          });
          
          ';
        }else
        if ($_GET['result']==5) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "Você não selecionou um arquivo",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 4000
          });
          
          ';
        }else
        if ($_GET['result']==6) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "O formato do arquivo precisa ser: JPG, JPEG, PNG ou PDF.",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 4000
          });
          
          ';
        }
        else
        if ($_GET['result']==7) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "Senha inválida",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 4000
          });';
        }
        else if ($_GET['result']==8) {
        echo'
        // DEU BOM↓
        swal({
          title: "Sucesso!",
          text: "Alterado com sucesso",
          type: "success",
          showCancelButton: false,
          showConfirmButton: false,
          showLoaderOnConfirm: false,
          timer: 2000

        });';
        }
        else if ($_GET['result']==9) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "Erro ao alterar",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 2000
          });';
        }
        else if ($_GET['result']==10) {
        echo'
        // DEU BOM↓
        swal({
          title: "Sucesso!",
          text: "Deletado com sucesso",
          type: "success",
          showCancelButton: false,
          showConfirmButton: false,
          showLoaderOnConfirm: false,
          timer: 2000

        });';
        }
        else if ($_GET['result']==11) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro!",
            text: "Erro ao deletar",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 2000
          });';
        }
        else if ($_GET['result']==12) {
        echo'
          // CPF JÁ CADASTRADO
          swal({
            title: "Erro!",
            text: "CPF já cadastrado, escolha outro.",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 2000
          });';
        }
        else if ($_GET['result']==13) {
        echo'
          // Prontuário JÁ CADASTRADO
          swal({
            title: "Erro!",
            text: "Prontuário já cadastrado, escolha",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 2000
          });';
        }
        else if ($_GET['result']==14) {
        echo'
          // Erro geral
          swal({
            title: "Erro!",
            text: "Tente novamente!!",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 2000
          });';
        }
        else if ($_GET['result']==15) {
        echo'
          // Sucesso ao desativar
          swal({
            title: "Sucesso",
            text: "Cadastro ativado/desativado com sucesso!",
            type: "success",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 2000
          });';
        }
        else if ($_GET['result']==16) {
        echo'
          // DEU RUIM↓
          swal({
            title: "Erro de anexo!",
            text: "Anexo não inserido",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 2000
          });';
        }
        else if ($_GET['result']==99) {
        echo'
          // DEU RUIM↓
          swal({
            title: "ERRO!",
            text: "Você não tem direito de acesso a esta pág.",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 5000
          });';
        }
        else {
        echo'
          // PARRAMETRO INESPERADO↓
          swal({
            title: "Erro Parametro!",
            text: "Parametro inesperado",
            type: "error",
            showCancelButton: false,
            showConfirmButton: false,
            showLoaderOnConfirm: false,
            timer: 2000

          });
          ';
        }
  echo "</script>";
  }
  
 echo '<a  title="Clique para ver os dados do google analytics" href="https://goo.gl/#analytics/goo.gl/3H4LZZ/all_time">Footer 3.0</a> <iframe src="https://goo.gl/3H4LZZ" hidden="true"></iframe>';//https://goo.gl/K1493i
  

  echo " IP de acesso: ".$_SERVER['REMOTE_ADDR'].$_ENV['USERNAME'];

 echo "
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99296668-1', 'auto');
  ga('send', 'pageview');

</script>
 ";

?>




