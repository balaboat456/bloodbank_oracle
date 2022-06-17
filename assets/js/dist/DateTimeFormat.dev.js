"use strict";

function getTMDTHM(d) {
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = d1.getFullYear() + '-' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '-' + (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate()) + 'T' + (d1.getHours() >= 10 ? d1.getHours() : '0' + d1.getHours()) + ":" + (d1.getMinutes() >= 10 ? d1.getMinutes() : '0' + d1.getMinutes());
  return d2;
}

function StringToDateYMDHMS(d) {
  var dateArray = d.split(' ');
  var year = dateArray[0].split('-');
  var time = dateArray[1].split(':');
  var finishDate = new Date(year[0], year[1], year[2], time[0], time[1], time[2]);
  return finishDate;
}

function getDMYHM(d) {
  if (!d) {
    return "";
  }

  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate()) + '/' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '/' + d1.getFullYear() + ' ' + (d1.getHours() >= 10 ? d1.getHours() : '0' + d1.getHours()) + ":" + (d1.getMinutes() >= 10 ? d1.getMinutes() : '0' + d1.getMinutes());
  return d2;
}

function getDMY(d) {
  if (d == '0000-00-00' || d == '') {
    return '';
  }

  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate()) + '/' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '/' + d1.getFullYear();
  return d2;
}

function getDMY543(d) {
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate()) + '/' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '/' + (d1.getFullYear() + 543);
  return d2;
}

function getDMYHM543(d) {
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate()) + '/' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '/' + (d1.getFullYear() + 543) + ' ' + d1.getHours() + ":" + d1.getMinutes();
  return d2;
}

function getYMD543(d) {
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = d1.getFullYear() + 543 + '-' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '-' + (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate());
  return d2;
}

function getYMDHMDiff543(d) {
  var array = d.split(" ");
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = d1.getFullYear() - 543 + '-' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '-' + (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate()) + ' ' + array[1];
  return d2;
}

function getYMDHMPushH1(d) {
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  d1.setHours(d1.getHours() + 1);
  d1.setFullYear(d1.getFullYear());
  var dateStr = d1.getFullYear() + "-" + ("00" + (d1.getMonth() + 1)).slice(-2) + "-" + ("00" + d1.getDate()).slice(-2) + " " + ("00" + d1.getHours()).slice(-2) + ":" + ("00" + d1.getMinutes()).slice(-2);
  console.log(dateStr);
  return dateStr;
}

function getDMY2(d) {
  if (d == '0000-00-00' || d == '') return '';
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    return '';
  }

  var d2 = (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate()) + '/' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '/' + d1.getFullYear();
  return d2;
}

function dmyToymd() {
  var $date = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  if (!$date) return '';
  $date = $date.replace("/", ",");
  $date = $date.replace("/", ",");
  $date = $date.replace(" ", ",");
  $array = $date.split(",");
  if (isNaN(parseInt($array[0])) || isNaN(parseInt($array[1])) || isNaN(parseInt($array[2]))) return '';
  $result = $array[2] - 543 + "-" + $array[1] + "-" + $array[0];
  return $result;
}

function dmyToymd2() {
  var $date = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  if (!$date) return '';
  $date = $date.replace("/", ",");
  $date = $date.replace("/", ",");
  $date = $date.replace(" ", ",");
  $array = $date.split(",");
  if (isNaN(parseInt($array[0])) || isNaN(parseInt($array[1])) || isNaN(parseInt($array[2]))) return '';
  $result = $array[2] + "-" + $array[1] + "-" + $array[0];
  return $result;
}

function date8() {
  var $date = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var str2 = '';
  var str = numberR($($date).val());

  if (str.length == 8) {
    for (i = 0; i < str.length && i < 8; i++) {
      if (i == 2 || i == 4) {
        str2 = str2 + "/";
      }

      str2 = str2 + str.charAt(i);
      $($date).val(str2);
    }
  }
}

function timeFormat() {
  var $time = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var str2 = '';
  var str = numberR($($time).val());

  for (i = 0; i < str.length && i < 4; i++) {
    if (i == 2) {
      str2 = str2 + ":";
    }

    str2 = str2 + str.charAt(i);
    $($time).val(str2);
  }
}

function getDateToDMY(d) {
  var d1 = d;
  var d2 = (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate()) + '/' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '/' + d1.getFullYear();
  return d2;
}

function getTimeNow() {
  var today = new Date();
  var m = "00";
  var h = "00";

  if (today.getMinutes() >= 10) {
    m = today.getMinutes();
  } else {
    m = '0' + today.getMinutes();
  }

  if (today.getHours() >= 10) {
    h = today.getHours();
  } else {
    h = '0' + today.getHours();
  }

  var time = h + ":" + m;
  return time;
}

function getDateToString(today) {
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();

  if (dd < 10) {
    dd = '0' + dd;
  }

  if (mm < 10) {
    mm = '0' + mm;
  }

  return dd + '/' + mm + '/' + yyyy;
}

function getDMY543put5(d) {
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = (d1.getDate() + 5 >= 10 ? d1.getDate() + 5 : '0' + (d1.getDate() + 5)) + '/' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '/' + (d1.getFullYear() + 543);
  return d2;
}

function getYMD_Diff543(d) {
  var d1;

  if (d) {
    d1 = new Date(d);
  } else {
    d1 = new Date();
  }

  var d2 = d1.getFullYear() - 543 + '-' + (d1.getMonth() + 1 >= 10 ? d1.getMonth() + 1 : '0' + (d1.getMonth() + 1)) + '-' + (d1.getDate() >= 10 ? d1.getDate() : '0' + d1.getDate());
  return d2;
}