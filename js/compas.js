//function: revisar la extensión del archivo cargado
function fileValidation() {
  var fileInput = document.getElementById("file-1");
  var filePath = fileInput.value;
  var allowedExtensions = /(.xlsx)$/i;
  if (!allowedExtensions.exec(filePath)) {
    showQuitMsg("server_answer", "btn-submit", "Archivo: sólo extensión .xlsx");
    fileInput.value = "";
    return false;
  }
  return true;
}
//***
//event: validar cada vez que se cambia el archivo
$("#file-1").change(function () {
  fileValidation();
});
//***
$("#clean-all").click(function (e) {
  e.preventDefault();
  cleanMsg("server_answer");
  $("#file-1").val("");
  $("#pdfFrame").attr("src", "");
});
$("#load-file").submit(function (e) {
  e.preventDefault();
  let fileInput = document.getElementById("file-1");
  if (fileInput.files.length <= 0) {
    showQuitMsg("server_answer", "btn-submit", "Archivo: obligatorio");
    return false;
  }
  if (!fileValidation()) {
    return false;
  }
  //var formData = new FormData();
  //var files = $("#file-1")[0].files[0];
  //formData.append('archivoexcel', files);
  let call = $.ajax({
    type: "post",
    url: "../server/tasks/edi_review_compas.php",
    data: new FormData(document.getElementById("load-file")),
    //data: formData,
    dataType: "json",
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      cleanMsg("server_answer");
      $("#file-1").attr("disabled", true);
      $("#clean-all").hide();
      $("#btn-submit").val("Espere...");
      $("#pdfFrame").attr("src", "");
      $("#btn-submit").attr("disabled", true);
      $("#server_answer").html(
        "No recargue la página mientras se muestre el mensaje de espera"
      );
    },
  });
  call.done(function (data) {
    cleanMsg("server_answer");
    if (
      data.status === "OK" &&
      Array.isArray(data.labels) &&
      Array.isArray(data.codes) &&
      data.labels.length === data.codes.length
    ) {
      doFile(data.labels, data.codes);
    } else if (data.status === "ERR" && data.message) {
      quitMsgEvent("server_answer", data.message, "div-red");
    } else {
      window.location = "../pages/index.php";
    }
  });
  call.fail(function () {
    cleanMsg("server_answer");
    quitMsgEvent(
      "server_answer",
      "Por favor, presione Limpiar y seleccione el archivo de nuevo",
      "div-red"
    );
  });
  call.always(function (data) {
    $("#file-1").attr("disabled", false);
    $("#btn-submit").val("Generar");
    $("#btn-submit").attr("disabled", false);
    $("#clean-all").show();
  });
});

let label;
let date;
function doFile(groupLbls, codesArray) {
  let doc = new jsPDF("l", "mm", "letter");
  if (
    Array.isArray(codesArray) &&
    Array.isArray(groupLbls) &&
    groupLbls.length == codesArray.length
  ) {
    codesArray.forEach(function (codeArray, index) {
      label = groupLbls[index];
      if (index != 0) {
        doc.addPage();
      }
      drawLines(doc);

      doc.setTextColor("1");
      doc.setFontSize(40);
      doc.text(28, 15, label["part"]);

      doc.addImage(codeArray.part, "PNG", 7, 19);

      doc.setTextColor("0");
      doc.setFontSize(10);
      doc.text(7, 31, label["curDesc"]);

      doc.setFontSize(24);
      doc.text(16, 48, label["cantidad"]);
      doc.addImage(codeArray.quant, "PNG", 4, 50);

      doc.setFontSize(11);
      date = label["fechaPro"];
      doc.text(
        57,
        39.5,
        date.slice(6) + "/" + date.slice(4, 6) + "/" + date.slice(2, 4)
      );

      doc.text(
        59,
        49.5,
        label["time"].slice(0, 2) + ":" + label["time"].slice(2)
      );

      doc.addImage(codeArray.ran, "PNG", 85, 34.5);
      doc.setTextColor("1");
      doc.setFontSize(38);
      doc.text(83, 60, label["ran"]);

      doc.addImage(codeArray.sup, "PNG", 4, 70.5);
      doc.setTextColor("0");
      doc.setFontSize(15);
      doc.text(32, 69, label["origen"]);

      doc.addImage(codeArray.serialCode, "PNG", 12, 86);
      doc.setFontSize(13);
      doc.text(32, 85, codeArray.serial);

      doc.text(94, 69, label["yp"]);
      doc.text(94, 78, label["ts"]);
      doc.text(94, 87, label["el"]);
      //doc.text(94, 96, label[""]);

      doc.addImage(codeArray.qr, "PNG", 127, 65);
    });
    doc.setProperties({
      title: "Etiquetas COMPAS",
      author: "Sistemas POSCO Ags", //Noé S. Reyes
      creator: "POSCO MPPC S.A. DE C.V.",
    });
    if (groupLbls.length > 400) {
      //Mostrar pdf en una nueva pestaña
      window.open(doc.output("bloburl"));
    } else {
      //Mostrar pdf en iframe
      $("#pdfFrame").attr("src", doc.output("datauristring"));
    }
  } else {
    quitMsgEvent(
      "server_answer",
      "No se pueden generar las etiquetas. Inténtelo de nuevo",
      "div-red"
    );
  }
}
function drawLines(doc) {
  doc.setLineWidth(0.5);

  doc.rect(2, 3, 160, 95);

  doc.setFontSize(9);

  doc.rect(2, 3, 160, 30); //C1
  doc.rect(2, 3, 160, 14, "F");
  doc.setTextColor("1");
  doc.setFontType("bold");
  doc.text(3, 7, "PART NUM.\n(P)");

  doc.rect(2, 33, 45, 29); //C2
  doc.setTextColor("0");
  doc.text(3, 37, "QUANTITY\n(Q)");

  doc.rect(47, 33, 35, 29); //C3

  doc.line(47, 43, 82, 43); //L1
  doc.line(47, 53, 82, 53); //L2

  doc.rect(2, 62, 80, 18); //C4
  doc.text(3, 65.5, "SUPPLIER\n(V)");

  doc.rect(2, 80, 80, 18); //C5
  doc.text(3, 83, "SERIAL\n(4S)");
  doc.text(3, 97, "POSCO MPPC S.A. DE C.V.");

  doc.rect(82, 33, 80, 29); //C6
  doc.rect(82, 48, 80, 14, "F");
  doc.text(84, 46.5, "RAN (15K)");

  doc.rect(82, 62, 40, 36); //C7

  doc.setFontSize(6);
  doc.text(107, 64.5, "YP(Mpa)");
  doc.text(107, 73.5, "TS(Mpa)");
  doc.text(107, 82.5, "EL %");
  doc.text(107, 91.5, "N/A");

  doc.line(82, 71, 122, 71); //L1
  doc.line(82, 80, 122, 80); //L2
  doc.line(82, 89, 122, 89); //L3

  doc.rect(122, 62, 40, 36); //C8
}
