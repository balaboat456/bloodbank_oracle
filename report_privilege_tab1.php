<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">


        <form role="form" id="myform" method="POST" action="blood-disconnectsave.php" enctype="multipart/form-data">

            <div class="card-body">
                <div class="table-no-scroll" style="height:75vh;">


                    <table id="list_table_json_out_refund">
                        <thead>
                            <tr>
                                <th class="td-table"><input type="checkbox" id="all_click1" onclick="setUnChecked(this.checked)"></th>
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
                        <tbody id="table_body_report">


                        </tbody>
                    </table>


                </div>



            </div>
    </div><!-- end card-->
</div>

<script>
    function save_getcard1() {
        var whereid = document.getElementById("whereid").value;

        $.ajax({
            type: 'POST',
            url: 'report_privilege_tab1_save.php?whereid=' + whereid,
            data: whereid,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                // alert(data.data);

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
</script>