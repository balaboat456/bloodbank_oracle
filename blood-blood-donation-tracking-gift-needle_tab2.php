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
                                <th class="td-table">สถานะเข็ม</th>
                                <th class="td-table">วันที่ขอเข็ม</th>
                                <th class="td-table">ผู้ทำเรื่องขอเข็ม</th>
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
    function save_getneedle2() {
        var whereid = document.getElementById("whereid2").value;

        $.ajax({
            type: 'POST',
            url: 'blood-blood-donation-tracking-gift-needle_tab2_save.php?whereid=' + whereid,
            data: whereid,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                // alert(data.data)

                loadTable();
                loadTable2();
                loadTable3();
                document.getElementById("whereid").value = '0';
            },
            error: function(data) {
                console.log('An error occurred.');
                console.log(data);
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