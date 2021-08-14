function pgtVenda(value) {
  switch (value) {
    case "Cartão de Débito (Loja - Mastercard)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "debito");
          taxas = taxas.filter((t) => t.type == "Loja (mastercard)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
               
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Débito (Parceiro)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "debito");
          taxas = taxas.filter((t) => t.type == "Parceiro");
          document.querySelector("#sel-parc").style.display = "none";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
               
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Crédito (Loja - Mastercard)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "credito");
          taxas = taxas.filter((t) => t.type == "Loja (mastercard)");
          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
               
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Crédito (Parceiro)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "credito");
          taxas = taxas.filter((t) => t.type == "Parceiro");
          document.querySelector("#sel-parc").style.display = "none";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
                
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Débito (Loja - Visa)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "debito");
          taxas = taxas.filter((t) => t.type == "Loja (visa)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
         
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Crédito (Loja - Visa)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "credito");
          taxas = taxas.filter((t) => t.type == "Loja (visa)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
               
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Débito (Loja - Hipercard)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "debito");
          taxas = taxas.filter((t) => t.type == "Loja (hipercard)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
               
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Crédito (Loja - Hipercard)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "credito");
          taxas = taxas.filter((t) => t.type == "Loja (hipercard)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
                
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Débito (Loja - Elo)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "debito");
          taxas = taxas.filter((t) => t.type == "Loja (elo)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
               
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Crédito (Loja - Elo)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "credito");
          taxas = taxas.filter((t) => t.type == "Loja (elo)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
            
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Débito (Loja - Cabal Vale)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "debito");
          taxas = taxas.filter((t) => t.type == "Loja (cabal vale)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
               
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Crédito (Loja - Cabal Vale)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "credito");
          taxas = taxas.filter((t) => t.type == "Loja (cabal vale)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
            
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Débito (Loja - Amex)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "debito");
          taxas = taxas.filter((t) => t.type == "Loja (amex)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
             
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;
    case "Cartão de Crédito (Loja - Amex)":
      fetch("http://localhost/financeiro/ajax/taxas")
        .then((r) => r.json())
        .then((json) => {
          taxas = json;
          taxas = taxas.filter((t) => t.op == "credito");
          taxas = taxas.filter((t) => t.type == "Loja (amex)");

          document.querySelector("#sel-parc").style.display = "block";
          document.querySelector("#in-taxa-parc").style.display = "none";
          document
            .querySelector("#forma-pgt-md-col")
            .classList.remove("col-md-12");
          document.querySelector("#forma-pgt-md-col").classList.add("col-md-6");
          fetch(`http://localhost/financeiro/ajax/taxas_op/${taxas[0].id_tax}`)
            .then((r) => r.json())
            .then((json) => {
              let ht_parc = "";
              for (const p in json) {
                ht_parc += `<option value="${json[p].taxa_v}">${json[p].qt_parc}x - taxa - ${json[p].taxa_v} %</option>`;
                
                $("#sel-op-parc").html(ht_parc);
              }
            });
        });
      break;

    default:
      document.querySelector("#venda-taxa").value = "";
      document.querySelector("#sel-parc").style.display = "none";
      document.querySelector("#in-taxa-parc").style.display = "none";
      document.querySelector("#forma-pgt-md-col").classList.remove("col-md-6");
      document.querySelector("#forma-pgt-md-col").classList.add("col-md-12");
      break;
  }
}

function setTaxaValue(value) {
  document.querySelector("#venda-taxa").value = value;
}

let total_cart = 0;
let total_cart_reset = 0;

function updateSubtotalv(obj) {
	var quant = $(obj).val();
	if(quant <= 0) {
		$(obj).val(1);
		quant = 1;
	}

	var preco = $(obj).attr('data-price-v');
	var subtotal = preco * quant;
 
	$(obj).closest('tr').find('.subtotal-v').html(subtotal.toLocaleString("pt-BR", { style: "currency", currency: "BRL" }));

	updateTotalv();

}

