<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">


        <form role="form" id="myform" method="POST" action="blood-disconnectsave.php" enctype="multipart/form-data">

            <div class="card-body">
                <div class="table-no-scroll" style="height:75vh;">


                    <table id="list_table_json_out_refund2">
                        <thead>
                            <tr>
                                <th class="td-table"><input type="checkbox" id="all_click2" onclick="setUnChecked2(this.checked)"></th>
                                <th class="td-table">เลขที่บัตรรับบริจาคโลหิต</th>
                                <th class="td-table">ชื่อ-นามสกุล ยศ และคำนำหน้านำ</th>
                                <th class="td-table">หมู่โลหิต</th>
                                <th class="td-table">วัน/เดือน/ปี เกิด</th>
                                <th class="td-table">ที่อยู่</th>
                                <th class="td-table">สถานะบัตร</th>
                                <th class="td-table">วันที่ขอบัตร</th>
                                <th class="td-table">ผู้ทำเรื่องขอบัตร</th>
                            </tr>
                        </thead>
                        <tbody id="table_body_report2">
                        </tbody>
                    </table>


                </div>



            </div>
    </div><!-- end card-->
</div>

<script>
    function save_getcard2() {
        var whereid = document.getElementById("whereid2").value;

        $.ajax({
            type: 'POST',
            url: 'report_privilege_tab2_save.php?whereid=' + whereid,
            data: whereid,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                // alert(data.data)

                table_report5();
                table_report5_2();
                table_report5_3();
                document.getElementById("whereid").value = '0';
            },
            error: function(data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    }

    function table_report5_2() {
        document.getElementById("whereid2").value = '0';
        var fromdate2 = document.getElementById("fromdate").value;
        var todate2 = document.getElementById("todate").value;
        var placeid = document.getElementsByName("placeid");
        var placeid = "1";
        if (document.getElementById("placeid2").checked) {
            placeid = "2";
        } else if (document.getElementById("placeid3").checked) {
            placeid = "3";
        }



        var fromyear = fromdate2.substr(-4, 4);
        var toyear = todate2.substr(-4, 4);

        var frommouth = fromdate2.substr(-7, 2);
        var tomouth = todate2.substr(-7, 2);

        var fromday = fromdate2.substr(0, 2);
        var today = todate2.substr(0, 2);

        var fromdate = fromyear + '-' + frommouth + '-' + fromday;
        var todate = toyear + '-' + tomouth + '-' + today;
        // alert(unitnameid);

        // alert(year);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/report_every_thing5_2.php',
            data: {
                fromdate: fromdate,
                todate: todate,
                placeid: placeid
            },
            success: function(data) {
                console.log(data);
                console.log(data.resultArray);

                Array_id2 = data.Array_id1;
                console.log(Array_id2);



                var event_data = "";
                var obj = JSON.parse(JSON.stringify(data.resultArray).replace(/null/g, '""').replace(/"\"\""/g, '""'));

                $.each(obj, function(index, value) {
                    var arr = [value];
                    event_data += '';
                    event_data += '<tr onClick="chActiveBloodStockPay2(this)">';
                    event_data += '<td  style="display:none;" >';
                    event_data += index + JSON.stringify(arr);
                    event_data += '</td>';
                    event_data += '<td><input type="checkbox" id="' + value.donateid + '" onchange="setBloodOutCheck2(' + value.donateid + ')" ></td>';
                    event_data += '<td>' + value.donorcode + '</td>';
                    event_data += '<td>' + value.fullname + '</td>';
                    event_data += '<td>' + value.blood_group + '</td>';
                    event_data += '<td>' + value.donorbirthday + '</td>';
                    event_data += '<td>' + value.address + '</td>';
                    event_data += '<td>' + value.getcard + '</td>';
                    event_data += '<td>' + value.getcarddate + '</td>';
                    event_data += '<td>' + value.staffname + '</td>';
                    event_data += '</tr>';
                    // $count++;

                });
                // document.getElementById('table_body_report').innerHTML = data.data;
                document.getElementById('table_body_report2').innerHTML = event_data;

            },
            error: function(data) {
                console.log("errrrr");
            },
        });
    }

    function chActiveBloodStockPay2(self) {

        var table = document.getElementById("list_table_json_out_refund2");
        var r = 1;
        while (row = table.rows[r++]) {
            row.style.background = "#FFF"
        }
        self.style.background = "#b7e4eb";


    }

    function setUnChecked2(checkedState) {
        var rows = document.getElementById("list_table_json_out_refund2").rows;
        var all_click2 = document.getElementById("all_click2").checked;
        var whereid = document.getElementById("whereid2").value;


        if (all_click2 == true) {
            var data_arr = '';
            for (var i = 1; i < rows.length; i++) {
                rows[i].cells[1].children[0].checked = checkedState;
                data_arr += ',' + rows[i].cells[1].children[0].id;
                console.log(rows[i].cells[1].children[0].id);
            }
            document.getElementById("whereid2").value = "0" + data_arr;
        } else {
            for (var i = 1; i < rows.length; i++) {
                rows[i].cells[1].children[0].checked = checkedState;
            }
            document.getElementById("whereid2").value = "0";
        }

    }

    function setBloodOutCheck2(self) {

        var whereid = document.getElementById("whereid2").value;
        var checked = document.getElementById(self).checked;
        if (checked == true) {
            document.getElementById("whereid2").value = whereid + ',' + self;
        } else {
            document.getElementById("whereid2").value = whereid.replace("," + self, "");
        }

    }
</script>