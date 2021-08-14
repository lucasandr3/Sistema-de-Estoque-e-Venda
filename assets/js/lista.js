function updateSubtotal(obj) {
  var quant = $(obj).val();
  var subtotal = 0;
  if (quant <= 0) {
    $(obj).val(1);
    quant = 1;
  }

  var preco = $(obj).attr("data-price");
  var subtotal = preco * quant;

  $(obj)
    .closest("tr")
    .find(".subtotal")
    .val(
      subtotal.toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
    );

  updateTotal();
}
function updateTotal() {
  var total = 0;

  for (var q = 0; q < $(".p_quant").length; q++) {
    var quant = $(".p_quant").eq(q);

    var preco = quant.attr("data-price");
    var subtotal = preco * parseInt(quant.val());

    total += subtotal;
    $(".total").html(
      total.toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
    );
    $(".tnf").val(total);
  }

  $(".venda-val").val(total);
  $("input[name=total_price]").val(total);
}
function excluirProd(obj) {
  $(obj).closest("tr").remove();
  updateSubtotal();
  updateTotal();
}
function addProd(obj) {
  $("#add_prod").val("");
  var id_prod = $(obj).attr("data-id");
  var nome_prod = $(obj).attr("data-name");
  var preco = $(obj).attr("data-price");
  var cost = $(obj).attr("data-cost");
  var qtm = $(obj).attr("data-qtm");

  $(".searchresults").hide();

  if ($('input[name="produtos[' + id_prod + ']"]').length == 0) {
    var tr =
      '<tr class="active">' +
      "<td>" +
      '<div class="form-group">' +
      '<button class="btn btn bg-purple btn-flat" onclick="excluirProd(this)"><i class="fa fa-times"></i></button>' +
      "</div>" +
      "</td>" +
      "<td>" +
      '<div class="form-group">' +
      '<input type="text" class="form-control text-capitalize" value="' +
      id_prod +
      '" readonly/>' +
      "</div>" +
      "</td>" +
      "<td>" +
      '<div class="form-group">' +
      '<input type="text" class="form-control text-capitalize" value="' +
      nome_prod +
      '" readonly/>' +
      "</div>" +
      "</td>" +
      "<td>" +
      '<div class="form-group">' +
      '<input type="text" class="form-control" value="' +
      cost +
      '" name="produtos[' +
      id_prod +
      "][" +
      "custo" +
      ']" value="' +
      '" id="preco"/>' +
      "</div>" +
      "</td>" +
      "<td>" +
      '<div class="form-group">' +
      '<input type="text" class="form-control" value="' +
      preco +
      '" name="produtos[' +
      id_prod +
      "][" +
      "preco_venda" +
      ']" value="' +
      '" id="preco"/>' +
      "</div>" +
      "</td>" +
      "<td>" +
      '<div class="form-group">' +
      '<input type="number" name="produtos[' +
      id_prod +
      "][" +
      "qtd" +
      ']" class="p_quant form-control" value="1" onchange="updateSubtotal(this)" data-price="' +
      preco +
      '" />' +
      "</div>" +
      "</td>" +
      "<td>" +
      '<div class="form-group">' +
      '<input type="number" value="' +
      qtm +
      '" name="produtos[' +
      id_prod +
      "][" +
      "alert_qt" +
      ']" class="p_quant form-control" value="1" onchange="updateSubtotal(this)" data-price="' +
      preco +
      '" />' +
      "</div>" +
      "</td>" +
      "<td  style='display:none;'>" +
      '<div class="form-group">' +
      '<input type="number" value="' +
      id_prod +
      '" name="produtos[' +
      id_prod +
      "][" +
      "id_produto" +
      ']" class="p_quant form-control" value="1" onchange="updateSubtotal(this)" data-price="' +
      preco +
      '" />' +
      "</div>" +
      "</td>" +
      "</tr>";

    $("#products_table").append(tr);
  }

  var nft =
    '<tr class="active">' +
    '<td colspan="2" class="tft" style="font-weight:bold;">Total em produtos</td>' +
    '<td class="total tft" style="font-weight:bold;"><strong></strong></td>' +
    '<td><input type="text" name="totalnf" class="tnf sr-only" value=""></td>' +
    "</tr>";

  $("#totalNF").html(nft);

  updateTotal();
}

$(function () {
  $("input[name=total_price]");

  $("#add_prod").on("keyup", function () {
    var datatype = $(this).attr("data-type");
    var q = $(this).val();

    if (datatype != "") {
      $.ajax({
        url: "/financeiro/ajax/" + datatype,
        type: "POST",
        data: { q: q },
        dataType: "json",
        success: function (json) {
          if ($(".searchresults").length == 0) {
            $("#add_prod").after('<div class="searchresults"></div>');
          }
          $(".searchresults").css("left", $("#add_prod").offset().left + "px");
          $(".searchresults").css(
            "top",
            $("#add_prod").offset().top + $("#add_prod").height() + 3 + "px"
          );

          var html = "";

          for (var i in json) {
            console.log(json);
            html +=
              '<div class="si" onclick="addProd(this)" data-qtm="' +
              json[i].alert +
              '" data-cost="' +
              json[i].cost +
              '" data-id="' +
              json[i].id_prod +
              '" data-price="' +
              json[i].preco +
              '" data-name="' +
              json[i].nome_prod +
              '">' +
              '<a class="linkprod" href="javascript:;" style="font-size: 15px;color: #333;font-weight:bold;">' +
              json[i].nome_prod +
              "</a>" +
              "</div>";
          }

          $(".searchresults").html(html);
          $(".searchresults").show();
        },
      });
    }
  });
});

function pdf() {
  var id = $(".pdfi").attr("data-id").val();
  alert(id);
}
