<!-- Modal -->
<input type="hidden" id="bloodstockmainid2" name="bloodstockmainid2">
<div class="modal fade blank-modal" id="blankModal" role="dialog" aria-labelledby="blankModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">รับเลือดเข้าคลัง(จากการรับบริจาค)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                <form id="formBlood">
                    <div class="form-row">
                        <input type="hidden" name="countstock" id="countstock" value="0">
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">ชนิดเลือด</label>
                            <select id="bloodstocktypecross1" class="form-control bloodstocktypecross"
                                name="bloodstocktypecross1">
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputCity">หมายเลขถุง 1</label>
                            <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                            <input type="text" name="bag_number2" autocomplete="off" class="form-control"
                                id="bag_number2"  placeholder="หมายเลขถุง" onkeyup="scanBarcodePoint2(this.value)" autofocus>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputCity">หมายเลขถุง 2</label>
                            <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                            <input type="text" name="bag_number1" autocomplete="off" class="form-control"
                                id="bag_number1" placeholder="หมายเลขถุง" onkeyup="scanBarcodePointBC(this.value)" >
                                <input type="text" hidden />
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputCity">RFID</label>
                            <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                            <input type="text" name="rfidscan" class="form-control" value="<?php echo $barcode; ?>"
                                id="rfidscan" onkeyup="searchRFID(this.value)" placeholder="Scan RFID" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">เจ้าหน้าที่รับเลือดเข้าคลัง</label>
                            <select id="ispickupofficer" class="form-control ispickupofficer" name="ispickupofficer">

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Sub</label>
                            <select onchange="scanBagNumberModal2()" id="sub1" class="form-control sub" name="sub1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-1" style="align:right;margin-top:12px">
                            <br>

                            <label class="form-check-label">
                                <input  id="printsticker" class="check" type="checkbox" name="printsticker" value="1"
                                    onclick="">
                                Print Sticker
                            </label>
                        </div>



                    </div>
                    <div class="table-stock-scroll" style="height:520px">
                        <table id="list_table_json" style="width:1660px">
                            <thead>
                                <tr>
                                    <th class="td-table">No.</th>
                                    <th style="width:200px" class="td-table">ประเภทการรับ</th>
                                    <th style="width:60px" class="td-table">ชนิดเลือด</th>
                                    <th style="width:120px" class="td-table">หมายเลขถุง</th>
                                    <th style="width:40px" class="td-table">Sub</th>
                                    <th style="width:120px" class="td-table">RFID</th>
                                    <th style="width:120px" class="td-table">หมายเลขสาย</th>
                                    <th class="td-table">Bl.Gr.</th>
                                    <th class="td-table">Rh</th>
                                    <th class="td-table">Volume</th>
                                    <th style="width:120px" class="td-table">วันที่เจาะ</th>
                                    <th style="width:120px" class="td-table">วันที่หมดอายุ</th>
                                    <th style="width:160px" class="td-table">ประเภทถุง</th>
                                    <th class="td-table">Antibody</th>
                                    <th class="td-table">Phenotype</th>
                                    <th style="width:140px" class="td-table">เจ้าหน้ารับเลือด</th>
                                    <th style="width:140px" class="td-table">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                    <br/>
                    <div class="form-row" id="divbloodstockfloor1" style="visibility:hidden;" >
                        <div class="form-group col-md-2">
                            <label for="inputCity">ผู้แก้ไข</label>
                            <input type="hidden" id="bloodstockeditusername" name="bloodstockeditusername" class="form-control" value="" >
                            <input readonly type="text" id="bloodstockeditfullname" name="bloodstockeditfullname" class="form-control" value="" >
                        </div>

                        <div class="form-group col-md-2">
                            <label for="inputEmail4">สาเหตุที่แก้ไข</label>
                            <select id="bloodstockremarkeditid" class="form-control bloodstockremarkeditid" name="bloodstockremarkeditid"></select>
                        </div>

                        <div class="form-group col-md-2" id="divbloodstockotherremark1" style="visibility:hidden;">
                            <label for="inputCity">อื่นๆ</label>
                            <input type="text" id="bloodstockotherremark" name="bloodstockotherremark" class="form-control" value="" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                        <div style="display:none;" id="loader" class="loader"></div>
                        <button onclick="save()" class="btn btn-primary" type="submit">
                            <span class="btn-label"><i class="fa fa-save"></i></span>บันทึก
                        </button>
                        <button type="button" onclick="closeBloodBlankModal()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">

    

    var count = 1;
    var deleteArr = [];

    function save() {

        console.log("-------------");
        console.log($("#bloodstockmainid").val());
        if ((document.getElementById("list_table_json").rows.length > 1 || $('#bloodstockmainid2').val()) || $("#bloodstockmainid").val() != "" ) {


            document.getElementById("loader").style.display = "block";
            var frm = $('#formBlood');
            $.ajax({
                type: 'POST',
                url: 'blood-blank-save.php',
                data: {
                    stockcross: JSON.stringify(getTableStock()),
                    deletearr: JSON.stringify(deleteArr),
                    bloodstockmainid: $("#bloodstockmainid2").val(),
                    bloodstockeditusername: $("#bloodstockeditusername").val(),
                    bloodstockremarkeditid: $("#bloodstockremarkeditid").val(),
                    bloodstockotherremark: $("#bloodstockotherremark").val(),
                    
                },
                success: function (data) {
                    if (data) {
                        myAlertTop();
                        loadTable();
                    } else {
                        myAlertTopError();
                    }
                    // closeBloodBlankModal();
                    document.getElementById("loader").style.display = "none";
                    if(!$('#bloodstockmainid2').val())
                    {
                        var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
                        while (body.firstChild) {
                            body.removeChild(body.firstChild);
                        }
                        document.getElementById("rfidscan").focus();
                    }
                    
                },
                error: function (data) {
                    closeBloodBlankModal();
                    document.getElementById("loader").style.display = "none";
                    console.log('An error occurred.');
                    console.log(data);
                    myAlertTopError();
                },
            });



        } else {
            errorSwal('ยังไม่มีการเพิ่มผลิตภัณฑ์');
        }


    }


    function searchBagNumber(bag_number = "") {

        if (bag_number.length != 14) {
            return false;
        }

        if (!$("#bloodstocktypecross1").val()) {
            swal({
                title: 'กรุณาเลือกชนิดเลือดก่อน',
                type: 'warning',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            }).then(value => {
                document.getElementById("bag_number1").value = '';
                document.getElementById("bloodstocktypecross1").focus();
            });
            return false;
        }

        if (!$("#ispickupofficer").val()) {
            swal({
                title: 'กรุณาเลือกเจ้าหน้าที่รับเลือดเข้าคลังก่อน',
                type: 'warning',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            }).then(value => {
                document.getElementById("bag_number1").value = '';
                document.getElementById("ispickupofficer").focus();
            });
            return false;
        }

        var bloodtype = $("#bloodstocktypecross1").val();
        var rfid = '';
        var volume = '';
        var remarkid = 0;
        var remarktext = '';
        var dateexp = '';
        var used = 0;
        $.ajax({
            url: 'data/blood/bloodfindrfidbagnumber.php?bag_number=' + bag_number,
            dataType: 'json',
            type: 'get',
            success: function (data) {

                if (data.data.length == 0) {
                    console.log("****B*****");
                    errorSwal2('ไม่พบผลิตภัณฑ์นี้');
                } else {
                    var value = data.data[0];

                    if (value.bloodstatusid == 4 && value.donation_get_type_id != 3) {
                        errorSwal2('ผลิตภัณฑ์มีการติดเชื้อ');
                    } else if (value.bloodstatusid != 3 && value.donation_get_type_id != 3) {
                        errorSwal2('ผลิตภัณฑ์ยังไม่พร้อมจ่าย');
                    } else {

                        if (bloodtype == 'PRC') {
                            remarkid = value.prcremark;
                            used = value.prcused;
                            volume = value.prc;
                            rfid = value.prcrfid;
                            dateexp = getDMY2(value.prcexp);
                        } else if (bloodtype == 'LPRC') {
                            remarkid = value.lprcremark;
                            used = value.lprcused;
                            volume = value.lprc;
                            rfid = value.lprcrfid;
                            dateexp = getDMY2(value.lprcexp);
                        } else if (bloodtype == 'LDPRC') {
                            remarkid = value.ldprcremark;
                            used = value.ldprcused;
                            volume = value.ldprc;
                            rfid = value.ldprcrfid;
                            dateexp = getDMY2(value.ldprcexp);
                        } else if (bloodtype == 'FFP') {
                            remarkid = value.ffpremark;
                            used = value.ffpused;
                            volume = value.ffp;
                            rfid = value.ffprfid;
                            dateexp = getDMY2(value.ffpexp);
                        } else if (bloodtype == 'PC') {
                            remarkid = value.pcremark;
                            used = value.pcused;
                            volume = value.pc;
                            rfid = value.pcrfid;
                            dateexp = getDMY2(value.pcexp);
                        }else if (bloodtype == 'LPPC') {
                            remarkid = value.lppcremark;
                            used = value.lppcused;
                            volume = value.lppc;
                            rfid = value.lppcrfid;
                            dateexp = getDMY2(value.lppcexp);
                        }else if (bloodtype == 'LPPC_PAS') {
                            remarkid = value.lppc_pasremark;
                            used = value.lppc_pasused;
                            volume = value.lppc_pas;
                            rfid = value.lppc_pasrfid;
                            dateexp = getDMY2(value.lppc_pasexp);
                        } else if (bloodtype == 'SDP') {
                            remarkid = value.sdpremark;
                            used = value.sdpused;
                            volume = value.sdp;
                            rfid = value.sdprfid;
                            dateexp = getDMY2(value.sdpexp);
                        }else if (bloodtype == 'SDP_PAS') {
                            remarkid = value.sdp_pasremark;
                            used = value.sdp_pasused;
                            volume = value.sdp_pas;
                            rfid = value.sdp_pasrfid;
                            dateexp = getDMY2(value.sdp_pasexp);
                        } else if (bloodtype == 'SDR') {
                            remarkid = value.sdrremark;
                            used = value.sdrused;
                            volume = value.sdr;
                            rfid = value.sdrrfid;
                            dateexp = getDMY2(value.sdrexp);
                        } else if (bloodtype == 'WB') {
                            remarkid = value.wbremark;
                            used = value.wbused;
                            volume = value.wb;
                            rfid = value.wbrfid;
                            dateexp = getDMY2(value.wbexp);
                        }

                        console.log("==========");

                        console.log();
                     
                        if (used == 1) {


                            $.ajax({
                                    url: 'data/blood/bloodfindrfidbagnumber-sub.php?bag_number=' + bag_number+'&sub='+$('#sub1').val()+'&bloodtype='+bloodtype,
                                    dataType: 'json',
                                    type: 'get',
                                    success: function (data) {

                                        console.log(data);

                                        if(data.data.length > 0)
                                        {
                                            errorSwal2('ผลิตภัณฑ์นี้ได้รับเข้าคลังแล้ว');
                                            printSticker(value,bloodtype,dateexp,volume);
                                        }else
                                        {
                                            addStockTable1(value,volume,bloodtype,rfid,dateexp);
                                        }

                                    },
                                    error: function (data) {
                                        console.log('An error occurred.');
                                        console.log(data);
                                        
                                        myAlertTopError();
                                    },
                                });


                            
                            return false;
                        } else if (used == 2) {
                            errorSwal2('ผลิตภัณฑ์นี้ถูกจ่ายออกแล้ว');
                            return false;
                        }

                        if (volume == 0 || volume == '') {
                            console.log("****C*****");
                            errorSwal2('ไม่พบผลิตภัณฑ์นี้');
                            return false;
                        }

                        if (remarkid != 0) {
                            getRemark(remarkid)

                            return false;
                        }

                        if (value.bloodrhsceen_cross == 'Rh+' && (bloodtype == 'PC' || bloodtype == 'SDP' ||
                                bloodtype == 'FFP')) {
                            errorSwal2('หมายเลขถุง ' + value.bag_number + ' มีผล Ab Sceen Positive');
                            return false;
                        }

                        if (findTableBagNumber(bloodtype, value.bag_number)) {
                            errorSwal2('เพิ่มผลิตภัณฑ์นี้แล้ว');
                        } else {

                            
                            addStockTable1(value,volume,bloodtype,rfid,dateexp);
                            

                            
                        }


                    }


                }

            },
            error: function (d) {
                /*console.log("error");*/
                alert("404. Please wait until the File is Loaded.");
            }
        });


    }

    function addStockTable1(value,volume,bloodtype,rfid,dateexp)
    {
        printSticker(value,bloodtype,dateexp,volume);

        var arr = [{
                hospital: 0,
                receivingtypeid: value.receivingtypeid,
                bloodstocktypecross: bloodtype,
                bag_number: value.bag_number,
                rfidcode: rfid,
                sub: $('#sub1').val(),
                rubberbandnumber: value.rubberbandnumber,
                bloodgroupcross: value.blood_group,
                bloodrhcross: value.rh,
                bloodgroupcrossconfirm: '',
                bloodrhcrossconfirm: '',
                volume: volume,
                donation_date_cross: getDMY2(value.donation_date),
                donation_exp_cross: dateexp,
                bloodbagtype: value.bag_type_id,
                antibody: value.antibody,
                phenotype: value.phenotype,
                staff: $('#ispickupofficer').val(),
                bloodstockmainid: $('#bloodstockmainid2').val(),
                donateid: value.donateid,
                donorid: value.donorid,
                donorcode: value.donorcode

            }];
                            

        var event_data = '';

        event_data += '<tr>';
        event_data += '<td>' + '1' + '</td>';
        event_data += '<td>' + value.receivingtypename + '</td>';
        event_data += '<td>' + bloodtype + '</td>';
        event_data += '<td>' + value.bag_number + '</td>';
        event_data += '<td>' + arr[0].sub + '</td>';
        event_data += '<td>' + rfid + '</td>';
        event_data += '<td>' + value.rubberbandnumber + '</td>';
        event_data += '<td>' + value.blood_group + '</td>';
        event_data += '<td>' + value.rhname3 + '</td>';
        event_data += '<td>' + volume + '</td>';
        event_data += '<td>' + getDMY2(value.donation_date) + '</td>';
        event_data += '<td>' + dateexp + '</td>';
        event_data += '<td>' + value.bagtypename + '</td>';
        event_data += '<td>' + value.antibody + '</td>';
        event_data += '<td>' + value.phenotype + '</td>';
        event_data += '<td>' + $('#ispickupofficer').text() + '</td>';
        event_data += '<td style="width:100px">';
        event_data +=
            '<button type="button" onclick="deleteRow(this)" class="btn btn-danger m-l-5">';
        event_data +=
            '<span class="btn-label"><i class="fa fa-trash"></i></span>ลบ';
        event_data += '</button>'

        event_data += '</td>';
        event_data += '<td class="td-table" style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '</tr>';
        $("#list_table_json").append(event_data);
        setNo();

        document.getElementById("bag_number1").value = '';
        document.getElementById("bag_number2").value = '';
        document.getElementById("bag_number2").focus();
    }

    function printSticker(value,bloodtype,dateexp,volume)
    {
        var pheno = "" ;

        pheno = pheno + setPheno(value.phenotype,`D+`,`D-`);
        pheno = pheno + setPheno(value.phenotype,`C+`,`C-`);
        pheno = pheno + setPheno(value.phenotype,`E+`,`E-`);
        pheno = pheno + setPheno(value.phenotype,`c+`,`c-`);
        pheno = pheno + setPheno(value.phenotype,`e+`,`e-`);
        pheno = pheno + setPheno(value.phenotype,`M+`,`M-`);
        pheno = pheno + setPheno(value.phenotype,`N+`,`N-`);
        pheno = pheno + setPheno(value.phenotype,`S+`,`S-`);
        pheno = pheno + setPheno(value.phenotype,`s+`,`s-`);
        pheno = pheno + setPheno(value.phenotype,`D+`,`D-`);
        pheno = pheno + setPheno(value.phenotype,`P1+`,`P1-`);
        pheno = pheno + setPheno(value.phenotype,`Mi<sup>a</sup>+`,`Mi<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`K+`,`K-`);
        pheno = pheno + setPheno(value.phenotype,`k+`,`k-`);
        pheno = pheno + setPheno(value.phenotype,`JK<sup>a</sup>+`,`JK<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Fy<sup>a</sup>+`,`Fy<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Fy<sup>b</sup>+`,`Fy<sup>b</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Le<sup>a</sup>+`,`Le<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Le<sup>b</sup>+`,`Le<sup>b</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Di<sup>a</sup>+`,`Di<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Di<sup>b</sup>+`,`Di<sup>b</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Kp<sup>a</sup>+`,`Kp<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Kp<sup>b</sup>+`,`Kp<sup>b</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Js<sup>a</sup>+`,`Js<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Js<sup>b</sup>+`,`Js<sup>b</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Lu<sup>a</sup>+`,`Lu<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Lu<sup>b</sup>+`,`Lu<sup>b</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Co<sup>a</sup>+`,`Co<sup>a</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`Co<sup>b</sup>+`,`Co<sup>b</sup>-`);
        pheno = pheno + setPheno(value.phenotype,`I+`,`I-`);
        pheno = pheno + setPheno(value.phenotype,`i+`,`i-`);
        pheno = pheno + setPheno(value.phenotype,`Xg<sup>a</sup>+`,`Xg<sup>a</sup>-`);


        if(document.getElementById("printsticker").checked)
        {
            var reportname = '';
            if(bloodtype == "SDP" || bloodtype == "SDP_PAS")
            {
                reportname = "blood-sticker-sdp.php";
            }else if(bloodtype == "WB" || bloodtype == "SDR" || bloodtype == "PRC" || bloodtype == "LPRC" || bloodtype == "LDPRC")
            {
                reportname = "blood-sticker-prc-lprc.php";
            }else
            {
                reportname = "blood-sticker.php";
            }


                printJS({
                    printable: localurl+"/report/"+reportname+"?bloodgroup="+value.blood_group +
                            "&rh="+value.rhname3+"&bloodtype="+bloodtype+
                            "&donorcode="+value.donorcode+"&pheno="+pheno+
                            "&volume="+volume+"&bag_number="+value.bag_number+
                            "&datestart="+value.donation_date+"&dateexp="+dmyToymd(dateexp),
                    type: 'pdf',
                    showModal: true
                });
        }
    }

    function setPheno(v,pos,neg)
    {
        v = v.replace( /(^.*\[|\].*$)/g, '' );
        if(v.search(pos) >= 0)
        {
            return "+";
        }else if(v.search(neg)  >= 0)
        {
            return "-";
        }else
        {
            return "0";
        }
    }

    function searchRFID(keyword = "") {
        if (!$("#ispickupofficer").val()) {
            swal({
                title: 'กรุณาเลือกเจ้าหน้าที่รับเลือดเข้าคลังก่อน',
                type: 'warning',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            }).then(value => {
                document.getElementById("rfidscan").value = '';
                document.getElementById("ispickupofficer").focus();
            });
            return false;
        }
        var rfid = '';
        var volume = '';
        var remarkid = 0;
        var remarktext = '';
        $.ajax({
            url: 'data/blood/bloodfindrfid.php?keyword=' + keyword,
            dataType: 'json',
            type: 'get',
            async: false,
            success: function (data) {

                if (data.data.length == 0) {
                    console.log("****A*****");
                    errorSwal('ไม่พบผลิตภัณฑ์นี้');
                } else {
                    var value = data.data[0];

                    if (value.bloodstatusid == 4 && value.donation_get_type_id != 3) {
                        errorSwal('ผลิตภัณฑ์มีการติดเชื้อ' );
                    } else if (value.bloodstatusid != 3 && value.donation_get_type_id != 3) {
                        errorSwal('ผลิตภัณฑ์ยังไม่พร้อมจ่าย');
                    } else {
                        var bloodtype = '';
                        var dateexp = '';
                        if (value.prcrfid == keyword) {
                            bloodtype = 'PRC';
                            remarkid = value.prcremark;
                            volume = value.prc;
                            rfid = value.prcrfid;
                            dateexp = getDMY2(value.prcexp);
                        } else if (value.lprcrfid == keyword) {
                            bloodtype = 'LPRC';
                            remarkid = value.lprcremark;
                            volume = value.lprc;
                            rfid = value.lprcrfid;
                            dateexp = getDMY2(value.lprcexp);
                        } else if (value.ldprcrfid == keyword) {
                            bloodtype = 'LDPRC';
                            remarkid = value.ldprcremark;
                            volume = value.ldprc;
                            rfid = value.ldprcrfid;
                            dateexp = getDMY2(value.ldprcexp);
                        } else if (value.ffprfid == keyword) {
                            bloodtype = 'FFP';
                            remarkid = value.ffpremark;
                            volume = value.ffp;
                            rfid = value.ffprfid;
                            dateexp = getDMY2(value.ffpexp);
                        } else if (value.pcrfid == keyword) {
                            bloodtype = 'PC';
                            remarkid = value.pcremark;
                            volume = value.pc;
                            rfid = value.pcrfid;
                            dateexp = getDMY2(value.pcexp);
                        } else if (value.lppcrfid == keyword) {
                            bloodtype = 'LPPC';
                            remarkid = value.lppcremark;
                            volume = value.lppc;
                            rfid = value.lppcrfid;
                            dateexp = getDMY2(value.lppcexp);
                        } else if (value.lppc_pasrfid == keyword) {
                            bloodtype = 'LPPC_PAS';
                            remarkid = value.lppc_pasremark;
                            volume = value.lppc_pas;
                            rfid = value.lppc_pasrfid;
                            dateexp = getDMY2(value.lppc_pasexp);
                        }  else if (value.sdp_pasrfid == keyword) {
                            bloodtype = 'SDP_PAS';
                            remarkid = value.sdp_pasremark;
                            volume = value.sdp_pas;
                            rfid = value.sdp_pasrfid;
                            dateexp = getDMY2(value.sdp_pasexp);
                        } else if (value.sdrrfid == keyword) {
                            bloodtype = 'SDR';
                            remarkid = value.sdrremark;
                            volume = value.sdr;
                            rfid = value.sdrrfid;
                            dateexp = getDMY2(value.sdrexp);
                        } else if (value.wbrfid == keyword) {
                            bloodtype = 'WB';
                            remarkid = value.wbremark;
                            volume = value.wb;
                            rfid = value.wbrfid;
                            dateexp = getDMY2(value.wbexp);
                        }

                        if (remarkid != 0) {
                            getRemark(remarkid)
                        }

                        if ((value.prcused == 1 && value.prcrfid == keyword) ||
                            (value.lprcused == 1 && value.lprcrfid == keyword) ||
                            (value.ldprcused == 1 && value.ldprcrfid == keyword) ||
                            (value.ffpused == 1 && value.ffprfid == keyword) ||
                            (value.pcused == 1 && value.pcrfid == keyword) ||
                            (value.lppcused == 1 && value.lppcrfid == keyword) ||
                            (value.lppc_pasused == 1 && value.lppc_pasrfid == keyword) ||
                            (value.sdpused == 1 && value.sdprfid == keyword) ||
                            (value.sdp_pasused == 1 && value.sdp_pasrfid == keyword) ||
                            (value.sdrused == 1 && value.sdrrfid == keyword) ||
                            (value.wbused == 1 && value.wbrfid == keyword)
                        ) {
                            errorSwal2('ผลิตภัณฑ์นี้ได้รับเข้าคลังแล้ว');
                            printSticker(value,bloodtype,dateexp,volume);
                        } else {

                            if (findTable(keyword)) {
                                errorSwal('เพิ่มผลิตภัณฑ์นี้แล้ว');
                            } else {

                                if (value.bloodrhsceen_cross == 'Rh+' && (bloodtype == 'PC' || bloodtype ==
                                        'SDP' || bloodtype == 'FFP' )) {
                                    errorSwal('หมายเลขถุง ' + value.bag_number + ' มีผล Ab Sceen Positive');
                                    return false;
                                }

                                var arr = [{
                                    hospital: 0,
                                    receivingtypeid: value.receivingtypeid,
                                    bloodstocktypecross: bloodtype,
                                    bag_number: value.bag_number,
                                    rfidcode: rfid,
                                    sub: $('#sub1').val(),
                                    rubberbandnumber: value.rubberbandnumber,
                                    bloodgroupcross: value.blood_group,
                                    bloodrhcross: value.rh,
                                    bloodgroupcrossconfirm: '',
                                    bloodrhcrossconfirm: '',
                                    volume: volume,
                                    donation_date_cross: getDMY2(value.donation_date),
                                    donation_exp_cross: dateexp,
                                    bloodbagtype: value.bag_type_id,
                                    antibody: value.antibody,
                                    phenotype: value.phenotype,
                                    staff: $('#ispickupofficer').val(),
                                    bloodstockmainid: $('#bloodstockmainid2').val(),
                                    donateid: value.donateid,
                                    donorid: value.donorid

                                }];

                                var event_data = '';

                                event_data += '<tr>';
                                event_data += '<td>' + '1' + '</td>';
                                event_data += '<td>' + value.receivingtypename + '</td>';
                                event_data += '<td>' + bloodtype + '</td>';
                                event_data += '<td>' + value.bag_number + '</td>';
                                event_data += '<td>' + arr[0].sub + '</td>';
                                event_data += '<td>' + rfid + '</td>';
                                event_data += '<td>' + value.rubberbandnumber + '</td>';
                                event_data += '<td>' + value.blood_group + '</td>';
                                event_data += '<td>' + value.rhname3 + '</td>';
                                event_data += '<td>' + volume + '</td>';
                                event_data += '<td>' + getDMY2(value.donation_date) + '</td>';
                                event_data += '<td>' + dateexp + '</td>';
                                event_data += '<td>' + value.bagtypename + '</td>';
                                event_data += '<td>' + value.antibody + '</td>';
                                event_data += '<td>' + value.phenotype + '</td>';
                                event_data += '<td>' + $('#ispickupofficer').text() + '</td>';
                                event_data += '<td style="width:100px">';
                                event_data +=
                                    '<button type="button" onclick="deleteRow(this)" class="btn btn-danger m-l-5">';
                                event_data +=
                                    '<span class="btn-label"><i class="fa fa-trash"></i></span>ลบ';
                                event_data += '</button>'

                                event_data += '</td>';
                                event_data += '<td class="td-table" style="display:none;" >';
                                event_data += JSON.stringify(arr);
                                event_data += '</td>';
                                event_data += '</tr>';
                                $("#list_table_json").append(event_data);
                                setNo();
                                count++;
                                document.getElementById("rfidscan").value = '';
                                document.getElementById("countstock").value = count;
                                document.getElementById("rfidscan").focus();
                            }

                        }
                    }


                }

            },
            error: function (d) {
                /*console.log("error");*/
                alert("404. Please wait until the File is Loaded.");
            }
        });


    }

    function addBloodTableDonate(im, dat) {
        var arr = [{
            hospital: im.hospitalid,
            receivingtypeid: im.receivingtypeid,
            bloodstocktypecross: im.bloodtype,
            bag_number: im.bag_number,
            rfidcode: im.bloodstockrfid,
            sub: im.sub,
            rubberbandnumber: im.rubberbandnumber,
            bloodgroupcross: im.bloodgroup,
            bloodrhcross: im.bloodrh,
            bloodgroupcrossconfirm: im.bloodgroupconfirm,
            bloodrhcrossconfirm: im.bloodrhconfirm,
            volume: im.volume,
            donation_date_cross: getDMY2(im.bloodstart),
            donation_exp_cross: getDMY2(im.bloodexp),
            bloodbagtype: im.bagtypeid,
            antibody: im.antibody,
            phenotype: im.phenotype,
            staff: dat.pickupofficer,
            bloodstockmainid: $('#bloodstockmainid2').val(),
            donateid: im.donateid,
            donorid: im.donorid

        }];

        var event_data = '';

        event_data += '<tr>';
        event_data += '<td>' + '1' + '</td>';
        event_data += '<td>' + im.receivingtypename + '</td>';
        event_data += '<td>' + im.bloodtype + '</td>';
        event_data += '<td>' + im.bag_number + '</td>';
        event_data += '<td>' + im.bloodstockrfid + '</td>';
        event_data += '<td>' + im.rubberbandnumber + '</td>';
        event_data += '<td>' + im.bloodgroup + '</td>';
        event_data += '<td>' + im.rhname3 + '</td>';
        event_data += '<td>' + im.volume + '</td>';
        event_data += '<td>' + getDMY2(im.bloodstart) + '</td>';
        event_data += '<td>' + getDMY2(im.bloodexp) + '</td>';
        event_data += '<td>' + im.bagtypename + '</td>';
        event_data += '<td>' + im.antibody + '</td>';
        event_data += '<td>' + im.phenotype + '</td>';
        event_data += '<td>' + dat.fullname + '</td>';
        event_data += '<td style="width:100px">';
        event_data +=
            '<button type="button" onclick="deleteRow(this)" class="btn btn-danger m-l-5">';
        event_data +=
            '<span class="btn-label"><i class="fa fa-trash"></i></span>ลบ';
        event_data += '</button>'

        event_data += '</td>';
        event_data += '<td class="td-table" style="display:none;" >';
        event_data += JSON.stringify(arr);
        event_data += '</td>';
        event_data += '</tr>';
        $("#list_table_json").append(event_data);
        setNo();
        count++;
        document.getElementById("rfidscan").value = '';
        document.getElementById("countstock").value = count;
        document.getElementById("rfidscan").focus();


    }



    function getRemark(id) {
    
        $.ajax({
            url: 'data/masterdata/bloodremark.php?id=' + id,
            dataType: 'json',
            type: 'get',
            success: function (data) {
                if (data.data.length > 0)
                    errorSwal2('ผลิตภัณฑ์นี้ไม่พร้อมจ่ายเนื่องจาก' + data.data[0].bloodremarktext);
                    return false;
            }
        });
    }

    function errorSwal($msg = "") {
        swal({
            title: $msg,
            // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            document.getElementById("rfidscan").value = '';
            document.getElementById("rfidscan").focus();
        });
        return false;

    }

    function errorSwal2($msg = "") {
        swal({
            title: $msg,
            // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            document.getElementById("bag_number1").value = '';
            document.getElementById("bag_number2").value = '';
            document.getElementById("bag_number2").focus();
        });
        return false;

    }

    function findTable(v) {
        var result = false;
        var index = -1;
        var rows = document.getElementById("list_table_json").rows;
        for (var i = 1; i < rows.length; i++) {

            if (rows[i].cells[4].innerHTML == v) {
                result = true;
                break;
            }
        }
        return result;
    }

    function findTableBagNumber(type, number) {

        var result = false;
        var index = -1;
        var rows = document.getElementById("list_table_json").rows;
        for (var i = 1; i < rows.length; i++) {

            if (rows[i].cells[2].innerHTML == type && rows[i].cells[3].innerHTML == number) {
                result = true;
                break;
            }
        }
        return result;
    }

    function getTableStock() {
        var arr = [];
        var rows = document.getElementById("list_table_json").rows;
        for (var i = 1; i < rows.length; i++) {
            arr.push(rows[i].cells[17].innerHTML);
        }

        return arr;

    }


    function setNo() {

        var rows = document.getElementById("list_table_json").rows;
        for (var i = 1; i < rows.length; i++) {
            rows[i].cells[0].innerHTML = i;
        }
    }



    function closeBloodBlankModal() {
        $('#blankModal').modal('hide');
    }

    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        deleteArr.push(row.cells[16].innerHTML);

        row.parentNode.removeChild(row);
        setNo();
    }

    function scanBarcodePoint2(bag_number = "") {
      
        var bag_number_new = numnerPoint(bag_number);
        $('#bag_number2').val(bag_number_new);

    }

    function scanBarcodePointBC(bag_number = "") {
      
        var bag_number_new = numnerPointBC(bag_number);
        $('#bag_number1').val(bag_number_new);

    }

    function scanBarcode1() {
        var bag_number_bc = $('#bag_number1').val().trim();

        var bag_number = "";
        if(scanBarcodeBC(bag_number_bc))
        {
            bag_number = replaceBC(bag_number_bc);
        }else
        {
            return false;
        }

        var bag_number2 = $('#bag_number2').val().trim();

        if(bag_number != bag_number2 && bag_number != "" && bag_number != "")
        {
            errorSwal2('หมายเลขถุงไม่ตรงกัน');
            return false;
        }

        $('#bag_number1').val(bag_number_bc);
        if (bag_number.length == 14) {
            searchBagNumber(bag_number);
        }


    }

    function scanBarcodeBC(bag_number="")
    {
        var status = false;
        if(bag_number.length == 16)
        if(bag_number.substring(0, 1) == "B" && bag_number.substring(15, 16) == "C")
        {
            status = true;
        }

        if(!status)
        {
            swal({
                title: "รูปแบบหมายเลขถุง 2 ไม่ถูกต้อง",
                type: 'warning',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            }).then(value => {
                document.getElementById("bag_number1").value = '';
                document.getElementById("bag_number1").focus();
            });
        }

        return status ;
    }

    function replaceBC(bag_number="")
    {
        var value = false;
        if(bag_number.length == 16)
        if(bag_number.substring(0, 1) == "B" && bag_number.substring(15, 16) == "C")
        {
            bag_number = bag_number.replace("B","");
            value = bag_number.replace("C","");
        }

        return value ;
    }
</script>