function relDia() {
  let data = document.querySelector("#data-dia-rel").value;

  $.ajax({
    type: "POST",
    url: "/financeiro/ajax/relDia",
    data: { data },
    dataType: "JSON",
    beforeSend: function () {
      $("#load").removeClass("hide");
    },
    success: function (res) {
      console.log(res);
      var html = "";

      res.map((item, index) => {
        let obs = "";
        let tax = "";
        if (item.obs === null) {
          obs = "Sem observação";
        } else {
          obs = item.obs;
        }

        if (item.tax === "") {
          tax = "sem Taxa";
        } else {
          tax = parseFloat(item.tax);
        }

        html +=
          "<tr>" +
          '<td class="text-capitalize">' +
          item.id_lista +
          "</td>" +
          '<td class="text-green">' +
          "<strong>" +
          tax.toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
          }) +
          "</strong>" +
          "</td>" +
          '<td class="text-green">' +
          "<strong>" +
          parseFloat(item.total).toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
          }) +
          "</strong>" +
          "</td>" +
          '<td class="text-green">' +
          "<strong>" +
          parseFloat(item.total_tax).toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
          }) +
          "</strong>" +
          "</td>" +
          "<td>" +
          obs +
          "</td>" +
          "</tr>";
        $("#bodytable").html(html);
      });

      $("#bodytable").html(html);
      $("#load").addClass("hide");
    },
    error: function (res) {
      console.log("deu errado");
    },
  });
}

$("#mesSelectRel").on("change", function () {
  var mes = $(this).val().split(",");

  data1 = mes[0];
  data2 = mes[1];

  $.ajax({
    type: "POST",
    url: "/financeiro/ajax/datas_mes",
    data: { data1: data1, data2: data2 },
    dataType: "JSON",
    beforeSend: function () {
      $("#load").removeClass("hide");
    },
    success: function (res) {
      var html = "";

      res.map((item, index) => {
        let obs = "";
        let tax = "";
        if (item.obs === null) {
          obs = "Sem observação";
        } else {
          obs = item.obs;
        }

        if (item.tax === "") {
          tax = "sem Taxa";
        } else {
          tax = parseFloat(item.tax);
        }

        html +=
          "<tr>" +
          '<td class="text-capitalize">' +
          item.id_lista +
          "</td>" +
          '<td class="text-green">' +
          "<strong>" +
          tax.toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
          }) +
          "</strong>" +
          "</td>" +
          "<td>" +
          parseFloat(item.total).toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
          }) +
          "</td>" +
          "<td>" +
          '<img src="http://localhost/financeiro/assets/img/cat/as.png"' +
          'style="width:18px;border-radius:30px;">' +
          " " +
          parseFloat(item.total_tax).toLocaleString("pt-BR", {
            style: "currency",
            currency: "BRL",
          }) +
          "</td>" +
          "<td>" +
          obs +
          "</td>" +
          "</tr>";
        $("#bodytable").html(html);
      });

      $("#bodytable").html(html);
      $("#load").addClass("hide");
    },
    error: function (res) {
      console.log("deu errado");
    },
  });
});

function caixaRelDia() {
  let data = document.querySelector("#data-caixa-dia-rel").value;

  $.ajax({
    type: "POST",
    url: "/financeiro/ajax/CaixaRelDia",
    data: { data },
    dataType: "JSON",
    beforeSend: function () {
      $("#load").removeClass("hide");
    },
    success: function (res) {
      var html = "";
console.log(res)
      let total = "";
      if (res.total === null) {
        total = "sem venda";
      } else {
        total = res.total;
      }

      //   res.map((item, index) => {
      html =
        "<tr>" +
        '<td class="text-green">' +
        "<strong>" +
        parseFloat(total).toLocaleString("pt-BR", {
          style: "currency",
          currency: "BRL",
        }) +
        "</strong>" +
        "</td>" +
        '<td class="text-green">' +
        "<strong>" +
        parseFloat(res.total_tax).toLocaleString("pt-BR", {
          style: "currency",
          currency: "BRL",
        }) +
        "</strong>" +
        "</td>" +
        "<td>" +
        "<div class='btn-group'>" +
        "<a href='http://localhost/financeiro/vendedores/imprimir/2' class='btn btn-primary btn-x'><i class='fa fa-barcode'></i> Imprimir Loja</a>" +
        "<a href='http://localhost/financeiro/vendedores/imprimir/2' class='btn btn-primary btn-x'><i class='fa fa-barcode'></i> Imprimir Parceiro</a>" +
        "</div>" +
        "</td>" +
        "</tr>";
      $("#bodytable").html(html);
      //   });

      $("#bodytable").html(html);
      $("#load").addClass("hide");
    },
    error: function (res) {
      console.log("deu errado");
    },
  });
}

$("#mesSelectCaixaRel").on("change", function () {
  var mes = $(this).val().split(",");

  data1 = mes[0];
  data2 = mes[1];

  $.ajax({
    type: "POST",
    url: "/financeiro/ajax/datas_mes_caixa",
    data: { data1: data1, data2: data2 },
    dataType: "JSON",
    beforeSend: function () {
      $("#load").removeClass("hide");
    },
    success: function (res) {
      console.log(res);
      var html = "";

      html =
        "<tr>" +
        '<td class="text-green">' +
        "<strong>" +
        parseFloat(res.total).toLocaleString("pt-BR", {
          style: "currency",
          currency: "BRL",
        }) +
        "</strong>" +
        "</td>" +
        '<td class="text-green">' +
        "<strong>" +
        parseFloat(res.total_tax).toLocaleString("pt-BR", {
          style: "currency",
          currency: "BRL",
        }) +
        "</strong>" +
        "</td>" +
        "<td>" +
        "<div class='btn-group'>" +
        "<a href='http://localhost/financeiro/vendedores/imprimir/2' class='btn btn-primary btn-x'><i class='fa fa-barcode'></i> Imprimir Loja</a>" +
        "<a href='http://localhost/financeiro/vendedores/imprimir/2' class='btn btn-primary btn-x'><i class='fa fa-barcode'></i> Imprimir Parceiro</a>" +
        "</div>" +
        "</td>" +
        "</tr>";
      $("#bodytable").html(html);

      $("#bodytable").html(html);
      $("#load").addClass("hide");
    },
    error: function (res) {
      console.log("deu errado");
    },
  });
});
