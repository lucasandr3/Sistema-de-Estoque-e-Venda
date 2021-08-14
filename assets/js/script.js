$("#datades").mask("00/00/0000");
$("#valordes").mask("0000000000.00", { reverse: true });
$("#valorendes").mask("0000000000.00", { reverse: true });
$("#jurodes").mask("000.000.000.000.0", { reverse: true });

$("#datarec").mask("00/00/0000");
$("#valorrec").mask("0000000000.00", { reverse: true });
$("#valorenrec").mask("0000000000.00", { reverse: true });
$("#jurorec").mask("000.000.000.000.0", { reverse: true });

$("#v_custo").mask("0000000000.00", { reverse: true });
$("#v_venda").mask("0000000000.00", { reverse: true });
$("#tel_cliente").mask("00000000000", { reverse: true });
$("#aniversario").mask("00/00/0000", { reverse: true });
$("#taxam").mask("00.00", { reverse: true });

$("#cep").mask("00000-000", { reverse: true });

var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, "").length === 11
      ? "(00) 00000-0000"
      : "(00) 0000-00009";
  },
  spOptions = {
    onKeyPress: function (val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    },
  };

$("#tel").mask(SPMaskBehavior, spOptions);