function updateTotalv() {
  var total = 0;

  let desconto = document.querySelector('#desc-sale-sld').value;

  for (var q = 0; q < $(".p_quant-v").length; q++) {
    var quant = $(".p_quant-v").eq(q);

    var preco = quant.attr("data-price-v");
    var subtotal = preco * parseInt(quant.val());

    total += subtotal;

    // total_cart += subtotal;
    // total_cart_reset += subtotal;
    // total_form += subtotal;
  }

  sessionStorage.setItem('total_cart', total - desconto);
  sessionStorage.setItem('calc', total - desconto);

  $('#subtotal-step-1').html(total.toLocaleString("pt-BR", { style: "currency", currency: "BRL" }));
  $('#subtotal-step-2').html(total.toLocaleString("pt-BR", { style: "currency", currency: "BRL" }));
  $('#subtotal-step-3').html(total.toLocaleString("pt-BR", { style: "currency", currency: "BRL" }));
  if(desconto > 0) {
    $('#desconto-step-1').html(` - ${parseFloat(desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })}`);
    $('#desconto-step-2').html(` - ${parseFloat(desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })}`);
    $('#desconto-step-3').html(` - ${parseFloat(desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })}`);
  }
  $('#total-step-1').html((total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" }));
  $('#total-step-2').html((total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" }));
  $('#total-step-3').html((total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" }));

  $(".total-v").html(
    (total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
  );
  $(".tnf-v").val(total_cart);

  $(".venda-val").val(total - desconto);
  $("input[name=total_price-v]").val(total - desconto);
  $("#total-table-venda").html(
    (total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
  );
  $("#total-table-venda-step-2").html(
    (total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
  );
  $("#total-table-venda-step-3").html(
    (total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
  );
  $("#total-table-venda-modal").html(
    (total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
  );
  $("#total-table-venda-modal-calc").html(
    (total - desconto).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
  );
  
}

function calcVenda(value, op) {
  
  let total_form = sessionStorage.getItem('total_cart');
  let valSave = sessionStorage.getItem('calc');
  
  document.querySelector('#td-calc-venda').classList.remove('text-green')
  document.querySelector('#td-calc-venda').classList.add('text-danger')
  document.querySelector('#td-calc-venda').style.background = "#dd4b3933"
  
  if(valSave === null) {
    valSave = total_form - value;
    sessionStorage.setItem('calc', valSave);
  } else {
    valSave = valSave - value;
    sessionStorage.setItem('calc', valSave);
    if(valSave === 0) {
      document.querySelector('#val-restante-venda').style.display = "none";
    }
  }

  let pay_options = document.querySelectorAll('#pay-options');


  if(value !== '' && op === 'Dinheiro') {
    pay_options[0].options[0].setAttribute('selected','selected')
  }
  
  if(value !== '' && op === 'Cartão de Crédito (Loja)') {
    pay_options[0].options[1].setAttribute('selected','selected')
  } 

  if(value !== '' && op === '2º Cartão de Crédito (Loja)') {
    pay_options[0].options[3].setAttribute('selected','selected')
  } 
  
  if(value !== '' && op === 'Cartão de Débito (Loja)') {
    pay_options[0].options[2].setAttribute('selected','selected')
  } 

  if(value !== '' && op === '2º Cartão de Débito (Loja)') {
    pay_options[0].options[4].setAttribute('selected','selected')
  } 
  
  if(value !== '' && op === 'Pix') {
    pay_options[0].options[5].setAttribute('selected','selected')
  }

  if(value !== '' && op === 'Pic Pay') {
    pay_options[0].options[6].setAttribute('selected','selected')
  }
  
  if(value !== '' && op === 'Cartão de Crédito (Fornecedor)') {
    pay_options[0].options[7].setAttribute('selected','selected')
  } 

  if(value !== '' && op === '2º Cartão de Crédito (Fornecedor)') {
    pay_options[0].options[9].setAttribute('selected','selected')
  } 
  
  if(value !== '' && op === 'Cartão de Débito (Fornecedor)') {
    pay_options[0].options[8].setAttribute('selected','selected')
  }

  if(value !== '' && op === '2º Cartão de Débito (Fornecedor)') {
    pay_options[0].options[10].setAttribute('selected','selected')
  }

  $("#total-table-venda-modal-calc").html(
    JSON.parse(sessionStorage.getItem('calc')).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
  );
}

function LimparCalCampos() {
  let total_form = sessionStorage.getItem('total_cart');
  document.querySelector('#val-restante-venda').style.display = "block";
  document.querySelector('#td-calc-venda').classList.remove('text-danger')
  document.querySelector('#td-calc-venda').classList.add('text-green')
  document.querySelector('#td-calc-venda').style.background = "#00800033"
  $('#cacl-d').val('');
  $('#cacl-cc').val('');
  $('#cacl-cd').val('');
  sessionStorage.removeItem('calc');
  $("#total-table-venda-modal-calc").html(
    parseInt(total_form).toLocaleString("pt-BR", { style: "currency", currency: "BRL" })
  );
}

function saleDiscount(discount) {
  let tc = sessionStorage.getItem('total_cart')
  let t = tc - discount;
  sessionStorage.setItem('total_cart', t);
  //updateTotalv();
}

function excluirProdv(obj) {
  $(obj).closest("tr").remove();
  updateTotalv();
}
function addProdv(obj) {

  $("#add_prod-v").val("");
  var id_prod = $(obj).attr("data-id-v");
  var nome_prod = $(obj).attr("data-name-v");
  var preco = $(obj).attr("data-price-v");
  var cost = $(obj).attr("data-cost-v");
  var qtm = $(obj).attr("data-qtm-v");

  $(".searchresults-v").hide();

  if ($('input[name="products_v[' + id_prod + '][qtd]"]').length === 0) {
    var tr =
      '<tr class="active">' +
      "<td>" +
      '<div class="form-group">' +
      '<button class="btn btn bg-purple btn-flat" onclick="excluirProdv(this)"><i class="fa fa-times"></i></button>' +
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
      preco +
      '" name="products_v[' +
      id_prod +
      "][" +
      "preco_venda" +
      ']" value="' +
      '" id="preco"/>' +
      "</div>" +
      "</td>" +
      "<td>" +
      '<div class="form-group">' +
      '<input type="number" name="products_v[' +
      id_prod +
      "][" +
      "qtd" +
      ']" class="p_quant-v form-control" value="1" onchange="updateSubtotalv(this)" data-price-v="' +
      preco +
      '" />' +
      "</div>" +
      "</td>" +
      "</tr>";

    $("#products_table_v").append(tr);
  }

  updateTotalv();

  var nft =
    '<tr class="active">' +
    '<td colspan="2" class="tft" style="font-weight:bold;">Total em produtos</td>' +
    '<td class="total-v tft" style="font-weight:bold;"><strong></strong></td>' +
    '<td><input type="text" name="totalnf" class="tnf-v sr-only" value=""></td>' +
    "</tr>";

  // $("#totalF").html(nft);

}

$(function () {
  $("input[name=total_price-v]");

  $("#add_prod-v").on("keyup", function () {
    var datatype = $(this).attr("data-type");
    var q = $(this).val();

    if (datatype != "") {
      $.ajax({
        url: "/financeiro/ajax/" + datatype,
        type: "POST",
        data: { q: q },
        dataType: "json",
        success: function (json) {
          if ($(".searchresults-v").length == 0) {
            $("#add_prod-v").after('<div class="searchresults-v"></div>');
          }
          $(".searchresults-v").css(
            "left",
            $("#add_prod-v").offset().left + "px"
          );
          $(".searchresults-v").css(
            "top",
            $("#add_prod-v").offset().top + $("#add_prod-v").height() + 3 + "px"
          );

          var html = "";

          for (var i in json) {
            html +=
              '<div class="si" onclick="addProdv(this)" data-qtm-v="' +
              json[i].alert +
              '" data-cost-v="' +
              json[i].cost +
              '" data-id-v="' +
              json[i].id_prod +
              '" data-price-v="' +
              json[i].preco +
              '" data-name-v="' +
              json[i].nome_prod +
              '">' +
              '<a class="linkprod" href="javascript:;" style="font-size: 15px;color: #333;font-weight:bold;text-transform: capitalize;">' +
              json[i].nome_prod +
              "</a>" +
              "</div>";
          }

          $(".searchresults-v").html(html);
          $(".searchresults-v").show();
        },
      });
    }
  });
});

function setDesconto(value) {

  total_cart = total_cart_reset;
  // if (value === 0) {
  //   total_cart = total_cart_reset;
  // } else {
  //   let t_cart = parseFloat(total_cart);
  //   let desconto = parseFloat(value);
  //   let pdesconto = (t_cart * desconto) / 100;
  //   let vtc_atual = t_cart - pdesconto;
  //   total_cart = vtc_atual;
  //   $(".venda-val").val("");
  //   $(".venda-val").val(total_cart);
  //   $("#total-table-venda").html("");
  //   $("#total-table-venda").html(
  //     total_cart.toLocaleString("pt-BR", {
  //       style: "currency",
  //       currency: "BRL",
  //     })
  //   );
  // }

}

function refreshnotv() {
  window.location.reload();
}

function saidaDetailsManual(idsaida) {
  $.ajax({
    type: "GET",
    url: "http://localhost/financeiro/ajax/prods_saida/" + idsaida,
    dataType: "Json",
    beforeSend: function () {
      $(".modal-loading-s").show();
    },
    success: function (res) {
      
      if (res.code == 0) {
        $(".modal-loading-s").hide();

        $("#modal-pedido-impressao-s")
          .append(`<div class="modal fade" id="exampleModalCenterImprimir-s">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2e4158;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color:white">x</span></button>
                            <h4 class="modal-title text-center" style="color:white">Produtos da Saida
                            </h4>
                        </div>
                        <div class="modal-body" id="saida-modal-saidas">
                          <table class="table table-bordered table-striped">
                            <tbody>
                              <tr>
                                <th style="background-color:#ccc;">Produto</th>
                                <th style="background-color:#ccc;">Quantidade</th>
                                <th style="background-color:#ccc;">Preço</th>
                              </tr>
                              ${res.list
                                .map(
                                  (item) => `
                                    <tr>
                                      <td>${item.nome_prod}</td>
                                      <td>${item.quant}</td>
                                      <td>${parseFloat(
                                        item.valor
                                      ).toLocaleString("pt-BR", {
                                        style: "currency",
                                        currency: "BRL",
                                      })}</td>
                                    </tr> `
                                    )
                                .join("\n")}
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-purple pull-left" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>`);

        $("#exampleModalCenterImprimir-s").modal("show");

        $("#exampleModalCenterImprimir-s").on("hidden.bs.modal", function (e) {
          $(this).remove();
        });
      } else {
        alert(res.msg);
      }
    },
  });
}

function vendasDetails(id) {
  $.ajax({
    type: "GET",
    url: "http://localhost/financeiro/ajax/prods_venda/" + id,
    dataType: "Json",
    beforeSend: function () {
      $(".modal-loading-v").show();
    },
    success: function (res) {
      
      if (res.code == 0) {
        
        $(".modal-loading-v").hide();

        $("#modal-pedido-impressao-v")
          .append(`<div class="modal fade" id="exampleModalCenterImprimir-v">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2e4158;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color:white">x</span></button>
                            <h4 class="modal-title text-center" style="color:white">Produtos da Venda
                            </h4>
                        </div>
                        <div class="modal-body" id="saida-modal-saidas">
                          <table class="table table-bordered table-striped">
                            <tbody>
                              <tr>
                                <th style="background-color:#ccc;">Produto</th>
                                <th style="background-color:#ccc;">Quantidade</th>
                                <th style="background-color:#ccc;">Preço</th>
                              </tr>
                              ${res.list
                                .map(
                                  (item) => `
                                    <tr>
                                      <td>${item.nome_prod}</td>
                                      <td>${item.quant}</td>
                                      <td>${parseFloat(
                                        item.valor
                                      ).toLocaleString("pt-BR", {
                                        style: "currency",
                                        currency: "BRL",
                                      })}</td>
                                    </tr> `
                                    )
                                .join("\n")}
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-purple pull-left" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>`);

        $("#exampleModalCenterImprimir-v").modal("show");

        $("#exampleModalCenterImprimir-v").on("hidden.bs.modal", function (e) {
          $(this).remove();
        });
      } else {
        alert(res.msg);
      }
    },
  });
}

function reciboVenda(id) {
  $.ajax({
    type: "GET",
    url: "http://localhost/financeiro/ajax/prods_venda/" + id,
    dataType: "Json",
    beforeSend: function () {
      $(".modal-loading-v").show();
    },
    success: function (res) {
      
      if (res.code == 0) {
       
        $(".modal-loading-vr").hide();

        $("#modal-pedido-impressao-vr")
          .append(`<div class="modal fade" id="exampleModalCenterImprimir-vr" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Mudar Status do Pedido #1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="ti-close"></i>
                </button>
            </div>
           
            <div class="modal-body" id="m-b-print">
                <div style="display: flex;justify-content: center;margin-bottom: 5px;">
                    <span>entrega</span>
                </div>
                <div style="display: flex;flex-direction: column;">
                    <p style="margin-bottom: 0;"><strong>Nome do comerciante:</strong> SLD Nutrição Esportiva</p>
                    <p style="margin-bottom: 0;"><strong>Telefone:</strong> (34) 3246-7838</p>
                    <p style="margin-bottom: 0;"><strong>Endereço:</strong> Rua Rodolfo Paixão, Centro, 259</p>
                </div>
                <hr/ style="border-color: #5d5c5c;border-style: dashed;">
                
                <div style="display: flex;flex-direction: column;">
                    <p style="margin-bottom: 0;"><strong>Nº do pedido:</strong> #'</p>
                    <p style="margin-bottom: 0;"><strong>Data do pedido:</strong> 10/02/2021</p>
                    <p style="margin-bottom: 0;"><strong>Endereço Entrega:</strong> rua coronel, santa helena</p>
                    <p style="margin-bottom: 0;"><strong>Ponto de referência:</strong> antena</p>
                    <p style="margin-bottom: 0;text-transform:capitalize;"><strong>Nome do Cliente:</strong>teste</p>
                    <p style="margin-bottom: 0;"><strong>Telefone:</strong> teste</p>
                </div>
                <hr/ style="border-color: #5d5c5c;border-style: dashed;">
    
                <p style="margin-bottom: 0;"><strong>Produtos:</strong></p>
                
                <hr/ style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                <div style="display: flex;flex-direction: column;">
                    <div style="display:flex;justify-content:space-between;">
                        <p style="margin-bottom: 0;"><strong>Produto:</strong> 
                          teste
                        </p>
                        <p style="margin-bottom: 0;"> termogenico</p>
                        <p style="margin-bottom: 0;"><strong>Preço:</strong> 10.00</p>
                    </div>
                    <span style="font-size:12px;"><strong>Observação:</strong> teste</span>
                </div>
                
               
                <hr/ style="border-color: #5d5c5c;border-style: dashed;">
                
                <p style="margin-bottom: 0;"><strong>Total:</strong></p>
                <hr/ style="border-color: #5d5c5c;border-style: dashed;margin-top: 0px;margin-bottom: 5px;">
                <hr/ style="border-color: #5d5c5c;border-style: dashed;margin-top: -8px;margin-bottom: 5px;">
                <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                    <p style="margin-bottom: 0;"><strong>Tipo de Pgto:</strong></p>
                    <span>cartao</span>
                </div>
                <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                    <p style="margin-bottom: 0;"><strong>Tax. de entrega:</strong></p>
                    <span>entrega</span>
                </div>
                <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                    <p style="margin-bottom: 0;"><strong>Subtotal:</strong></p>
                    <span>10.00</span>
                </div>
                <div style="display: flex;justify-content: space-between;margin-bottom: 5px;">
                    <p style="margin-bottom: 0;"><strong>Total do pedido:</strong></p>
                    <span>10.00</span>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: space-between !important;">
                <button type="button" class="btn bg-facebook" style="border-radius:5px;" onclick="printJS('m-b-print', 'html', {font_size:'10pt'})">Imprimir pedido &nbsp;&nbsp;<i class="fa fa-print"></i></button>
                <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:5px;">Fechar
                </button>
            </div>
            </div>
        </div>
        </div>`);

        $("#exampleModalCenterImprimir-vr").modal("show");

        $("#exampleModalCenterImprimir-vr").on("hidden.bs.modal", function (e) {
          $(this).remove();
        });
      } else {
        alert(res.msg);
      }
    },
  });
}

function openCaixa() {
  let value = document.querySelector(".open-venda-v").value;
  let data_open = document.querySelector("#data-open-c").value;

  if (value === "") {
    Swal.fire({
      position: "center",
      type: "error",
      title: "Você precisa entrar com um valor para abrir o caixa",
      showConfirmButton: true,
    });
    return;
  }

  $.ajax({
    type: "POST",
    url: "http://localhost/financeiro/ajax/open_day/",
    data: { amount: value, data_open },
    dataType: "Json",
    beforeSend: function () {
      $("#btn-open-pos").html(
        '<i class="fa fa-refresh fa-spin"></i> &nbsp&nbspAguarde...'
      );
    },
    success: function (res) {
      if (res.code == 0) {
        $("#btn-open-pos").html("Sucesso!");
        Swal.fire({
          position: "center",
          type: "success",
          title: res.msg,
          showConfirmButton: false,
          timer: 2500,
        });
        window.location.reload(true);
      } else {
        $("#btn-open-pos").html("Tente Novamente");
        Swal.fire({
          position: "center",
          type: "error",
          title: res.msg,
          showConfirmButton: false,
          timer: 2500,
        });
      }
    },
  });
}


function searchClient(value) {
  
  $.ajax({
    type: "POST",
    url: "http://localhost/financeiro/ajax/search_client/",
    data: { c: value },
    dataType: "Json",
    success: function (res) {
      if (res.code == 0) {
        //$("#btn-open-pos").html("Sucesso!");
        
      } else {
        //$("#btn-open-pos").html("Tente Novamente");
        // Swal.fire({
        //   position: "center",
        //   type: "error",
        //   title: res.client,
        //   showConfirmButton: false,
        //   timer: 2500,
        // });
      }
    },
  });
}

function discountShow() {
  
  document.querySelector('#btn-authorize-discount').click();
} 

function verifyPassDiscount() {

  let discount = document.querySelector('#value-discount').value;
  let user = document.querySelector('#value-dis-user').value;
  let dHide = document.querySelector('#desconto-false');
  let dShow = document.querySelector('#desconto-true');
  let btnsave = document.querySelector('#btn-discount-save');
  let btnwait = document.querySelector('#btn-discount-spin');
  let btnclose = document.querySelector('#close-discount-modal');

  if(discount == '') {
    
    Swal.fire({
      position: "center",
      type: "warning",
      title: 'Digite uma senha',
      showConfirmButton: true,
    });

  } else {
    
    $.ajax({
      type: "POST",
      url: "http://localhost/financeiro/ajax/verify_discount/",
      data: { discount: discount, user:user },
      dataType: "Json",
      beforeSend: function () {
        btnsave.style.display = 'none';
        btnwait.style.display = 'block';
      },
      success: function (res) {
        if (res.code == 0) {
          dHide.style.display = 'none';
          dShow.style.display = 'block';
          btnclose.click();
        } else {
          dHide.style.display = 'block';
          dShow.style.display = 'none';
          btnsave.style.display = 'block';
          btnwait.style.display = 'none';
  
          Swal.fire({
            position: "center",
            type: "error",
            title: res.msg,
            showConfirmButton: true,
          });
        }
      },
    });

  }
}


$(document).ready(function () {
  //Initialize tooltips
  $('.nav-tabs > li a[title]').tooltip();
  
  //Wizard
  $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

      var $target = $(e.target);
  
      if ($target.parent().hasClass('disabled')) {
          return false;
      }
  });

  $(".next-step").click(function (e) {

      var $active = $('.wizard .nav-tabs li.active');
      $active.next().removeClass('disabled');
      nextTab($active);

  });
  $(".prev-step").click(function (e) {

      var $active = $('.wizard .nav-tabs li.active');
      prevTab($active);

  });
});

function nextTab(elem) {
  $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}