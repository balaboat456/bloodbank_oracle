var item_lab_new ;
var active_id;
var active_self;

var dataBloodGroupArr = [];
var dataRhArr = [];

$(document).ready(function () {

    getBloodGroup().then(function success(data) {
        dataBloodGroupArr = data.data;
    });
    
    getRh().then(function success(data) {
        dataRhArr = data.data;
    });

});

function chActive(id,self) {

    
    for (i = 0; i < count; i++) {
        document.getElementById("trblood" + i).style.background = "#FFF";
    }
    document.getElementById("trblood" + id).style.background = "#b7e4eb";
    var item = JSON.parse(self.cells[0].innerHTML);
    item_lab_new = item ;
    loadTable_item(item.labcheckrequestid);
    $("#commentbyorder").val(item.commentbyorder);

    active_id = id;

    active_self = document.getElementById("trblood" + id);

    
    
    
}

function getDate8(elename) {
    date8('#'+elename);
}


function setRequestChecked(self)
{
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.labcheckrequest_v = (self.checked)?"1":"";
    row.cells[0].innerHTML = JSON.stringify(item);
    
    setCheckObject(row,item);
    
}

function setRequestAllowReport(self)
{
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.labcheckrequest_a = (self.checked)?"1":"";
    row.cells[0].innerHTML = JSON.stringify(item);

    setCheckObject(row,item);
}

function setCheckObject(row,item)
{
    if(row.cells[3].children[0].checked)
    {
        item.checkresultbloodstatusid = "15";
        row.cells[0].innerHTML = JSON.stringify(item);
        row.cells[10].innerHTML = "อนุญาตให้รายงาน";
        
    }else if(row.cells[2].children[0].checked)
    {
        item.checkresultbloodstatusid = "19";
        row.cells[0].innerHTML = JSON.stringify(item);
        row.cells[10].innerHTML = "ตรวจสอบแล้ว";
    }else
    {
        item.checkresultbloodstatusid = "2";
        row.cells[0].innerHTML = JSON.stringify(item);
        row.cells[10].innerHTML = "รับสิ่งส่งตรวจแล้ว";
    }

    
}


function setLabCheckResult(self)
{
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcheckresult = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCheckNormal(self)
{
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labchecknormal = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCheckValue(self)
{
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcheckvalue = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCheckUnit(self)
{
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcheckunit = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCheckCommentAnalyze(self)
{
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcheckcommentanalyze = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}



function setLoadLab(type,val='')
{
    var event_data = '';
    if(type == "B")
    {
        event_data = rowBloodGroup(val);
    }else if(type == "PN")
    {
        event_data = rowRh(val);
    }else if(type == "O")
    {
        event_data = rowTextOther(val);
    }else
    {   
        event_data = '';
    }
    return event_data;
}


function rowBloodGroup(val='')
{
    var event_data = '';
    event_data += '<select   onchange="setLabCheckResult(this)" ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataBloodGroupArr, function (ind, v) {
        event_data += '<option '+((val == v.bloodgroupid)?'selected':'') +'  value="' + v.bloodgroupid + '">' + v.bloodgroupname + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}


function rowRh(val='')
{
    var event_data = '';
    event_data += '<select   onchange="setLabCheckResult(this)" ';
    event_data += 'value="" class="form-control"   > '
    event_data += '<option  value=""></option>'
    $.each(dataRhArr, function (ind, v) {
        event_data += '<option '+((val == v.rhid)?'selected':'') +'  value="' + v.rhid + '">' + v.rhname3 + '</option>'
    })
    event_data += ' </select>';
    return event_data;
}


function rowTextOther(val='')
{
    var event_data = '';
    event_data += '<input type="text" onkeyup="setLabCheckResult(this)"  value="'+val+'" class="form-control">';
    return event_data;
}


// โหลด Result

function getBloodGroup() {
    return $.ajax({
        url: 'data/masterdata/bloodgroup.php',
        dataType: 'json',
        type: 'get',
    });
}

function getRh() {
    return $.ajax({
        url: 'data/masterdata/bloodrh.php',
        dataType: 'json',
        type: 'get',
    });
}
