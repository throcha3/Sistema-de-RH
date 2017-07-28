<?php
// include_once('../helpers.php');
include_once('includes/novoHeader.php');

?>

        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <!-- <h3>Index <small>Navegue utilizando o menu lateral</small></h3> -->
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Relatório quinzenal de atividades</h2> -->

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="grafico"></div>
                  <script src="https://code.highcharts.com/highcharts.js"></script>
                  <script type="text/javascript">
                        Highcharts.setOptions({
                            global: {
                                timezoneOffset: (-3) * 60
                            },
                            lang: {
                                loading: 'Aguarde...',
                                months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                                weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                                shortMonths: ['Jan', 'Feb', 'Mar', 'Abr', 'Maio', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                                exportButtonTitle: "Exportar",
                                printButtonTitle: "Imprimir",
                                rangeSelectorFrom: "De",
                                rangeSelectorTo: "Até",
                                rangeSelectorZoom: "Periodo",
                                downloadPNG: 'Download imagem PNG',
                                downloadJPEG: 'Download imagem JPEG',
                                downloadPDF: 'Download documento PDF',
                                downloadSVG: 'Download imagem SVG',
                                resetZoom: "Tirar zoom",
                                resetZoomTitle: "Tirar zoom",
                            },
                        });

                    $('#grafico').highcharts({
                        chart: {
                            zoomType: 'x'
                        },
                        title: {
                            text: 'Título'
                        },
                        xAxis: {
                            type: 'datetime',
                            maxZoom: 48 * 3600 * 1000,
                        },
                        subtitle: {
                            text: 'Subtítulo'
                        },
                         yAxis: {
                            title: {
                                text: 'Relações'
                            }
                        },
                        plotOptions: {
                            series: {
                                pointStart: Date.UTC(2017, 4, 24),
                                pointInterval:24 * 3600 * 1000
                            }
                        },

                        series: [{
                            name: 'teste1',
                            data: [71.5, 106.4, 129.2, 144.0, 176.0],
                        },{
                            name: 'teste2',
                            data: [10.5, 10.5, 10.5, 10.5, 10.5],
                        }]
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
 <?php include_once('includes/footerNovo.php');