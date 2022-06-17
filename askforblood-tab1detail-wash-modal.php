<div class="modal fade blank-modal" id="requestbloodwashmodal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">รายละเอียดการทำ Wash red cell</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <!-- BODY -->

                <!-- แถว 1 -->
                <div class="row" id="wash_row1">
                    <div hidden class="form-group col-md-3">
                        id
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_id1" name="bloodwash_id1">
                    </div>
                    <div class="form-group col-md-3">
                        วันที่นัดรับเลือด
                        <!-- <input type="text" autocomplete="off" value="" class="form-control date1 hasDatepicker" id="bloodwash_date1" name="bloodwash_date1"> -->
                        <select class="form-control" id="bloodwash_date1" name="bloodwash_date1">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        รอบ <br>
                        <!-- <input type="radio" id="bloodwash_round1_1" name="bloodwash_round1" value="11:00">
                        <label for="bloodwash_round1_1">11:00 น.</label>
                        <input type="radio" id="bloodwash_round1_2" name="bloodwash_round1" value="14:00">
                        <label for="bloodwash_round1_2">14:00 น.</label> -->
                        <input type="radio" id="bloodwash_round1_3" onclick="uncheck1_3();" name="bloodwash_round1" value="13:00">
                        <label for="bloodwash_round1_3">13:00 น.</label>
                    </div>
                    <div class="form-group col-md-1">
                        ปริมาณ (unit)
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_unit1" name="bloodwash_unit1">
                    </div>
                    <div class="form-group col-md-1">
                        ปริมาณ (ml)
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_ml1" name="bloodwash_ml1">
                    </div>
                    <div class="form-group col-md-1">
                        ความเข้มข้น %
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_intense1" name="bloodwash_intense1">
                    </div>
                </div>

                <!-- แถว 2 -->
                <div class="row" id="wash_row2">
                    <div hidden class="form-group col-md-3">
                        id
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_id2" name="bloodwash_id2">
                    </div>
                    <div class="form-group col-md-3">
                        วันที่นัดรับเลือด
                        <!-- <input type="text" autocomplete="off" value="" class="form-control date1 hasDatepicker" id="bloodwash_date2" name="bloodwash_date2"> -->
                        <select class="form-control" id="bloodwash_date2" name="bloodwash_date2">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        รอบ <br>
                        <!-- <input type="radio" id="bloodwash_round2_1" name="bloodwash_round2" value="11:00">
                        <label for="bloodwash_round2_1">11:00 น.</label>
                        <input type="radio" id="bloodwash_round2_2" name="bloodwash_round2" value="14:00">
                        <label for="bloodwash_round2_2">14:00 น.</label> -->
                        <input type="radio" id="bloodwash_round2_3" onclick="uncheck2_3();" name="bloodwash_round2" value="13:00">
                        <label for="bloodwash_round2_3">13:00 น.</label>
                    </div>
                    <div class="form-group col-md-1">
                        ปริมาณ (unit)
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_unit2" name="bloodwash_unit2">
                    </div>
                    <div class="form-group col-md-1">
                        ปริมาณ (ml)
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_ml2" name="bloodwash_ml2">
                    </div>
                    <div class="form-group col-md-1">
                        ความเข้มข้น %
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_intense2" name="bloodwash_intense2">
                    </div>
                </div>

                <!-- แถว 3 -->
                <div class="row" id="wash_row3">
                    <div hidden class="form-group col-md-3">
                        id
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_id3" name="bloodwash_id3">
                    </div>
                    <div class="form-group col-md-3">
                        วันที่นัดรับเลือด
                        <!-- <input type="text" autocomplete="off" value="" class="form-control date1 hasDatepicker" id="bloodwash_date3" name="bloodwash_date3"> -->
                        <select class="form-control" id="bloodwash_date3" name="bloodwash_date3">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        รอบ <br>
                        <!-- <input type="radio" id="bloodwash_round3_1" name="bloodwash_round3" value="11:00">
                        <label for="bloodwash_round3_1">11:00 น.</label>
                        <input type="radio" id="bloodwash_round3_2" name="bloodwash_round3" value="14:00">
                        <label for="bloodwash_round3_2">14:00 น.</label> -->
                        <input type="radio" id="bloodwash_round3_3" onclick="uncheck3_3();" name="bloodwash_round3" value="13:00">
                        <label for="bloodwash_round3_3">13:00 น.</label>
                    </div>
                    <div class="form-group col-md-1">
                        ปริมาณ (unit)
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_unit3" name="bloodwash_unit3">
                    </div>
                    <div class="form-group col-md-1">
                        ปริมาณ (ml)
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_ml3" name="bloodwash_ml3">
                    </div>
                    <div class="form-group col-md-1">
                        ความเข้มข้น %
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_intense3" name="bloodwash_intense3">
                    </div>
                </div>

                <!-- แถว 4 -->
                <div class="row" id="wash_row4">
                    <div hidden class="form-group col-md-3">
                        id
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_id4" name="bloodwash_id4">
                    </div>
                    <div class="form-group col-md-3">
                        วันที่นัดรับเลือด
                        <!-- <input type="text" autocomplete="off" value="" class="form-control date1 hasDatepicker" id="bloodwash_date4" name="bloodwash_date4"> -->
                        <select class="form-control" id="bloodwash_date4" name="bloodwash_date4">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        รอบ <br>
                        <!-- <input type="radio" id="bloodwash_round4_1" name="bloodwash_round4" value="11:00">
                        <label for="bloodwash_round4_1">11:00 น.</label>
                        <input type="radio" id="bloodwash_round4_2" name="bloodwash_round4" value="14:00">
                        <label for="bloodwash_round4_2">14:00 น.</label> -->
                        <input type="radio" id="bloodwash_round4_3" onclick="uncheck4_3();" name="bloodwash_round4" value="13:00">
                        <label for="bloodwash_round4_3">13:00 น.</label>
                    </div>
                    <div class="form-group col-md-1">
                        ปริมาณ (unit)
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_unit4" name="bloodwash_unit4">
                    </div>
                    <div class="form-group col-md-1">
                        ปริมาณ (ml)
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_ml4" name="bloodwash_ml4">
                    </div>
                    <div class="form-group col-md-1">
                        ความเข้มข้น %
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_intense4" name="bloodwash_intense4">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        ชื่อผู้ติดต่อ
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_user" name="bloodwash_user">
                    </div>
                    <div class="form-group col-md-3">
                        โทร
                        <input type="text" autocomplete="off" value="" class="form-control" id="bloodwash_tel" name="bloodwash_tel">
                    </div>
                </div>

                <p style="font-size:20px;">ต้องการ Wash red cell 1 unit กรุณาเตรียม NSS 500 ml จำนวน 6 ชุด + tranfer
                    set 6 set ต่อ 1 unit</p>
                <p style=" color:red; font-size:20px;">* หมายเหตุ ไม่สามารถรับเลือดได้ในวันหยุด, วันเสาร์ - อาทิตย์ และ
                    วันหยุดนักขัตฤกษ์</p>
                <div class="modal-footer">
                    <div class="save-bottom">
                        <div class="form-group text-right m-b-0">
                            <button onclick="requestBloodWashModalClose1()" id="btnAddModal" class="btn btn-success" type="button">
                                <span class="btn-label"><i class="fa fa-plus"></i></span>ตกลง
                            </button>
                            <button type="button" onclick="requestBloodWashModalClose2()" class="btn btn-warning m-l-5">
                                <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function() {
    //     dateBE('.date99');
    // });

    var started = 0;

    function requestBloodWashModalOpen(self) {

        var role = "<?php echo $_SESSION['rolename']; ?>";
        // Nurse
        var wash_stat = document.getElementById("washedredbloodcell").checked;

        if (wash_stat == true) {
            if (role == 'Nurse') {
                if (self.checked) {
                    var dateFrom = new Date(dmyToymd($("#usedblooddatefrom").val()));
                    var today = new Date();
                    var diffData = parseInt((dateFrom - today) / (1000 * 60 * 60 * 24), 10);

                    if (diffData < 2 || isNaN(diffData)) {

                        var date3 = new Date();
                        date3.setDate(date3.getDate() + 3);
                        date3.setFullYear(date3.getFullYear() + 543);
                        var dateString = moment(date3).format('DD/MM/YYYY');

                        mgsError("ขออภัยค่ะ!", "Washed Red Cell สามารถใช้เลือดได้ตั้งแต่วันที่ " + dateString, getUsedbloodDateFromTo1Callback);

                        self.checked = false;
                        return false;
                    }

                    $("#requestbloodwashmodal").modal('show');
                    loopdate();
                }
            } else {
                $("#requestbloodwashmodal").modal('show');
                loopdate();
            }
        } else {

        }
    }

    function requestBloodWashModalClose1() {
        var bloodwash_user = document.getElementById("bloodwash_user").value;
        var bloodwash_tel = document.getElementById("bloodwash_tel").value;
        if (bloodwash_user == '' || bloodwash_tel == '') {
            mgsError("ขออภัยค่ะ!", "กรุณาระบุผู้ติดต่อและเบอร์โทรติดต่อ");
        } else {
            $("#requestbloodwashmodal").modal('hide');
        }
    }

    function requestBloodWashModalClose2() {
        var bloodwash_id1 = document.getElementById("bloodwash_id1").value;

        if (bloodwash_id1 == '') {
            $('#bloodwash_id1').val('');
            $('#bloodwash_id2').val('');
            $('#bloodwash_id3').val('');
            $('#bloodwash_id4').val('');
            $('#bloodwash_unit1').val('');
            $('#bloodwash_unit2').val('');
            $('#bloodwash_unit3').val('');
            $('#bloodwash_unit4').val('');
            $('#bloodwash_ml1').val('');
            $('#bloodwash_ml2').val('');
            $('#bloodwash_ml3').val('');
            $('#bloodwash_ml4').val('');
            $('#bloodwash_intense1').val('');
            $('#bloodwash_intense2').val('');
            $('#bloodwash_intense3').val('');
            $('#bloodwash_intense4').val('');
            $('#bloodwash_user').val('');
            $('#bloodwash_tel').val('');

            document.getElementById("bloodwash_round1_3").checked = false;
            document.getElementById("bloodwash_round2_3").checked = false;
            document.getElementById("bloodwash_round3_3").checked = false;
            document.getElementById("bloodwash_round4_3").checked = false;

            $('#bloodwash_date1').val('');
            $('#bloodwash_date2').val('');
            $('#bloodwash_date3').val('');
            $('#bloodwash_date4').val('');

            document.getElementById("washedredbloodcell").checked = false;
        }

        $("#requestbloodwashmodal").modal('hide');
    }
    var ldate = 0;

    function loopdate() {

        // if (ldate == 0) {
        //     $("#bloodwash_date1").empty();
        //     $("#bloodwash_date2").empty();
        //     $("#bloodwash_date3").empty();
        //     $("#bloodwash_date4").empty();
        // }

        var bloodwash_date1 = $('#bloodwash_date1').val();
        var bloodwash_date2 = $('#bloodwash_date2').val();
        var bloodwash_date3 = $('#bloodwash_date3').val();
        var bloodwash_date4 = $('#bloodwash_date4').val();

        $("#bloodwash_date1").empty();
        $("#bloodwash_date2").empty();
        $("#bloodwash_date3").empty();
        $("#bloodwash_date4").empty();

        if (bloodwash_date1 != '') {
            $('#bloodwash_date1').append("<option value=" + bloodwash_date1 + ">" + select_date_wash(bloodwash_date1) + "</option>");
        }
        if (bloodwash_date2 != '') {
            $('#bloodwash_date2').append("<option value=" + bloodwash_date2 + ">" + select_date_wash(bloodwash_date2) + "</option>");
        }
        if (bloodwash_date3 != '') {
            $('#bloodwash_date3').append("<option value=" + bloodwash_date3 + ">" + select_date_wash(bloodwash_date3) + "</option>");
        }
        if (bloodwash_date4 != '') {
            $('#bloodwash_date4').append("<option value=" + bloodwash_date4 + ">" + select_date_wash(bloodwash_date4) + "</option>");
        }


        $('#bloodwash_date1').append('<option value=""></option>');
        $('#bloodwash_date2').append('<option value=""></option>');
        $('#bloodwash_date3').append('<option value=""></option>');
        $('#bloodwash_date4').append('<option value=""></option>');

        var start = new Date(dmyToymd($("#usedblooddatefrom").val()));
        var end = new Date(dmyToymd($("#usedblooddateto").val()));


        var loop = new Date(dmyToymd($("#usedblooddatefrom").val()));
        loop.setDate(loop.getDate());

        var g_day = '';
        while (loop <= end) {
            // date_1 = loop.toLocaleDateString("en-US");
            // date_2 = date_1.split("/");
            // date_show = date_2[1] + '/' + date_2[0] + '/' + date_2[2];
            g_day = loop.getDay();

            // alert(g_day);

            if (g_day == 6 || g_day == 0) {

            } else {
                date_th = loop.toLocaleDateString("th-TH");
                date_2 = date_th.split("/");
                date_show = date_2[2] + '-' + date_2[1] + '-' + date_2[0];
                // alert(date_th);

                $('#bloodwash_date1').append("<option value=" + date_show + ">" + date_th + "</option>");
                $('#bloodwash_date2').append("<option value=" + date_show + ">" + date_th + "</option>");
                $('#bloodwash_date3').append("<option value=" + date_show + ">" + date_th + "</option>");
                $('#bloodwash_date4').append("<option value=" + date_show + ">" + date_th + "</option>");
            }



            var newDate = loop.setDate(loop.getDate() + 1);
            loop = new Date(newDate);
        }


    }

    var uncheck_bloodwash_round1_3 = 0;
    var uncheck_bloodwash_round2_3 = 0;
    var uncheck_bloodwash_round3_3 = 0;
    var uncheck_bloodwash_round4_3 = 0;

    function uncheck1_3() {
        if (uncheck_bloodwash_round1_3 % 2 == 0) {
            document.getElementById("bloodwash_round1_3").checked = true;
            uncheck_bloodwash_round1_3++;
        } else {
            document.getElementById("bloodwash_round1_3").checked = false;
            uncheck_bloodwash_round1_3--;
        }

    }

    function uncheck2_3() {
        if (uncheck_bloodwash_round2_3 % 2 == 0) {
            document.getElementById("bloodwash_round2_3").checked = true;
            uncheck_bloodwash_round2_3++;
        } else {
            document.getElementById("bloodwash_round2_3").checked = false;
            uncheck_bloodwash_round2_3--;
        }

    }

    function uncheck3_3() {
        if (uncheck_bloodwash_round3_3 % 2 == 0) {
            document.getElementById("bloodwash_round3_3").checked = true;
            uncheck_bloodwash_round3_3++;
        } else {
            document.getElementById("bloodwash_round3_3").checked = false;
            uncheck_bloodwash_round3_3--;
        }

    }

    function uncheck4_3() {
        if (uncheck_bloodwash_round4_3 % 2 == 0) {
            document.getElementById("bloodwash_round4_3").checked = true;
            uncheck_bloodwash_round4_3++;
        } else {
            document.getElementById("bloodwash_round4_3").checked = false;
            uncheck_bloodwash_round4_3--;
        }

    }
</script>