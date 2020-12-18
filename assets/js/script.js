// Datables
$(document).ready(function () {
  $("#dataTable").DataTable();
  $("#dataTable2").DataTable();
  $("#dataTable3").DataTable();
  $("#dataTable4").DataTable();
  $("#dataTable5").DataTable();
  $("#dataTable6").DataTable();
});


// Stock
$("#idBarang").change(function () {
  var idStock = $("#idBarang").val();
  var arrayIdStock = [];
  $.each(idStock.split("-"), function () {
    arrayIdStock.push($.trim(this));
  });
  $("#stock").val(arrayIdStock[1]);
  $("#inputStock").attr({
    max: arrayIdStock[1],
  });
  $(".btn-number").attr("disabled", false);
});


// Format harga/pcs
autoNumericElements = AutoNumeric.multiple("#hargaBarang", {
  allowDecimalPadding: false,
  caretPositionOnFocus: "start",
  createLocalList: false,
  digitGroupSeparator: ",",
  emptyInputBehavior: "null",
  maximumValue: "9999999999999",
  minimumValue: "0",
  unformatOnSubmit: true,
});

// Plus Minus Jumlah Quantity penjualan
$(".btn-number").click(function (e) {
  e.preventDefault();

  fieldName = $(this).attr("data-field");
  type = $(this).attr("data-type");
  var input = $("input[name='" + fieldName + "']");
  var currentVal = parseInt(input.val());
  if (!isNaN(currentVal)) {
    if (type == "minus") {
      if (currentVal > input.attr("min")) {
        input.val(currentVal - 1).change();
      }
      if (parseInt(input.val()) == input.attr("min")) {
        $(this).attr("disabled", true);
      }
    } else if (type == "plus") {
      if (currentVal < input.attr("max")) {
        input.val(currentVal + 1).change();
      }
      if (parseInt(input.val()) == input.attr("max")) {
        $(this).attr("disabled", true);
      }
    }
  } else {
    input.val(0);
  }
});

$(".input-number").focusin(function () {
  $(this).data("oldValue", $(this).val());
});

$(".input-number").change(function () {
  minValue = parseInt($(this).attr("min"));
  maxValue = parseInt($(this).attr("max"));
  valueCurrent = parseInt($(this).val());

  let name = $(this).attr("name");
  if (valueCurrent >= minValue) {
    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr(
      "disabled"
    );
  } else {
    swal("Error", "Stock barang tidak mencukupi", "error");
    $(this).val($(this).data("oldValue"));
  }
  if (valueCurrent <= maxValue) {
    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr(
      "disabled"
    );
  } else {
    swal("Error", "Stock barang tidak mencukupi", "error");
    $(this).val($(this).data("oldValue"));
  }
});


// Update otomatis format total harga ketika memasukkan harga satuan
$("#hargaBarang").keyup(function () {
  var qty = $("#inputStock").val();
  var priceEach = parseFloat($("#hargaBarang").val().replace(/,/g, ""));
  var totalHarga = qty * priceEach;
  $("#totalHarga").val(totalHarga);
  new AutoNumeric.multiple("#totalHarga", {
    caretPositionOnFocus: "start",
    createLocalList: false,
    digitGroupSeparator: ",",
    emptyInputBehavior: "null",
    maximumValue: "9999999999999",
    minimumValue: "0",
    unformatOnSubmit: true,
    currencySymbol: "Rp. ",
    decimalPlaces: 0,
  });
});

// Update otomatis format total harga ketika stock berubah
$("#inputStock").change(function () {
  var qty = $("#inputStock").val();
  var priceEach = parseFloat($("#hargaBarang").val().replace(/,/g, ""));
  var totalHarga = qty * priceEach;
  $("#totalHarga").val(totalHarga);
  new AutoNumeric.multiple("#totalHarga", {
    caretPositionOnFocus: "start",
    createLocalList: false,
    digitGroupSeparator: ",",
    emptyInputBehavior: "null",
    maximumValue: "9999999999999",
    minimumValue: "0",
    unformatOnSubmit: true,
    currencySymbol: "Rp. ",
    decimalPlaces: 0,
  });
});
