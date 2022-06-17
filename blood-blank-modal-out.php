<!-- Modal -->

<input type="hidden" id="bloodstockmainid3" name="bloodstockmainid3">
<input type="hidden" id="outbloodborrowid" name="outbloodborrowid">
<input type="hidden" id="outbloodborrowitemid" name="outbloodborrowitemid">
<input type="hidden" id="outbloodgroup" name="outbloodgroup">
<input type="hidden" id="outhospitalid" name="outhospitalid">


<div class="modal fade blank-modal" id="blankModalOut" role="dialog" aria-labelledby="blankModalOut" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">จ่ายเลือดจากคลัง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">

                <div class="form-row">
                    <input type="hidden" name="countstock3" id="countstock3" value="0">
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">ประเภทการจ่าย</label>
                        <select id="bloodstockpaytypeid" class="form-control bloodstockpaytypeid" name="bloodstockpaytypeid">
                        </select>
                    </div>
                    <div id="div_broken_pay" class="form-group col-md-2" style="display: none;">
                        <label for="inputCity">สาเหตุ</label>
                        <select id="bloodbrokenid" class="form-control bloodbrokenid" name="bloodbrokenid">
                        </select>
                        <a href="#" onclick="showCustomBloodBroken()"><small class="form-text text-muted">&nbsp;&nbsp;&nbsp;เพิ่มสาเหตุ</small></a>
                    </div>
                    <div id="div_hn_pay" class="form-group col-md-2" style="display: none;">
                        <label for="inputCity">HN</label>
                        <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                        <input type="text" name="hn_pay_out" autocomplete="off" class="form-control" id="hn_pay_out" placeholder="" onkeyup="setNewHN(this)">
                        <input type="text" hidden>
                    </div>
                    <div id="div_patient_pay" class="form-group col-md-3" style="display: none;">
                        <label for="inputCity">ชื่อผู้ป่วย</label>
                        <input type="text" name="patient_pay_out" autocomplete="off" class="form-control" id="patient_pay_out" placeholder="" readonly>
                        <input type="text" hidden>
                    </div>
                    <div id="div_patient_date" class="form-group col-md-2" style="display: none;">
                        <label for="inputCity">วันที่จ่าย</label>
                        <input type="text" name="patient_pay_date" value="<?php echo dateNowDMY(); ?>" autocomplete="off" class="form-control date1" id="patient_pay_date">
                        <input type="text" hidden>
                    </div>
                    <div id="div_patient_time" class="form-group col-md-2" style="display: none;">
                        <label for="inputCity">เวลาที่จ่าย</label>
                        <input type="text" name="patient_pay_time" value="<?php echo date('H:i'); ?>" autocomplete="off" class="form-control" id="patient_pay_time">
                        <input type="text" hidden>
                    </div>
                    <div id="div_hospital_pay" style="display:none;" class="form-group col-md-3">
                        <label for="inputCity">สาขา</label>
                        <select name="hospital_pay" class="form-control hospital_pay" id="hospital_pay"></select>
                        <a href="#" onclick="showCustomHospital()"><small class="form-text text-muted">&nbsp;&nbsp;&nbsp;เพิ่มสาขา</small></a>
                    </div>

                    <div id="divShowRefundBloodBorrow" class="form-group col-md-1" style="display: none;">
                        <br>
                        <a role="button" href="#" onclick="showBloodRefund()" style="margin-top:8px" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span><i class="fa fa-calendar-o" aria-hidden="true"></i></a>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">ชนิดเลือด</label>
                        <select id="bloodstocktype_pay" class="form-control form-control-sm bloodstocktype_pay" name="bloodstocktype_pay">
                            <option value=""></option>
                            <?php
                            $strSQL = "SELECT  * FROM bloodstock_type ORDER BY bloodstocksort";
                            $objQuery = mysql_query($strSQL);
                            while ($objResuut = mysql_fetch_array($objQuery)) {
                            ?>
                                <option value="<?php echo $objResuut['bloodstocktypeid']; ?>">
                                    <?php echo $objResuut['bloodstocktypename2'] . "|" . $objResuut['bloodstocktypecode'] . "|" . $objResuut['bloodstocktypecodegroup']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCity">หมายเลขถุง</label>
                        <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                        <input type="text" name="bag_number_pay_out" autocomplete="off" class="form-control" id="bag_number_pay_out" placeholder="" onkeyup="scanNumberOut(this)" autofocus>
                        <input type="text" hidden>

                        <input hidden type="text" name="bag_number_pay_out_check" autocomplete="off" class="form-control" id="bag_number_pay_out_check">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCity">RFID</label>
                        <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                        <input type="text" name="rfidscan_pay_out" class="form-control" value="<?php echo $barcode; ?>" id="rfidscan_pay_out" onkeyup="scanRFIDOunt(this.value)" placeholder="">
                    </div>

                    <div class="form-group col-md-3" style="align:right;margin-top:12px">
                        <br>

                        <label class="form-check-label">
                            <input id="printsticker" class="check" type="checkbox" name="printsticker" value="1" checked>
                            พิมพ์แบบฟอร์มอัตโนมัติ
                        </label>
                    </div>

                </div>
                <form role="form" id="formBloodOut" method="POST" action="blood-blank-out-save.php" enctype="multipart/form-data">
                    <div class="table-stock-scroll" style="height:30vh">
                        <table id="list_table_json_out" style="width:1620px">
                            <thead>
                                <tr>
                                    <th class="td-table"><input id="idUnChecked" type="checkbox" onclick="setUnChecked(this.checked)" checked></th>
                                    <th style="width:120px" class="td-table">หมายเลขถุง</th>
                                    <th style="width:120px" class="td-table">RFID</th>
                                    <th style="width:30px" class="td-table">sub</th>
                                    <th style="width:100px" class="td-table">ชนิดเลือด</th>
                                    <th style="width:120px" class="td-table">หมายเลขสาย</th>
                                    <th class="td-table">Bl.Gr.</th>
                                    <th class="td-table">Rh</th>
                                    <th class="td-table" style="width:80px">Volume</th>
                                    <th style="width:120px" class="td-table">วันที่เจาะ</th>
                                    <th style="width:120px" class="td-table">วันที่หมดอายุ</th>
                                    <th class="td-table">Antibody</th>
                                    <th class="td-table">Phenotype</th>
                                    <th style="width:80px" class="td-table">ตู้จัดเก็บ</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>

                    <div class="table-stock-scroll" style="height:25vh">
                        <table id="list_table_json_out_show" style="width:1620px">
                            <thead>
                                <tr>
                                    <th style="width:120px" class="td-table">หมายเลขถุง</th>
                                    <th style="width:120px" class="td-table">RFID</th>
                                    <th style="width:30px" class="td-table">sub</th>
                                    <th style="width:100px" class="td-table">ชนิดเลือด</th>
                                    <th style="width:120px" class="td-table">หมายเลขสาย</th>
                                    <th class="td-table">Bl.Gr.</th>
                                    <th class="td-table">Rh</th>
                                    <th class="td-table" style="width:80px">Volume</th>
                                    <th style="width:120px" class="td-table">วันที่เจาะ</th>
                                    <th style="width:120px" class="td-table">วันที่หมดอายุ</th>
                                    <th class="td-table">Antibody</th>
                                    <th class="td-table">Phenotype</th>
                                </tr>
                            </thead>
                            <tbody id="list_table_json_out_show_body">


                            </tbody>
                        </table>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputEmail4">หมายเหตุ</label>
                        <textarea id="bloodstockpaymainremark" name="bloodstockpaymainremark" class="form-control" rows="1" cols="50"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">

                    <div class="row">
                        <div class="form-group col-md-6 ">
                            <button onclick="showBloodOutRoom()" class="btn btn-success" type="button">
                                <span class="btn-label"><i class="fa fa-list-alt"></i></span>คลังเลือดห้องฉุกเฉิน
                            </button>
                        </div>
                        <div class="form-group col-md-3" id="loader3" class="loader3" style="position: absolute;left: 0px;display:none;">
                            <button onclick="reportPrintGetBlood1()" class="btn btn-light" type="button">
                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์ใบแลกเลือด
                            </button>
                        </div>
                        <div class="form-group col-md-3" id="loader4" class="loader4" style="position: absolute;left: 0px;display:none;">
                            <button onclick="reportPrintGetBlood2()" class="btn btn-light" type="button">
                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์ใบคืนเลือด
                            </button>
                        </div>
                        <div class="form-group col-md-3" id="loader5" class="loader5" style="position: absolute;left: 0px;display:none;">
                            <button onclick="reportPrintGetBlood3()" class="btn btn-light" type="button">
                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์ใบยืมเลือด
                            </button>
                        </div>
                        <div class="form-group col-md-3" id="loader6" class="loader6" style="position: absolute;left: 0px;display:none;">
                            <button onclick="reportPrintGetBlood4()" class="btn btn-light" type="button">
                                <span class="btn-label"><i class="fa fa-print"></i></span>พิมพ์ใบจ่ายเลือดให้ห้องฉุกเฉิน
                            </button>
                        </div>
                        <div class="form-group col-md-6 text-right m-b-0">
                            <button class="btn btn-primary" type="submit">
                                <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                            </button>
                            <button type="button" onclick="closeBloodBlank()" class="btn btn-warning m-l-5">
                                <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                            </button>
                        </div>

                    </div>

                </div>

            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function reportPrintGetBlood1() {
        var id = $("#bloodstockmainid").val();
        printJS({
            printable: localurl + "/report/blood-exchange-with-institutions.php?id=" + id,
            type: 'pdf',
            showModal: true
        });
    }

    function reportPrintGetBlood2() {
        var id = $("#bloodstockmainid").val();
        printJS({
            printable: localurl + "/report/return-blood-to-institutions.php?id=" + id,
            type: 'pdf',
            showModal: true
        });
    }

    function reportPrintGetBlood3() {
        var id = $("#bloodstockmainid").val();
        printJS({
            printable: localurl + "/report/blood-lend-to-institutions.php?id=" + id,
            type: 'pdf',
            showModal: true
        });
    }

    function reportPrintGetBlood4() {
        var id = $("#bloodstockmainid").val();
        printJS({
            printable: localurl + "/report/blood-pay-to-er.php?id=" + id,
            type: 'pdf',
            showModal: true
        });
        // swal('Hello World!');
    }

    function reportPrintGetBlood5() {
        var id = $("#bloodstockmainid").val();
        printJS({
            printable: localurl + "/report/blood-pay-to-er2.php?id=" + id,
            type: 'pdf',
            showModal: true
        });
        // swal('Hello World!');
    }

    function reportPrintGetBlood6() {
        var id = $("#bloodstockmainid").val();
        printJS({
            printable: localurl + "/report/blood-pay-to-er3.php?id=" + id,
            type: 'pdf',
            showModal: true
        });
        // swal('Hello World!');
    }

    function reportPrintGetBlood7() {
        var id = $("#bloodstockmainid").val();
        printJS({
            printable: localurl + "/report/blood-pay-to-er4.php?id=" + id,
            type: 'pdf',
            showModal: true
        });
        // swal('Hello World!');
    }

    function scanNumberOut(self) {
        self.value = numnerPoint(self.value);
    }


    function scanBarcodeHnPay() {
        var hn = document.getElementById('hn_pay_out').value;

        $("#patient_pay_out").val("");

        if (hn.length > 0) {
            spinnershow();

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'api/get-patient-rajavithi.php?hn=' + hn,
                timeout: 1000 * 60,
                success: function(data) {

                    if (data.status) {
                        loadPatient(hn);
                    } else {

                        spinnerhide();

                        console.log(data);

                        if (data.data) {
                            if (data.data.MessageCode == "400") {
                                swal({
                                        title: "ไม่พบข้อมูล",
                                        type: "warning",
                                        showCloseButton: false,
                                        showCancelButton: false,
                                        // dangerMode: true,
                                        confirmButtonClass: "btn-success",
                                        confirmButtonClass: "",
                                        confirmButtonText: "ตกลง",
                                        closeOnConfirm: true
                                    },
                                    function(inputValue) {
                                        if (inputValue) {
                                            document.getElementById('hn_pay_out').value = '';
                                            document.getElementById('hn_pay_out').focus;
                                        }
                                    });
                            } else {
                                checkLoadPatient(hn);
                            }
                        } else {
                            checkLoadPatient(hn);
                        }


                    }


                },
                error: function(data) {

                    spinnerhide();
                    console.log("โหลดข้อมูลจาก RHIS ไม่สำเร็จ");

                    console.log('An error occurred.');
                    console.log(data);

                    checkLoadPatient(hn);

                },
            });



        }

    }

    function checkLoadPatient(patient) {
        swal({
                title: "โหลดข้อมูลจาก RHIS ไม่สำเร็จ",
                type: "warning",
                showCloseButton: false,
                showCancelButton: false,
                // dangerMode: true,
                confirmButtonClass: "btn-success",
                confirmButtonClass: "",
                confirmButtonText: "ตกลง",
                closeOnConfirm: true
            },
            function(inputValue) {
                if (inputValue) {

                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: 'data/patient/patient.php?hn=' + patient,
                        complete: function() {
                            var delayInMilliseconds = 200;
                            setTimeout(function() {
                                spinnerhide();
                            }, delayInMilliseconds);
                        },
                        success: function(data) {
                            if (data.data.length > 0) {

                                swal({
                                        title: "ท่านต้องการใช้ข้อมูลเก่าใน RJ log ก่อนหรือไม่",
                                        type: "warning",
                                        showCloseButton: false,
                                        showCancelButton: true,
                                        // dangerMode: true,
                                        confirmButtonClass: "btn-success",
                                        confirmButtonClass: "",
                                        confirmButtonText: "ตกลง",
                                        closeOnConfirm: true
                                    },
                                    function(inputValue) {
                                        if (inputValue) {
                                            loadPatient(patient);
                                        }
                                    });


                            } else {
                                document.getElementById('hn_pay_out').value = '';
                                document.getElementById('hn_pay_out').focus;
                            }

                        },
                        error: function(data) {

                            console.log('An error occurred.');
                            console.log(data);
                            document.getElementById('hn_pay_out').value = '';
                            document.getElementById('hn_pay_out').focus;
                        },
                    });


                    document.getElementById('patientid').focus;
                }
            });
    }


    function loadPatient(hn) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'data/patient/patient.php?hn=' + hn,
            complete: function() {
                var delayInMilliseconds = 200;
                setTimeout(function() {
                    spinnerhide();
                }, delayInMilliseconds);
            },
            success: function(data) {
                if (data.data.length > 0) {
                    $('#patient_pay_out').val(data.data[0].patientfullname);
                } else {

                    swal({
                        title: "ไม่พบข้อมูล",
                        type: 'warning',
                        type: 'warning',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false
                    }).then(value => {
                        document.getElementById('hn_pay_out').value = '';
                        document.getElementById('hn_pay_out').focus;
                    });

                }

            },
            error: function(data) {
                console.log('An error occurred.');
                console.log(data);
                document.getElementById('hn_pay_out').value = '';
                document.getElementById('hn_pay_out').focus;
            },
        });

    }
</script>