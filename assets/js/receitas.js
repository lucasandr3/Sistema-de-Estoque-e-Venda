$("#mesSelect").on("change", function(){
    var mes = $(this).val().split(",");

    data1 = mes[0];
    data2 = mes[1];

    $.ajax({
        type: "POST",
        url: "/financeiro/receitas/datas",
        data: {data1:data1,data2:data2},
        dataType: "JSON",
        beforeSend: function() {
            $("#load").removeClass("hide");
        },
        success: function(res) {

            var html = '';

            res.map((item, index) => {

                var moeda = parseInt(item.valor);

                html += '<tr>'+
                '<td class="text-capitalize">'+item.descricao+'</td>'+
                '<td class="text-green">'+
                '<strong>'+(moeda).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })+'</strong>'+
                '</td>'+
                '<td>'+moment(item.data_d).format("DD/MM/YYYY")+'</td>'+
                '<td>'+
                '<img src="http://localhost/financeiro/assets/img/cat/as.png"'+ 
                'style="width:18px;border-radius:30px;">'+' '+item.nome+'</td>'+
                '<td>'+item.conta+'</td>'+
            '</tr>';
            $('#bodytable').html(html);
            });

            $('#bodytable').html(html);
            $("#load").addClass("hide");
        },
        error: function(res) {
            console.log('deu errado');
        }
    });
});

function dadosIniciaisReceitas() {

    var d_ini = dt_inicial;
    var d_fin = dt_final;
    
    $.ajax({
        type: "POST",
        url: "/financeiro/receitas/datas",
        data: {d_ini:d_ini,d_fin:d_fin},
        dataType: "JSON",
        beforeSend: function() {
            $("#load").removeClass("hide");
        },
        success: function(res) {

            var html = '';

            res.map((item, index) => {

                var moeda = parseInt(item.valor);

                html += '<tr>'+
                '<td class="text-capitalize">'+item.descricao+'</td>'+
                '<td class="text-green">'+
                '<strong>'+(moeda).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })+'</strong>'+
                '</td>'+
                '<td>'+moment(item.data_d).format("DD/MM/YYYY")+'</td>'+
                '<td>'+
                '<img src="http://localhost/financeiro/assets/img/cat/as.png"'+ 
                'style="width:18px;border-radius:30px;">'+' '+item.nome+'</td>'+
                '<td>'+item.conta+'</td>'+
            '</tr>';
            $('#bodytable').html(html);
            });

            $('#bodytable').html(html);
            $("#load").addClass("hide");
        },
        error: function(res) {
            console.log('deu errado');
        }
    });
}