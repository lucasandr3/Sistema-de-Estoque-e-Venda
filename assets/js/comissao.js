function saidaDetails(id, name, taxa) {
  $.ajax({
    type: "GET",
    url: "http://localhost/financeiro/ajax/parc_com/" + id,
    dataType: "Json",
    beforeSend: function () {
      $(".modal-loading-c").show();
    },
    success: function (res) {
      if (res.code == 0) {
        console.log(res);
        $(".modal-loading-c").hide();

        $("#modal-pedido-impressao-c")
          .append(`<div class="modal fade" id="exampleModalCenterImprimir-c">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header" style="background-color:#2e4158;">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true" style="color:white">x</span></button>
                              <h4 class="modal-title text-center" style="color:white">Produtos da Saida
                              </h4>
                          </div>
                          <div class="modal-body" id="saida-modal-saidas">
                      
                              <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge bg-green">${parseFloat(
                                          taxa
                                        ).toLocaleString("pt-BR", {
                                          style: "currency",
                                          currency: "BRL",
                                        })}</span>
                                        <span style="font-size: 17px;"><b>${name}</b></span>
                                    </li>
                              </ul>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn bg-purple pull-left" data-dismiss="modal">Fechar</button>
                          </div>
                      </div>
                  </div>
              </div>`);

        $("#exampleModalCenterImprimir-c").modal("show");

        $("#exampleModalCenterImprimir-c").on("hidden.bs.modal", function (e) {
          $(this).remove();
        });
      } else {
        alert(res.msg);
      }
    },
  });
}

$("#selectCom").on("change", function () {
  var obj = $(this).val().split(";");

  id = obj[0];
  nome = obj[1];
  taxa = parseFloat(obj[2]);

  $.ajax({
    type: "POST",
    url: "http://localhost/financeiro/ajax/parc_com/",
    data: { id: id, taxa: taxa },
    dataType: "Json",
    beforeSend: function () {
      $("#loadd").removeClass("hide");
    },
    success: function (res) {
      var html = "";
      var msg = '';

      msg += `Olá, ${res.list.nome_parc} \n\n`;
      msg += `Aqui está sua comissão do mês \n`;
      msg += `Total de vendas por indicação: ${res.list.total_venda} \n`;
      msg += `Sua taxa de comissão: ${res.list.comissao} \n`;
      msg += `Total de comissão: ${res.list.total_comissao} \n\n`;
      msg += `SLD Nutrição Esportiva`;

      html =
        "<tr>" +
        '<td class="text-capitalize" style="background-color: #CCC;font-size: 15px;">' +
        "<b>" +
        res.list.total_venda +
        "</b>" +
        "</td>" +
        "<td style='background-color: #CCC;font-size: 15px;'>" +
        "<strong>" +
        res.list.comissao +
        "</strong>" +
        "</td>" +
        '<td class="text-green" style="background: #00800033;font-size: 20px;">' +
        "<strong>" +
        res.list.total_comissao +
        "</strong>" +
        "</td>" +
        '<td style="padding:0px;">' +
          '<a class="btn btn-success btn-flat" style="padding: 11px 19px;width: 100%;" href="https://api.whatsapp.com/send?phone=55'+res.list.telefone+'&text='+encodeURIComponent(msg)+'" target="_blank"><i class="fa fa-whatsapp"></i> Enviar Comissão</a>'+
        "</td>" +
        "</tr>";
      $("#table-com").html(html);

      $("#table-com").html(html);
      $("#loadd").addClass("hide");
    },
    error: function (res) {
      console.log("deu errado");
    },
  });
});
