<!-- jQuery 3 -->
<script src="<?php echo BASE_URL ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo BASE_URL ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo BASE_URL ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo BASE_URL ?>assets/js/jquery.mask.min.js"></script>
<!-- ChartJS -->
<!-- <script src="<?php echo BASE_URL ?>assets/bower_components/chart.js/Chart.js"></script> -->
<script src="<?php echo BASE_URL ?>assets/js/Chart.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo BASE_URL ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- juery Form -->
<script src="<?php echo BASE_URL ?>assets/js/graficos.js"></script>
<!-- DataTables -->
<script src="<?php echo BASE_URL ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
</script>
<script src="<?php echo BASE_URL ?>assets/bower_components/datatables.net-bs/js/dataTables.responsive.min.js">
</script>
<script src="<?php echo BASE_URL ?>assets/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js">
</script>
<!-- Sparkline -->
<script src="<?php echo BASE_URL ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo BASE_URL ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo BASE_URL ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo BASE_URL ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo BASE_URL ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo BASE_URL ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE_URL ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo BASE_URL ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo BASE_URL ?>assets/dist/js/demo.js"></script>
<!-- Sweet Alert -->
<script src="<?php echo BASE_URL ?>assets/js/sweetalert2.all.js"></script>
<!-- dataTables -->
<script src="<?php echo BASE_URL ?>assets/js/data.js"></script>
<!-- main js -->
<script src="<?php echo BASE_URL ?>assets/js/script.js"></script>
<!-- juery Form -->
<script src="<?php echo BASE_URL ?>assets/js/calculadora.js"></script>
<!-- juery Form -->
<script src="<?php echo BASE_URL ?>assets/js/receitas.js"></script>
<script src="<?php echo BASE_URL ?>assets/js/despesas.js"></script>
<script src="<?php echo BASE_URL ?>assets/js/lista.js"></script>
<script src="<?php echo BASE_URL ?>assets/js/venda.js"></script>
<script src="<?php echo BASE_URL ?>assets/js/relatorios.js"></script>
<script src="<?php echo BASE_URL ?>assets/js/comissao.js"></script>
<script>
window.onload = dadosIniciaisDespesas();
window.onload = dadosIniciaisReceitas();
</script>

<script type="text/javascript">
$(document).ready(function() {

    //Initialize Select2 Elements
    $('.select2').select2()

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("Carregando...");
                $("#bairro").val("Carregando...");
                $("#cidade").val("Carregando...");
                $("#uf").val("Carregando...");
                $("#ibge").val("Carregando...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});
</script>
<script>
<?php
        if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
            echo "swal(".$_SESSION['msg'].");";
            $_SESSION['msg'] = '';
        } 
    ?>
</script>
<!-- <script>
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Download Sales", value: 12},
        {label: "In-Store Sales", value: 30},
        {label: "Mail-Order Sales", value: 20}
      ],
      hideHover: 'auto'
    });
</script> -->
<style>
.btn-touch {
    /* box-shadow: 1px 1px 2px 1px #999999a3; */
}
</style>
</body>

</html>