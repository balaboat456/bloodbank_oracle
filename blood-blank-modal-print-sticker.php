<!-- Modal -->

<div class="modal fade blank-modal" id="stickerModal" role="dialog" aria-labelledby="stickerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Print Sticker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalbody" class="modal-body">
                
                <div class="form-row">
                    <input type="hidden" name="countstock" id="countstock" value="0">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">ชนิดเลือด</label>
                        <select id="bloodstocktypecross1" class="form-control form-control-sm bloodstocktypecross" name="bloodstocktypecross1">
                            <option value=""></option>
                            <?php
                            $strSQL = "SELECT  * FROM bloodstock_type ORDER BY bloodstocksort";
                            $objQuery = mysql_query($strSQL);
                            while ($objResuut = mysql_fetch_array($objQuery)) {
                            ?>
                                <option  value="<?php echo $objResuut['bloodstocktypeid']; ?>">
                                    <?php echo $objResuut['bloodstocktypename2']."|".$objResuut['bloodstocktypecode']. "|" . $objResuut['bloodstocktypecodegroup']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputCity">หมายเลขถุง</label>
                        <i class="fa fa-barcode fa-lg" aria-hidden="true"></i>
                        <input type="text" name="bag_number1" autocomplete="off" class="form-control" id="bag_number1"
                           placeholder="" onkeyup="scanBarcodeFormat()" autofocus>
                    </div>



                </div>

            </div>
            <div class="modal-footer">
                <div class="save-bottom">
                    <div class="form-group text-right m-b-0">

                    <div class="m-4 footer-printer-setting">
                        <div class="row">
                            <div class="form-check-label">
                                <div class="input-group">
                                    <!-- <span class="input-group-text input-group-text-0">
                                        <input onclick="setDefaultRadioPrinter('printer_p')" type="radio" id="printer_p" name="printer" class="">
                                    </span>
                                    <span class="input-group-text input-group-text-0">Preview</span>
                                    &nbsp;&nbsp; -->
                                    <span class="input-group-text input-group-text-0">
                                        <input onclick="setDefaultRadioPrinter('printer_a')" type="radio" id="printer_a"  name="printer" class="" checked>
                                    </span>
                                    <span class="input-group-text input-group-text-0">Auto Print</span>
                                    <select id="printernames" name="printernames" onchange="setDefaultPrinter(this.value)"  class="form-control" style="width: 250px;">
                                    </select>
                                    <span class="input-group-text input-group-text-0" style="background: lightblue;" onclick="showPrinterSettingModal()">
                                    <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;
                                        จัดการเครื่องปริ้น
                                        
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                        <button type="button" onclick="closePrint()" class="btn btn-warning m-l-5">
                            <span class="btn-label"><i class="fa fa-remove"></i></span>ปิด
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">

    
    function setPrintName()
    {
        document.getElementById("printernames").innerHTML = "";
        var printers = getPrintterSetting();

        var select = document.getElementById("printernames");
        if(printers)
        printers.forEach((entry) => {
            var option = document.createElement("option");
            option.text = entry[0].printername+" ["+entry[0].clientname+"]";
            option.value = entry[0].printername+"|"+entry[0].clientname;
            
            select.appendChild(option);

            if(getDefaultPrinter() == option.value)
            select.value = getDefaultPrinter();
        });
        
    }
    setPrintName();


    function setPrintRadio()
    {
        var printers = getDefaultRadioPrinter();

        if(printers == 'printer_p')
        {
            document.getElementById("printer_p").checked = true;
        }else
        {
            document.getElementById("printer_a").checked = true;
        }
        
    }
    // setPrintRadio();


    function getPrintterSetting()
    {
        return JSON.parse(localStorage.getItem("printers"));
    }

    function setDefaultPrinter(defaulprinter_sticker_number)
    {
        localStorage.setItem("defaulprinter_sticker_number", defaulprinter_sticker_number);
    }

    function getDefaultPrinter()
    {
        return localStorage.getItem("defaulprinter_sticker_number");
    }

    function setDefaultRadioPrinter(defaulradioprinter_sticker_number)
    {
        localStorage.setItem("defaulradioprinter_sticker_number", defaulradioprinter_sticker_number);
    }

    function getDefaultRadioPrinter()
    {
        return localStorage.getItem("defaulradioprinter_sticker_number");
    }


    function showPrint() {
        $("#stickerModal").modal("show");

    }

    function closePrint() {
        $("#stickerModal").modal("hide");

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


        var bloodtype = $("#bloodstocktypecross1").val();
        var rfid = '';
        var volume = '';
        var remarkid = 0;
        var remarktext = '';
        var dateexp = '';
        var used = 0;
        spinnershow();
        $.ajax({
            url: 'data/blood/bloodfindrfidbagnumber.php?bag_number=' + bag_number,
            dataType: 'json',
            type: 'get',
            complete: function () {
                var delayInMilliseconds = 200;
                setTimeout(function () {
                    spinnerhide();
                }, delayInMilliseconds);
            },
            success: function (data) {
                

                if (data.data.length == 0) {
                    errorSwal2('ไม่พบผลิตภัณฑ์นี้');
                } else {

                    var value =  JSON.parse(JSON.stringify(data.data[0]).replace(/null/g, '""').replace(/"\"\""/g, '""'));
                    var isused = "";
                    if (bloodtype == 'PRC') {
                            remarkid = value.prcremark;
                            used = value.prcused;
                            volume = value.prc;
                            rfid = value.prcrfid;
                            dateexp = getDMY2(value.prcexp);
                            bloodtype_code = 103;
                            isused = value.IS_PRC;
                        } else if (bloodtype == 'LPRC') {
                            remarkid = value.lprcremark;
                            used = value.lprcused;
                            volume = value.lprc;
                            rfid = value.lprcrfid;
                            dateexp = getDMY2(value.lprcexp);
                            bloodtype_code = 120;
                            isused = value.IS_LPRC;
                        } else if (bloodtype == 'LDPRC') {
                            remarkid = value.ldprcremark;
                            used = value.ldprcused;
                            volume = value.ldprc;
                            rfid = value.ldprcrfid;
                            dateexp = getDMY2(value.ldprcexp);
                            bloodtype_code = 106;
                            isused = value.IS_LDPRC;
                        } else if (bloodtype == 'FFP') {
                            remarkid = value.ffpremark;
                            used = value.ffp;
                            volume = value.ffp;
                            rfid = value.ffprfid;
                            dateexp = getDMY2(value.ffpexp);
                            bloodtype_code = 300;
                            isused = value.IS_FFP;
                        } else if (bloodtype == 'PC') {
                            remarkid = value.pcremark;
                            used = value.pcused;
                            volume = value.pc;
                            rfid = value.pcrfid;
                            dateexp = getDMY2(value.pcexp);
                            bloodtype_code = 200;
                            isused = value.IS_PC;
                        } else if (bloodtype == 'LPPC') {
                            remarkid = value.lppcremark;
                            used = value.lppcused;
                            volume = value.lppc;
                            rfid = value.lppcrfid;
                            dateexp = getDMY2(value.lppcexp);
                            bloodtype_code = 240;
                            isused = value.IS_LPPC;
                        } else if (bloodtype == 'LPPC_PAS') {
                            remarkid = value.lppc_pasremark;
                            used = value.lppc_pasused;
                            volume = value.lppc_pas;
                            rfid = value.lppc_pasrfid;
                            dateexp = getDMY2(value.lppc_pasexp);
                            bloodtype_code = 240;
                            isused = value.IS_LPPC_PAS;
                        } else if (bloodtype == 'SDP') {
                            remarkid = value.sdpremark;
                            used = value.sdpused;
                            volume = value.sdp;
                            rfid = value.sdprfid;
                            dateexp = getDMY2(value.sdpexp);
                            bloodtype_code = 223;
                            isused = value.IS_SDP;
                        } else if (bloodtype == 'SDP_PAS') {
                            remarkid = value.sdp_pasremark;
                            used = value.sdp_pasused;
                            volume = value.sdp_pas;
                            rfid = value.sdp_pasrfid;
                            bloodtype_code = 228;
                            dateexp = getDMY2(value.sdp_pasexp);
                            isused = value.IS_SDP_PAS;
                        }else if (bloodtype == 'SDR') {
                            remarkid = value.sdrremark;
                            used = value.sdrused;
                            volume = value.sdr;
                            rfid = value.sdrrfid;
                            bloodtype_code = 224;
                            dateexp = getDMY2(value.sdrexp);
                            isused = value.IS_SDR;
                        } else if (bloodtype == 'WB') {
                            remarkid = value.wbremark;
                            used = value.wbused;
                            volume = value.wb;
                            rfid = value.wbrfid;
                            dateexp = getDMY2(value.wbexp);
                            bloodtype_code = 100;
                            isused = value.IS_WB;
                        }else if (bloodtype == 'CRP') {
                            remarkid = value.crpremark;
                            used = value.crpused;
                            volume = value.crp;
                            rfid = value.crprfid;
                            dateexp = getDMY2(value.crpexp);
                            bloodtype_code = 100;
                            isused = value.IS_CRP;
                        }else if (bloodtype == 'CRYO') {
                            remarkid = value.cryoremark;
                            used = value.cryoused;
                            volume = value.cryo;
                            rfid = value.cryorfid;
                            dateexp = getDMY2(value.cryoexp);
                            bloodtype_code = 100;
                            isused = value.IS_CRYO;
                        }
                        var datestart = getDMY2(value.donation_date); 
                        
                        // dateexpyy = dateexp.substr(-4,4);
                        // dateexpmm = dateexp.substr(3,2);
                        // dateexpdd = dateexp.substr(0,2);

                        // expmon = dateexpyy+'-'+dateexpmm+'-'+dateexpdd;
                        // alert(dateexp);

                        console.log(data.data[0]);
                        console.log("============="+volume);
                        console.log(remarkid);

                        if(isused != 1)
                        {
                            errorSwal3('ชนิดเลือดไม่ถูกต้อง');
                            return false;
                        }else if(remarkid != 20 && remarkid != 0 && remarkid !='')
                        {

                            bloodRemark().then(
                                function success(bloodremarkdata) {
                                    var mgsText = 'พบปัญหาเกี่ยวกับหมายเลขถุงนี้';
                                    $.each(bloodremarkdata.data, function(inxr, vr) {
                                        if(vr.bloodremarkid ==  remarkid)
                                        {
                                            mgsText = vr.bloodremarktext;
                                        }
                                    });
                                    errorSwal2(mgsText);
                                    
                                });

                            
                            return false;
                        }
                        else if((data.data[0].bloodstatusid == 1 || data.data[0].bloodstatusid == 2 || data.data[0].bloodstatusid == 5 || data.data[0].bloodstatusid == 6 || data.data[0].bloodstatusid == 7)  && bloodtype != "FFP")
                        {
                            errorSwal2('ถุงเลือดนี้ยังไม่ได้ Import File');
                            return false;
                        }
                        else if(data.data[0].bloodstatusid != 3 && bloodtype != "FFP")
                        {
                            errorSwal2('ถุงเลือดนี้ไม่พร้อมจ่าย');
                            return false;
                        }
                        else if(volume == '' || volume == null)
                        {
                            errorSwal2('ถุงเลือดนี้ยังไม่ได้ระบุ Volume');
                            return false;
                        }else if(
                                    data.data[0].tpharpr == "+" ||
                                    data.data[0].hbsag == "+" ||
                                    data.data[0].hivagab == "+" ||
                                    data.data[0].hcvab == "+" ||
                                    data.data[0].hbvdna == "+" ||
                                    data.data[0].hcvrna == "+" ||
                                    data.data[0].hivrna == "+"
                                )
                        {
                            errorSwal2('ถุงเลือดนี้มีการติดเชื้อ');
                            return false;
                        }

                        var sdpprodyltyield = "";
                        var sdpprodyltyield1 = data.data[0].sdpprodyltyield1;
                        var sdpprodyltyield2 = data.data[0].sdpprodyltyield2;
                        var sdpprodunit = "";
                        var sdpprodunit1 = data.data[0].sdpprodunit1;
                        var sdpprodunit2 = data.data[0].sdpprodunit2;
                        var sdpresultvolume = data.data[0].sdpresultvolume;
                        var sdpprodvolume1 = data.data[0].sdpprodvolume1;
                        var sdpprodvolume2 = data.data[0].sdpprodvolume2;
                        

                        if(bloodtype == "SDP" || bloodtype == "SDP_PAS")
                        {
                            if(sdpresultvolume == "" || sdpresultvolume == "1" || sdpresultvolume == "0")
                            {
                                sdpprodunit = sdpprodunit1;
                                sdpprodyltyield = sdpprodyltyield1;

                                volume = sdpprodvolume1;
                            }else
                            {
                                sdpprodyltyield = sdpprodyltyield2;
                                sdpprodunit = sdpprodunit2;

                                volume = sdpprodvolume2;
                            }
                        }
                        
                    
                        var pheno = "" ;

                        console.log(value.phenotype);

                        pheno = pheno + setPheno(value.phenotype,'D(+)','D(-)');
                        pheno = pheno + setPheno(value.phenotype,'C(+)','C(-)');
                        pheno = pheno + setPheno(value.phenotype,'E(+)','E(-)');
                        pheno = pheno + setPheno(value.phenotype,'c(+)','c(-)');
                        pheno = pheno + setPheno(value.phenotype,'e(+)','e(-)');
                        pheno = pheno + setPheno(value.phenotype,'M(+)','M(-)');
                        pheno = pheno + setPheno(value.phenotype,'N(+)','N(-)');
                        pheno = pheno + setPheno(value.phenotype,'S(+)','S(-)');
                        pheno = pheno + setPheno(value.phenotype,'s(+)','s(-)');
                        pheno = pheno + setPheno(value.phenotype,'P1(+)','P1(-)');
                        pheno = pheno + setPheno(value.phenotype,'Mi(a+)','Mi(a-)');
                        pheno = pheno + setPheno(value.phenotype,'K(+)','K(-)');
                        pheno = pheno + setPheno(value.phenotype,'k(+)','k(-)');
                        pheno = pheno + setPheno(value.phenotype,'Jk(a+)','Jk(a-)');
                        pheno = pheno + setPheno(value.phenotype,'Jk(b+)','Jk(b-)');
                        pheno = pheno + setPheno(value.phenotype,'Fy(a+)','Fy(a-)');
                        pheno = pheno + setPheno(value.phenotype,'Fy(b+)','Fy(b-)');
                        pheno = pheno + setPheno(value.phenotype,'Le(a+)','Le(a-)');
                        pheno = pheno + setPheno(value.phenotype,'Le(b+)','Le(b-)');
                        pheno = pheno + setPheno(value.phenotype,'Di(a+)','Di(a-)');
                        pheno = pheno + setPheno(value.phenotype,'Di(b+)','Di(b-)');
                        pheno = pheno + setPheno(value.phenotype,'Kp(a+)','Kp(a-)');
                        pheno = pheno + setPheno(value.phenotype,'Kp(b+)','Kp(b-)');
                        pheno = pheno + setPheno(value.phenotype,'Js(a+)','Js(a-)');
                        pheno = pheno + setPheno(value.phenotype,'Js(b+)','Js(b-)');
                        pheno = pheno + setPheno(value.phenotype,'Lu(a+)','Lu(a-)');
                        pheno = pheno + setPheno(value.phenotype,'Lu(b+)','Lu(b-)');
                        pheno = pheno + setPheno(value.phenotype,'Co(a+)','Co(a-)');
                        pheno = pheno + setPheno(value.phenotype,'Co(b+)','Co(b-)');
                        pheno = pheno + setPheno(value.phenotype,'I(+)','I(-)');
                        pheno = pheno + setPheno(value.phenotype,'i(+)','i(-)');
                        pheno = pheno + setPheno(value.phenotype,'Xg(a+)','Xg(a-)');
                      

                        console.log(pheno);

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
                            var printer_url = localurl+"/report/"+reportname+"?bloodgroup="+value.blood_group +
                                                "&rh="+value.rhname3+"&bloodtype="+bloodtype+"&pheno="+pheno+
                                                "&volume="+volume+"&bag_number="+value.bag_number+"&donorcode="+value.donorcode+
                                                "&datestart="+dmyToymd(datestart)+"&dateexp="+dmyToymd(dateexp)+
                                                "&sdpprodyltyield="+sdpprodyltyield+"&sdpprodunit="+sdpprodunit +
                                                "&sdpresultvolume="+sdpresultvolume
                            // if(document.getElementById("printer_a").checked)
                            // {

                                

                                var n = Date.now();
                                var filenameram = "stickerbag"+n+makeid(5);

                                var printers = getPrintterSetting();

                                var printernames = $("#printernames").val();
                                var printernamesArr = printernames.split("|");

                                var dataReport = {
                                        "Printtername": printernamesArr[0],
                                        "Filename": filenameram,
                                        "Fileurl": printer_url,
                                        "username": printernamesArr[1]
                                };

                                spinnershow();

                                console.log('Printing Sticker ใบที่ 1');

                                $.ajax({
                                    type: 'POST',
                                    url: 'report/printering-auto.php',
                                    data: dataReport,
                                    dataType: 'json',
                                    complete: function() {
                                        var delayInMilliseconds = 200;
                                        setTimeout(function() {
                                            spinnerhide();
                                        }, delayInMilliseconds);
                                    },
                                    success: function(data) {
                                        console.log(data);
                                    },
                                    error: function(data) {
                                        console.log('An error occurred.');
                                        console.log(data);
                                        myAlertTopError();
                                    },
                                });

                                if(parseInt(sdpresultvolume) > 1 && (bloodtype == "SDP" || bloodtype == "SDP_PAS"))
                                {

                                    
                                    setTimeout(function() {
                                        console.log('Printing Sticker ใบที่ 2');
                                        $.ajax({
                                            type: 'POST',
                                            url: 'report/printering-auto.php',
                                            data: dataReport,
                                            dataType: 'json',
                                            complete: function() {
                                                var delayInMilliseconds = 200;
                                                setTimeout(function() {
                                                    spinnerhide();
                                                }, delayInMilliseconds);
                                            },
                                            success: function(data) {
                                                console.log(data);
                                            },
                                            error: function(data) {
                                                console.log('An error occurred.');
                                                console.log(data);
                                                myAlertTopError();
                                            },
                                        });
                                    }, 1000);



                                    
                                }

                                if(parseInt(sdpresultvolume) > 2 && (bloodtype == "SDP" || bloodtype == "SDP_PAS"))
                                {

                                    setTimeout(function() {
                                        console.log('Printing Sticker ใบที่ 3');
                                        $.ajax({
                                            type: 'POST',
                                            url: 'report/printering-auto.php',
                                            data: dataReport,
                                            dataType: 'json',
                                            complete: function() {
                                                var delayInMilliseconds = 200;
                                                setTimeout(function() {
                                                    spinnerhide();
                                                }, delayInMilliseconds);
                                            },
                                            success: function(data) {
                                                console.log(data);
                                            },
                                            error: function(data) {
                                                console.log('An error occurred.');
                                                console.log(data);
                                                myAlertTopError();
                                            },
                                        });
                                    }, 1000);
                                }

                           
                            // }else
                            // {
                            //     printJS({
                            //         printable: printer_url,
                            //         type: 'pdf',
                            //         showModal: true
                            //     });
                            // }
                            

                            document.getElementById("bag_number1").value = '';
                            document.getElementById("bag_number1").focus();


                }

            },
            error: function (d) {
                /*console.log("error");*/
                alert("404. Please wait until the File is Loaded.");
            }
        });


    }

    

    function setPheno(v,pos,neg)
    {
        
        if(v == null)
        v = "";

        // v = v.replace( /(^.*\[|\].*$)/g, '' );
        console.log(v);
        console.log("POS "+pos);
        console.log("NEG "+neg);

        
        if(findArrayPhen(v,pos))
        {
            return "1";
        }else if(findArrayPhen(v,neg))
        {
            return "2";
        }else
        {
            return "0";
        }
    }

    function findArrayPhen(v,k)
    {   var status = false;
        var arr = v.split(",");
        arr.forEach((element) => 
        {
            console.log(element);
            if(element == k)
            {
                status = true;
            }
        }
        );

        return status;
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
            document.getElementById("bag_number1").focus();
        });
        return false;

    }

    function errorSwal3($msg = "") {
        swal({
            title: $msg,
            // text: 'รหัสประชาชนไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง',
            type: 'warning',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then(value => {
            document.getElementById("bag_number1").value = '';
            setDataModalSelectValue('bloodstocktypecross1', null, '');
            document.getElementById("bloodstocktypecross1").focus();
        });
        return false;

    }

    function setDataModalSelectValue(elem = '', itemid, itemtext) {
        var select = $('#' + elem);
        option = new Option(itemtext, itemid, true, true);
        select.append(option).trigger('change');

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
            arr.push(rows[i].cells[16].innerHTML);
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
        console.log("t");
        $('#blankModal').modal('hide');
    }

    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        deleteArr.push(row.cells[16].innerHTML);

        row.parentNode.removeChild(row);
        setNo();
    }

    function scanBarcodeFormat() {
        var bag_number = $('#bag_number1').val();
        var bag_number_new = numnerPoint(bag_number);
        $('#bag_number1').val(bag_number_new);

    }

    function scanBarcode1() {
        var bag_number = $('#bag_number1').val();
        var bag_number_new = numnerPoint(bag_number);
        $('#bag_number1').val(bag_number_new);
        if (bag_number_new.length == 14) {
            searchBagNumber(bag_number_new);
        }


    }

    

</script>