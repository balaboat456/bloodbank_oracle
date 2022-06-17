"use strict";

var indexDocument = 0;

function loadDocumentTable() {
  var donateid = $('#donateid').val(); // alert(donateid)

  $.ajax({
    url: 'data/bloodbonor/donatedocument.php?donateid=' + donateid,
    dataType: 'json',
    type: 'get',
    success: function success(data) {
      // console.log(data)
      var body = document.getElementById("list_table_json_document").getElementsByTagName('tbody')[0];

      while (body.firstChild) {
        body.removeChild(body.firstChild);
      }

      var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
      $.each(obj, function (index, value) {
        indexDocument = index;
        addRowDocument(value); // console.log(indexDocument);
        // console.log(value);
        // console.log('ssssss')
      });
    },
    error: function error(d) {
      /*console.log("error");*/
      alert("404. Please wait until the File is Loaded.");
    }
  });
}

function clickAddRowDocumentItem() {
  indexDocument++;
  addRowDocument();
}

function addRowDocument() {
  var im = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var arr; // console.log(im);
  // console.log(im.donatedocumentid)

  if (im.length != 0) {
    arr = [{
      donatedocumentid: im.donatedocumentid,
      donatedocumentcode: im.donatedocumentcode,
      donateid: im.donateid,
      donatedocumentname: im.donatedocumentname,
      donatedocumentpath: im.donatedocumentpath,
      donatedocumentfile: '',
      donatedocumentfilename: im.donatedocumentfilename
    }];
  } else {
    arr = [{
      donatedocumentid: '',
      donatedocumentcode: '',
      donateid: $('#donateid').val(),
      donatedocumentname: '',
      donatedocumentpath: '',
      donatedocumentfile: '',
      donatedocumentfilename: ''
    }];
  }

  var event_data = '';
  event_data += '<tr>';
  event_data += '<td  style="display:none;" >';
  event_data += JSON.stringify(arr);
  event_data += '</td>';
  event_data += '<td>' + '1' + '</td>';
  event_data += '<td>';
  event_data += '<input  type="text" autocomplete="off" name="donatedocumentname"' + indexDocument + ' ';
  event_data += 'class="form-control" value="' + arr[0].donatedocumentname + '" ';
  event_data += ' style="width:100%" onkeyup="setDonateDocumentName(this)" >';
  event_data += '</td>';
  event_data += '<td >';

  if (arr[0].donatedocumentfilename == '') {
    event_data += '<input style="width:350px"   type="file"  onchange="getBaseUrlDocumentImage(' + indexDocument + ',this)" ';
    event_data += 'id="donatedocumentfile' + indexDocument + '" name="donatedocumentfile' + indexDocument + '"  /> ';
  } else {
    event_data += '<p id="donatedocumentfilename' + indexDocument + '">' + arr[0].donatedocumentfilename + '</p>';
  }

  event_data += '</td>'; // event_data += '<td >';
  // event_data += '<label class="field-label" for="donatedocumentfile' + indexDocument + '">';
  // event_data += '<input hidden  type="file" class="field-input"  onchange="getBaseUrlDocumentImage(' + indexDocument + ',this)" ';
  // event_data += 'id="donatedocumentfile' + indexDocument + '" name="donatedocumentfile' + indexDocument + '"  /> ';
  // event_data += '<p id="donatedocumentfilename' + indexDocument + '">เลือกไฟล์</p>';
  // event_data += '</label></td>';

  event_data += '<td>';

  if (arr[0].donatedocumentpath != '') {
    event_data += '<button type="button" onclick=showDocPath("' + arr[0].donatedocumentpath + '") class="btn btn-info m-l-5">';
    event_data += '<i class="fa fa-search"> ดูเอกสาร</i>';
    event_data += '</button>';
  }

  event_data += '</td>';
  event_data += '<td  >';
  event_data += '<button type="button" onclick="deleteRowDocument(this)" class="btn btn-danger m-l-5">';
  event_data += '<i class="fa fa-trash"></i>';
  event_data += '</button>';
  event_data += '</td>';
  event_data += '</tr>';
  $("#list_table_json_document").append(event_data);
  setNoDocument();
  dateBE('.date2');
}

function saveDocument() {
  var data = {
    donateid: $('#donateid').val()
  };
  data['donatedocumentitem'] = JSON.stringify(getDocumentItem());
  spinnershow();
  $.ajax({
    type: 'POST',
    url: 'blood-donor-record-docment-emtry-save.php',
    data: data,
    dataType: 'json',
    complete: function complete() {
      var delayInMilliseconds = 200;
      setTimeout(function () {
        spinnerhide();
      }, delayInMilliseconds);
    },
    success: function success(data) {
      if (data.status == 1) {
        myAlertTop();
        loadDocumentTable();
      } else {
        myAlertTopError();
      }
    },
    error: function error(data) {
      console.log('An error occurred.');
      console.log(data);
      myAlertTopError();
    }
  });
}

function getDocumentItem() {
  var arr = [];
  var rows = document.getElementById("list_table_json_document").rows;

  for (var i = 1; i < rows.length; i++) {
    arr.push(rows[i].cells[0].innerHTML);
  }

  return arr;
}

function setDonateDocumentName(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item[0].donatedocumentname = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function getBaseUrlDocumentImage() {
  var num = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var self = arguments.length > 1 ? arguments[1] : undefined;
  var file = document.getElementById('donatedocumentfile' + num)['files'][0];
  var filename = $("#donatedocumentfile" + num).val();
  var filename2 = filename.split("/");
  $("#donatedocumentfilename" + num).html(filename.substring(11)); // alert(filename.replace("C:fakepath", ""));
  // alert(filename2);

  var reader = new FileReader();
  var baseString;

  reader.onloadend = function () {
    baseString = reader.result;
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item[0].donatedocumentfile = baseString;
    item[0].donatedocumentfilename = filename.substring(11);
    row.cells[0].innerHTML = JSON.stringify(item);
  };

  reader.readAsDataURL(file); // alert(filename);
}

function showDocPath(path) {
  window.open(localurl + '/' + path);
}

function setNoDocument() {
  var rows = document.getElementById("list_table_json_document").rows;

  for (var i = 1; i < rows.length; i++) {
    rows[i].cells[1].innerHTML = i;
  }
}

function deleteRowDocument(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
  setNoDocument();
}