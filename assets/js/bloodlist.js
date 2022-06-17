var fisrtLoad = false;
var arrData = [];

function loadTable(barcode = '', rfid = '', bloodtypeopen = false) {

    var body = document.getElementById("list_table_json").getElementsByTagName('tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    spinnershow();

    if (rfid == '#')
        rfid = '';

    var fromdate = '';
    var todate = '';
    var fromnumber = '';
    var tonumber = '';
    if (!barcode && !rfid) {
        fromdate = dmyToymd2($("#fromdate").val());
        todate = dmyToymd2($("#todate").val());

        fromnumber = $("#fromnumber").val();
        tonumber = $("#tonumber").val();
        bloodstatus = $("#bloodstatus").val();
    }

    $("#barcode").val("");


    $.ajax({
        url: 'data/blood/bloodlist.php?barcode=' +
            barcode + '&fromdate=' + fromdate + '&todate=' + todate + '&fromnumber=' + fromnumber + '&tonumber=' + tonumber + '&bloodstatus=' + bloodstatus + '&rfid=' + rfid,
        dataType: 'json',
        type: 'get',
        success: function(data) {

            if (fisrtLoad) {
                // $('html,body').animate({ scrollTop: document.body.scrollHeight }, "fast");
            }
            fisrtLoad = true;

            var body = document.querySelector('tbody');
            while (body.firstChild) {
                body.removeChild(body.firstChild);
            }

            var count = data.data.length.toString();
            $('#countblood2').val(data.data.length);
            $('#countblood').text(count.replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            var obj = JSON.parse(JSON.stringify(data.data).replace(/null/g, '""').replace(/"\"\""/g, '""'));
            arrData = obj;
            var event_data = '';
            bloodRemark().then(
                function success(blooddata) {


                    $.each(obj, function(index, value) {

                        setTimeout(function() {

                            event_data = '';
                            var color = "";
                            var readonly_permission = '';

                            var statusImport = !(value.bloodstatusid == 1 || value.bloodstatusid == 2)

                            if (value.bloodstatusid == 1) {
                                color = "color1";
                            } else if (value.bloodstatusid == 2) {
                                color = "color2";
                            } else if (value.bloodstatusid == 3) {
                                color = "color3";
                            } else if (value.bloodstatusid == 4) {
                                color = "color4";
                            } else if (value.bloodstatusid == 5) {
                                color = "color2";
                            } else if (value.bloodstatusid == 6) {
                                color = "color6";
                            } else if (value.bloodstatusid == 7) {
                                color = "color3";
                            }

                            if (value.prcused == 1 && edit_permission != 1) {
                                var prcused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var prcused = ''
                            }

                            if (value.lprcused == 1 && edit_permission != 1) {
                                var lprcused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var lprcused = ''
                            }

                            if (value.ffpused == 1 && edit_permission != 1) {
                                var ffpused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var ffpused = ''
                            }

                            if (value.pcused == 1 && edit_permission != 1) {
                                var pcused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var pcused = ''
                            }

                            if (value.lppcused == 1 && edit_permission != 1) {
                                var lppcused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var lppcused = ''
                            }

                            if (value.lppc_pasused == 1 && edit_permission != 1) {
                                var lppc_pasused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var lppc_pasused = ''
                            }

                            if (value.sdpused == 1 && edit_permission != 1) {
                                var sdpused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var sdpused = ''
                            }

                            if (value.sdp_pasused == 1 && edit_permission != 1) {
                                var sdp_pasused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var sdp_pasused = ''
                            }

                            if (value.wbused == 1 && edit_permission != 1) {
                                var wbused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var wbused = ''
                            }

                            if (value.ldprcused == 1 && edit_permission != 1) {
                                var ldprcused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var ldprcused = ''
                            }

                            if (value.sdrused == 1 && edit_permission != 1) {
                                var sdrused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var sdrused = ''
                            }

                            if (value.crpused == 1 && edit_permission != 1) {
                                var crpused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var crpused = ''
                            }

                            if (value.cryoused == 1 && edit_permission != 1) {
                                var cryoused = 'readonly'
                                readonly_permission = 'readonly';
                            } else {
                                var cryoused = ''
                            }


                            var usedstate = (value.prcused == 1) || (value.ffpused == 1) || (value.pcused == 1) || (value.lppcused == 1) || (value.lppc_pasused == 1) || (value.sdpused == 1) || (value.sdp_pasused == 1) || (value.wbused == 1) || (value.ldprcused == 1) || (value.sdrused == 1) || (value.crpused == 1) || (value.cryoused == 1);


                            var volomestate = (((value.prc != "") ? (value.prcremark != 0) : true) && ((value.lprc != "") ? (value.lprcremark != 0) : true) && ((value.ffp != "") ? (value.ffpremark != 0) : true) && ((value.pc != "") ? (value.pc != 0) : true) &&
                                ((value.lppc != "") ? (value.lppcremark != 0) : true) && ((value.lppc_pas != "") ? (value.lppc_pasremark != 0) : true) && ((value.sdp != "") ? (value.sdp != 0) : true) && ((value.sdp_pas != "") ? (value.sdp_pasremark != 0) : true) &&
                                ((value.wb != "") ? (value.wbremark != 0) : true) && ((value.ldprc != "") ? (value.ldprcremark != 0) : true) && ((value.sdr != "") ? (value.sdrremark != 0) : true) && ((value.crp != "") ? (value.crpremark != 0) : true) && ((value.cryo != "") ? (value.cryoremark != 0) : true))

                            var remarkstate = ((volomestate) ? (value.bloodstatusid != 1) ? ((((value.PRC == 1) ? (value.prcremark != 0 || value.prc == "") : true) && ((value.LPRC == 1) ? (value.lprcremark != 0 || value.lprc == "") : true) && ((value.FFP == 1) ? (value.ffpremark != 0 || value.ffp == "") : true) &&
                                ((value.PC == 1) ? (value.pcremark != 0 || value.pc == "") : true) && ((value.LPPC == 1) ? (value.lppcremark != 0 || value.lppc == "") : true) && ((value.LPPC_PAS == 1) ? (value.lppc_pasremark != 0 || value.lppc_pas == "") : true) &&
                                ((value.SDP == 1) ? (value.sdpremark != 0 || value.sdp == "") : true) && ((value.SDP_PAS == 1) ? (value.sdp_pasremark != 0 || value.sdp_pas == "") : true) && ((value.WB == 1) ? (value.wbremark != 0 || value.wb == "") : true) &&
                                ((value.LDPRC == 1) ? (value.ldprcremark != 0 || value.ldprc == "") : true) && ((value.SDR == 1) ? (value.sdrremark != 0 || value.sdr == "") : true) && ((value.CRP == 1) ? (value.crpremark != 0 || value.crp == "") : true) && ((value.CRYO == 1) ? (value.cryoremark != 0 || value.cryo == "") : true))) : false : false);



                            event_data += '<tr> ';
                            event_data += '<td   class="table-s-blood-scroll-left-thead-th3-0 ' + ((remarkstate) ? "color6" : (((value.bloodrhsceen_cross == "Rh+" && !usedstate) ? 'color5' : color))) + '"  > '
                            event_data += '</td> '
                            event_data += '<td class="table-s-blood-scroll-left-thead-th3-1" colspan="5" style="padding:0px"> '
                            event_data += '<input type="text" autocomplete="off" hidden name="donateid' + index + '" value="' + value.donateid + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden id="bloodstatusid' + index + '" name="bloodstatusid' + index + '" value="' + value.bloodstatusid + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden id="bag_number_' + value.bag_number + '" name="bag_number_' + value.bag_number + '"  value="' + index + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden id="blood_group_' + value.bag_number + '"   value="' + value.blood_group_raj + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden id="blood_group_' + index + '"   value="' + value.blood_group_raj + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden name="donation_get_type_id' + index + '" value="' + value.donation_get_type_id + '" >';
                            event_data += '<table id="table' + index + '" style="width: 315px" onclick="chActiveTable(' + index + ')" > '
                            event_data += '<tbody> '
                            event_data += '<tr style="height: 70px !important;"> '
                            event_data += '<th colspan="5"><h6>' + value.bagtypename + '</h6></th> '
                            event_data += '</tr>'
                            event_data += '<tr>'
                            event_data += '<th style="width:80px !important; margin-top: 10px; font-size:14px;" id="donation_date_exp' + index + '">' + getDMY(value.donation_date) + '</th> '
                            event_data += '<th style="width:115px !important; margin-top: 10px; font-size:16px;"><strong>' + value.bag_number + '</strong></th> '
                            event_data += '<th style="width:40px !important; margin-top: 10px; font-size:16px;">' + value.blood_group1 + '</th> '
                            event_data += '<th style="width:40px !important; margin-top: 10px; font-size:16px;">' + value.blood_group_raj + '</th> '
                            event_data += '<th style="width:40px !important; margin-top: 10px; font-size:16px;">' + value.rhcode_raj2 + '</th> '
                            event_data += '</tr> '
                            event_data += '</tbody> '
                            event_data += '</table> '

                            event_data += '<input type="text" autocomplete="off" hidden id="value_bag_type_id' + index + '" value="' + value.bag_type_id + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden id="value_blood_group_cross' + index + '" value="' + value.blood_group_cross + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden id="value_rh_cross' + index + '" value="' + value.rh_cross + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden id="value_donorid' + index + '" value="' + value.donorid + '" >';

                            event_data += '<input type="text"  hidden id="prcused' + value.bag_number + '" value="' + value.prcused + '" >';
                            event_data += '<input type="text"  hidden id="lprcused' + value.bag_number + '" value="' + value.lprcused + '" >';
                            event_data += '<input type="text"  hidden id="ldprcused' + value.bag_number + '" value="' + value.ldprcused + '" >';
                            event_data += '<input type="text"  hidden id="ffpused' + value.bag_number + '" value="' + value.ffpused + '" >';
                            event_data += '<input type="text"  hidden id="pcused' + value.bag_number + '" value="' + value.pcused + '" >';
                            event_data += '<input type="text"  hidden id="lppcused' + value.bag_number + '" value="' + value.lppcused + '" >';
                            event_data += '<input type="text"  hidden id="lppc_pasused' + value.bag_number + '" value="' + value.lppc_pasused + '" >';
                            event_data += '<input type="text"  hidden id="sdpused' + value.bag_number + '" value="' + value.sdpused + '" >';
                            event_data += '<input type="text"  hidden id="sdp_pasused' + value.bag_number + '" value="' + value.sdp_pasused + '" >';
                            event_data += '<input type="text"  hidden id="sdrused' + value.bag_number + '" value="' + value.sdrused + '" >';
                            event_data += '<input type="text"  hidden id="wbused' + value.bag_number + '" value="' + value.wbused + '" >';

                            event_data += '<input type="text"  hidden id="bloodstatusid' + value.bag_number + '" value="' + value.bloodstatusid + '" >';
                            event_data += '<input type="text"  hidden id="bloodrhsceen_cross' + value.bag_number + '" value="' + value.bloodrhsceen_cross + '" >';
                            event_data += '<input type="text" autocomplete="off" hidden id="value_sdpresultvolume' + index + '" value="' + value.sdpresultvolume + '" >';

                            event_data += '</td>'
                            event_data += '<td class="td-line-number" id="rubberbandnumberTd' + index + '" > '
                            event_data += '<input '+readonly_permission+' id="rubberbandnumber' + index + '" name="rubberbandnumber' + index + '"  style="width: 100%;border: 1px solid #000;" type="text" autocomplete="off" '
                            event_data += 'class="form-control form-control-sm td-input"  value="' + value.rubberbandnumber + '"> '
                            event_data += '</td> '


                            if (value.PRC == 1) {
                                event_data += '<td  colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px"> '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="prc' + index + '" id="prc' + index + '"  style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + prcused + '  onchange="setDateExp(' + index + ',`prc`)"  '
                                event_data += ' class="form-control form-control-sm td-input ' + ((value.prcisremark == 0 || value.prcinfect == 1) ? ((value.prcinfect == 1) ? color : ((value.prcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.prc + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="prcexp' + index + '" id="prcexp' + index + '" style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.prcisremark == 0 || value.prcinfect == 1) ? ((value.prcinfect == 1) ? color : ((value.prcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.prc != "") ? getDMY2(value.prcexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="prcrfid' + index + '" id="prcrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.prcisremark == 0 || value.prcinfect == 1) ? ((value.prcinfect == 1) ? color : ((value.prcused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.prcrfid + '" onkeyup=setRFIDCODE(`PRC`,`' + value.bag_number + '`,this)  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.prcremark != 0 && statusImport) || value.prcused == 1) ? 'disabled' : '') + ' name="prcremark' + index + '" id="prcremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.prcisremark == 0 || value.prcinfect == 1) ? ((value.prcinfect == 1) ? color : ((value.prcused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.prcremark + '"  > '
                                event_data += '<option ' + ((!value.prcremark) ? " selected " : "") + '  value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.prcremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '

                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.LPRC == 1) {



                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="lprc' + index + '" id="lprc' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + lprcused + ' onchange="setDateExp(' + index + ',`lprc`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.lprcisremark == 0 || value.lprcinfect == 1) ? ((value.lprcinfect == 1) ? color : ((value.lprcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.lprc + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="lprcexp' + index + '" id="lprcexp' + index + '" style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.lprcisremark == 0 || value.lprcinfect == 1) ? ((value.lprcinfect == 1) ? color : ((value.lprcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.lprc != "") ? getDMY2(value.lprcexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="lprcrfid' + index + '" id="lprcrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.lprcisremark == 0 || value.lprcinfect == 1) ? ((value.lprcinfect == 1) ? color : ((value.lprcused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.lprcrfid + '" onkeyup=setRFIDCODE(`LPRC`,`' + value.bag_number + '`,this)  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '

                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.lprcremark != 0 && statusImport) || value.lprcused == 1) ? 'disabled' : '') + ' name="lprcremark' + index + '" id="lprcremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.lprcisremark == 0 || value.lprcinfect == 1) ? ((value.lprcinfect == 1) ? color : ((value.lprcused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.lprcremark + '"  > '
                                event_data += '<option ' + ((!value.lprcremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.lprcremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '


                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.FFP == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="ffp' + index + '" id="ffp' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + ffpused + '  onchange="setDateExp(' + index + ',`ffp`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.ffpisremark == 0 || value.ffpinfect == 1) ? ((value.ffpinfect == 1) ? color : ((value.ffpused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.ffp + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="ffpexp' + index + '" id="ffpexp' + index + '" style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.ffpisremark == 0 || value.ffpinfect == 1) ? ((value.ffpinfect == 1) ? color : ((value.ffpused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.ffp != "") ? getDMY2(value.ffpexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="ffprfid' + index + '" id="ffprfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.ffpisremark == 0 || value.ffpinfect == 1) ? ((value.ffpinfect == 1) ? color : ((value.ffpused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.ffprfid + '"  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.ffpremark != 0 && statusImport) || value.ffpused == 1) ? 'disabled' : '') + ' name="ffpremark' + index + '" id="ffpremark' + index + '" onchange="setRFID15(this,' + index + ')" class="form-control remark_search form-control-sm td-input ' + ((value.ffpisremark == 0 || value.ffpinfect == 1) ? ((value.ffpinfect == 1) ? color : ((value.ffpused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.ffpremark + '"  > '
                                event_data += '<option ' + ((!value.ffpremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.ffpremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.PC == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="pc' + index + '" id="pc' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + pcused + '  onchange="setDateExp(' + index + ',`pc`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.pcisremark == 0 || value.pcinfect == 1) ? ((value.pcinfect == 1) ? color : ((value.pcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.pc + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="pcexp' + index + '" id="pcexp' + index + '" style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.pcisremark == 0 || value.pcinfect == 1) ? ((value.pcinfect == 1) ? color : ((value.pcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.pc != "") ? getDMY2(value.pcexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="pcrfid' + index + '" id="pcrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.pcisremark == 0 || value.pcinfect == 1) ? ((value.pcinfect == 1) ? color : ((value.pcused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.pcrfid + '"  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.pcremark != 0 && statusImport) || value.pcused == 1) ? 'disabled' : '') + ' name="pcremark' + index + '" id="pcremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.pcisremark == 0 || value.pcinfect == 1) ? ((value.pcinfect == 1) ? color : ((value.pcused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.pcremark + '"  > '
                                event_data += '<option ' + ((!value.pcremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.pcremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }
                            if (value.LPPC == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="lppc' + index + '" id="lppc' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + lppcused + '  onchange="setDateExp(' + index + ',`lppc`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.lppcisremark == 0 || value.lppcinfect == 1) ? ((value.lppcinfect == 1) ? color : ((value.lppcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.lppc + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly  onfocus="chActiveTable(' + index + ')" name="lppcexp' + index + '" id="lppcexp' + index + '" style="width: 130px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.lppcisremark == 0 || value.lppcinfect == 1) ? ((value.lppcinfect == 1) ? color : ((value.lppcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.lppc != "") ? getDMY2(value.lppcexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '

                                event_data += '<input type="hidden" id="pc_1' + index + '" name="pc_1' + index + '" value="' + value.pc_1 + '"> '
                                event_data += '<input type="hidden" id="pc_2' + index + '" name="pc_2' + index + '" value="' + value.pc_2 + '"> '
                                event_data += '<input type="hidden" id="pc_3' + index + '" name="pc_3' + index + '" value="' + value.pc_3 + '"> '
                                event_data += '<input type="hidden" id="pc_4' + index + '" name="pc_4' + index + '" value="' + value.pc_4 + '"> '
                                event_data += '<input type="hidden" id="ffp_5' + index + '" name="ffp_5' + index + '" value="' + value.ffp_5 + '"> '

                                event_data += '<div class="container" style="padding: 0px 0px 0px 0px"> '
                                event_data += '    <div class="row" style="margin-right:0px"> '
                                event_data += '        <div class="col" style="width: 190px;padding: 0px 0px 0px 10px"> '
                                event_data += '             <input readonly onfocus="chActiveTable(' + index + ')"  name="lppcrfid' + index + '" id="lppcrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.lppcisremark == 0 || value.lppcinfect == 1) ? ((value.lppcinfect == 1) ? color : ((value.lppcused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += '             value="' + value.lppcrfid + '"  > '
                                event_data += '         </div> '
                                event_data += '        <div class="col-md-1" style="padding: 0px 0px 0px 0px" > '
                                event_data += '             <button data-toggle="tooltip" title="เพิ่ม PC&FFP เป็น LPPC" type="button" style="margin: 0px 0px 0px -13px;border-radius:0px" '
                                event_data += '             onclick="showLppcModal(' + index + ',`' + value.bag_number + '`)" '
                                event_data += '             class="btn btn-info  btn-sm"> '
                                event_data += '                <i class="fa fa-plus"></i> '
                                event_data += '             </button> '
                                event_data += '         </div> '
                                event_data += '    </div> '
                                event_data += '</div>'

                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.lppcremark != 0 && statusImport) || value.lppcused == 1) ? 'disabled' : '') + ' name="lppcremark' + index + '" id="lppcremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.lppcisremark == 0 || value.lppcinfect == 1) ? ((value.lppcinfect == 1) ? color : ((value.lppcused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.lppcremark + '"  > '
                                event_data += '<option ' + ((!value.lppcremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.lppcremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.LPPC_PAS == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="lppc_pas' + index + '" id="lppc_pas' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + lppc_pasused + ' onchange="setDateExp(' + index + ',`lppc_pas`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.lppc_pasisremark == 0 || value.lppc_pasinfect == 1) ? ((value.lppc_pasinfect == 1) ? color : ((value.lppc_pasused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.lppc_pas + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly  onfocus="chActiveTable(' + index + ')" name="lppc_pasexp' + index + '" id="lppc_pasexp' + index + '" style="width: 120px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.lppc_pasisremark == 0 || value.lppc_pasinfect == 1) ? ((value.lppc_pasinfect == 1) ? color : ((value.lppc_pasused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.lppc_pas != "") ? getDMY2(value.lppc_pasexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '

                                event_data += '<input type="hidden" id="pc_lppc_pas_1' + index + '" name="pc_lppc_pas_1' + index + '" value="' + value.pc_lppc_pas_1 + '"> '
                                event_data += '<input type="hidden" id="pc_lppc_pas_2' + index + '" name="pc_lppc_pas_2' + index + '" value="' + value.pc_lppc_pas_2 + '"> '
                                event_data += '<input type="hidden" id="pc_lppc_pas_3' + index + '" name="pc_lppc_pas_3' + index + '" value="' + value.pc_lppc_pas_3 + '"> '
                                event_data += '<input type="hidden" id="pc_lppc_pas_4' + index + '" name="pc_lppc_pas_4' + index + '" value="' + value.pc_lppc_pas_4 + '"> '
                                event_data += '<input type="hidden" id="pas_lppc_companypasid' + index + '" name="pas_lppc_companypasid' + index + '" value="' + value.pas_lppc_companypasid + '"> '
                                event_data += '<input type="hidden" id="pas_lppc_lot_no' + index + '" name="pas_lppc_lot_no' + index + '" value="' + value.pas_lppc_lot_no + '"> '
                                event_data += '<input type="hidden" id="pas_lppc_exp' + index + '" name="pas_lppc_exp' + index + '" value="' + getDMY(value.pas_lppc_exp) + '"> '

                                event_data += '<div class="container" style="padding: 0px 0px 0px 0px"> '
                                event_data += '    <div class="row" > '
                                event_data += '        <div class="col" style="width: 190px;padding: 0px 0px 0px 10px"> '
                                event_data += '             <input readonly onfocus="chActiveTable(' + index + ')"  name="lppc_pasrfid' + index + '" id="lppc_pasrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.lppc_pasisremark == 0 || value.lppc_pasinfect == 1) ? ((value.lppc_pasinfect == 1) ? color : ((value.lppc_pasused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += '             value="' + value.lppc_pasrfid + '"  > '
                                event_data += '         </div> '
                                event_data += '        <div class="col-md-1" style="padding: 0px 0px 0px 0px" > '
                                event_data += '             <button data-toggle="tooltip" title="เพิ่ม PC&PAS เป็น LPPC(PAS)" type="button" style="margin: 0px 0px 0px -32px;border-radius:0px" '
                                event_data += '             onclick="showLppcPasModal(' + index + ',`' + value.bag_number + '`)" '
                                event_data += '             class="btn btn-info  btn-sm"> '
                                event_data += '                <i class="fa fa-plus"></i> '
                                event_data += '             </button> '
                                event_data += '         </div> '
                                event_data += '    </div> '
                                event_data += '</div>'

                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.lppc_pasremark != 0 && statusImport) || value.lppc_pasused == 1) ? 'disabled' : '') + ' name="lppc_pasremark' + index + '" id="lppc_pasremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.lppc_pasisremark == 0 || value.lppc_pasinfect == 1) ? ((value.lppc_pasinfect == 1) ? color : ((value.lppc_pasused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.lppc_pasremark + '"  > '
                                event_data += '<option ' + ((!value.lppc_pasremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.lppc_pasremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.SDP == 1) {

                                var sdpprod = "";
                                if (value.sdp != "") {
                                    sdpprod = value.sdp;
                                } else if (value.sdpprodvolume2 != null && value.sdpprodvolume2 != '') {
                                    sdpprod = value.sdpprodvolume2;
                                    //    console.log('sdpprod2 : '+sdpprod);

                                } else {
                                    sdpprod = value.sdpprodvolume1;
                                    // console.log('sdpprod1 : '+sdpprod);

                                }
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="sdp' + index + '" id="sdp' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + sdpused + '  onchange="setDateExp(' + index + ',`sdp`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.sdpisremark == 0 || value.sdpinfect == 1) ? ((value.sdpinfect == 1) ? color : ((value.sdpused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + sdpprod + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="sdpexp' + index + '" id="sdpexp' + index + '" style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.sdpisremark == 0 || value.sdpinfect == 1) ? ((value.sdpinfect == 1) ? color : ((value.sdpused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.sdp != "") ? getDMY2(value.sdpexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="sdprfid' + index + '" id="sdprfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.sdpisremark == 0 || value.sdpinfect == 1) ? ((value.sdpinfect == 1) ? color : ((value.sdpused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.sdprfid + '"  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.sdpremark != 0 && statusImport) || value.sdpused == 1) ? 'disabled' : '') + ' name="sdpremark' + index + '" id="sdpremark' + index + '"  onchange="setRFID15(this,' + index + ')" class="form-control  remark_search form-control-sm td-input ' + ((value.sdpisremark == 0 || value.sdpinfect == 1) ? ((value.sdpinfect == 1) ? color : ((value.sdpused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.sdpremark + '"  > '
                                event_data += '<option ' + ((!value.sdpremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.sdpremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.SDP_PAS == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="sdp_pas' + index + '" id="sdp_pas' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + sdp_pasused + ' onchange="setDateExp(' + index + ',`sdp_pas`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.sdp_pasisremark == 0 || value.sdp_pasinfect == 1) ? ((value.sdp_pasinfect == 1) ? color : ((value.sdp_pasused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.sdp_pas + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly  onfocus="chActiveTable(' + index + ')" name="sdp_pasexp' + index + '" id="sdp_pasexp' + index + '" style="width: 120px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.sdp_pasisremark == 0 || value.sdp_pasinfect == 1) ? ((value.sdp_pasinfect == 1) ? color : ((value.sdp_pasused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.sdp_pas != "") ? getDMY2(value.sdp_pasexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '

                                event_data += '<input type="hidden" id="sdp_sdp_pas_1' + index + '" name="sdp_sdp_pas_1' + index + '" value="' + value.sdp_sdp_pas_1 + '"> '
                                event_data += '<input type="hidden" id="sdp_pas_pas_2' + index + '" name="sdp_pas_pas_2' + index + '" value="' + value.sdp_pas_pas_2 + '"> '

                                event_data += '<input type="hidden" id="pas_sdp_companypasid' + index + '" name="pas_sdp_companypasid' + index + '" value="' + value.pas_sdp_companypasid + '"> '
                                event_data += '<input type="hidden" id="pas_sdp_lot_no' + index + '" name="pas_sdp_lot_no' + index + '" value="' + value.pas_sdp_lot_no + '"> '
                                event_data += '<input type="hidden" id="pas_sdp_exp' + index + '" name="pas_sdp_exp' + index + '" value="' + getDMY(value.pas_sdp_exp) + '"> '

                                event_data += '<div class="container" style="padding: 0px 0px 0px 0px"> '
                                event_data += '    <div class="row" > '
                                event_data += '        <div class="col" style="width: 190px;padding: 0px 0px 0px 10px"> '
                                event_data += '             <input readonly onfocus="chActiveTable(' + index + ')"  name="sdp_pasrfid' + index + '" id="sdp_pasrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.sdp_pasisremark == 0 || value.sdp_pasinfect == 1) ? ((value.sdp_pasinfect == 1) ? color : ((value.sdp_pasused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += '             value="' + value.sdp_pasrfid + '"  > '
                                event_data += '         </div> '
                                event_data += '        <div class="col-md-1" style="padding: 0px 0px 0px 0px" > '
                                event_data += '             <button data-toggle="tooltip" title="เพิ่ม SDP&PAS เป็น SDP PAS" type="button" style="margin: 0px 0px 0px -32px;border-radius:0px" '
                                event_data += '             onclick="showSdpPasModal(' + index + ')" '
                                event_data += '             class="btn btn-info  btn-sm"> '
                                event_data += '                <i class="fa fa-plus"></i> '
                                event_data += '             </button> '
                                event_data += '         </div> '
                                event_data += '    </div> '
                                event_data += '</div>'

                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.sdp_pasremark != 0 && statusImport) || value.sdp_pasused == 1) ? 'disabled' : '') + ' name="sdp_pasremark' + index + '" id="sdp_pasremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.sdp_pasisremark == 0 || value.sdp_pasinfect == 1) ? ((value.sdp_pasinfect == 1) ? color : ((value.sdp_pasused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.sdp_pasremark + '"  > '
                                event_data += '<option ' + ((!value.sdp_pasremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.sdp_pasremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.WB == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="wb' + index + '" id="wb' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + wbused + ' onchange="setDateExp(' + index + ',`wb`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.wbremark || value.wbinfect == 1) ? ((value.wbinfect == 1) ? color : ((value.wbused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.wb + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="wbexp' + index + '" id="wbexp' + index + '" style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.wbremark || value.wbinfect == 1) ? ((value.wbinfect == 1) ? color : ((value.wbused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.wb != "") ? getDMY2(value.wbexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="wbrfid' + index + '" id="wbrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.wbisremark == 0 || value.wbinfect == 1) ? ((value.wbinfect == 1) ? color : ((value.wbused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.wbrfid + '"  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.wbremark != 0 && statusImport) || value.wbused == 1) ? 'disabled' : '') + ' name="wbremark' + index + '" id="wbremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.wbremark || value.wbinfect == 1) ? ((value.wbinfect == 1) ? color : ((value.wbused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.wbremark + '"  > '
                                event_data += '<option ' + ((!value.wbremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.wbremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '


                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.LDPRC == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="ldprc' + index + '" id="ldprc' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + ldprcused + ' onchange="setDateExp(' + index + ',`ldprc`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.ldprcremark || value.ldprcinfect == 1) ? ((value.ldprcinfect == 1) ? color : ((value.ldprcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.ldprc + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="ldprcexp' + index + '" id="ldprcexp' + index + '" style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.ldprcremark || value.ldprcinfect == 1) ? ((value.ldprcinfect == 1) ? color : ((value.ldprcused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.ldprc != "") ? getDMY2(value.ldprcexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="ldprcrfid' + index + '" id="ldprcrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.ldprcremark || value.ldprcinfect == 1) ? ((value.ldprcinfect == 1) ? color : ((value.ldprcused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.ldprcrfid + '" onkeyup=setRFIDCODE(`LDPRC`,`' + value.bag_number + '`,this)  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.ldprcremark != 0 && statusImport) || value.ldprcused == 1) ? 'disabled' : '') + ' name="ldprcremark' + index + '" id="ldprcremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.ldprcremark || value.ldprcinfect == 1) ? ((value.ldprcinfect == 1) ? color : ((value.ldprcused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.ldprcremark + '"  > '
                                event_data += '<option ' + ((!value.ldprcremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.ldprcremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.SDR == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="sdr' + index + '" id="sdr' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + sdrused + ' onchange="setDateExp(' + index + ',`sdr`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.sdrisremark == 0 || value.sdrinfect == 1) ? ((value.sdrinfect == 1) ? color : ((value.sdrused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.sdr + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="sdrexp' + index + '" id="sdrexp' + index + '"  style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.sdrisremark == 0 || value.sdrinfect == 1) ? ((value.sdrinfect == 1) ? color : ((value.sdrused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.sdr != "") ? getDMY2(value.sdrexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="sdrrfid' + index + '" id="sdrrfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.sdrisremark == 0 || value.sdrinfect == 1) ? ((value.sdrinfect == 1) ? color : ((value.sdrused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.sdrrfid + '" onkeyup=setRFIDCODE(`SDR`,`' + value.bag_number + '`,this)  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.sdrremark != 0 && statusImport) || value.sdrused == 1) ? 'disabled' : '') + ' name="sdrremark' + index + '" id="sdrremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.sdrisremark == 0 || value.sdrinfect == 1) ? ((value.sdrinfect == 1) ? color : ((value.sdrused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.sdrremark + '"  > '
                                event_data += '<option ' + ((!value.sdrremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.sdrremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.CRP == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="crp' + index + '" id="crp' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + crpused + ' onchange="setDateExp(' + index + ',`crp`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.crpisremark == 0 || value.crpinfect == 1) ? ((value.crpinfect == 1) ? color : ((value.crpused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.crp + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="crpexp' + index + '" id="crpexp' + index + '"  style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.crpisremark == 0 || value.crpinfect == 1) ? ((value.crpinfect == 1) ? color : ((value.crpused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.crp != "") ? getDMY2(value.crpexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="crprfid' + index + '" id="crprfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.crpisremark == 0 || value.crpinfect == 1) ? ((value.crpinfect == 1) ? color : ((value.crpused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.crprfid + '" onkeyup=setRFIDCODE(`CRP`,`' + value.bag_number + '`,this)  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.crpremark != 0 && statusImport) || value.crpused == 1) ? 'disabled' : '') + ' name="crpremark' + index + '" id="crpremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.crpisremark == 0 || value.crpinfect == 1) ? ((value.crpinfect == 1) ? color : ((value.crpused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.crpremark + '"  > '
                                event_data += '<option ' + ((!value.crpremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.crpremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            if (value.CRYO == 1) {
                                event_data += '<td colspan="2" style="padding:0px"> '
                                event_data += '<table style="width: 140px" > '
                                event_data += '<tbody> '
                                event_data += '<tr> '
                                event_data += '<th class="td0"> '
                                event_data += '<input onfocus="chActiveTable(' + index + ')" name="cryo' + index + '" id="cryo' + index + '" style="width: 50px; font-size:18px;" type="number" autocomplete="off" ' + cryoused + ' onchange="setDateExp(' + index + ',`cryo`)" '
                                event_data += 'class="form-control form-control-sm td-input ' + ((value.cryoisremark == 0 || value.cryoinfect == 1) ? ((value.cryoinfect == 1) ? color : ((value.cryoused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + value.cryo + '"> '
                                event_data += '</th> '
                                event_data += '<th class="td0"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="cryoexp' + index + '" id="cryoexp' + index + '"  style="width: 90px; font-size:18px;" type="text" autocomplete="off"  '
                                event_data += 'class="form-control form-control-sm  td-input ' + ((value.cryoisremark == 0 || value.cryoinfect == 1) ? ((value.cryoinfect == 1) ? color : ((value.cryoused == 1) ? 'color3' : '')) : 'color6') + '"  value="' + ((value.cryo != "") ? getDMY2(value.cryoexp) : "") + '"> '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2"> '
                                event_data += '<input readonly onfocus="chActiveTable(' + index + ')" name="cryorfid' + index + '" id="cryorfid' + index + '" type="text" autocomplete="off" class="form-control form-control-sm td-input ' + ((value.cryoisremark == 0 || value.cryoinfect == 1) ? ((value.cryoinfect == 1) ? color : ((value.cryoused == 1) ? 'color3' : '')) : 'color6') + '" '
                                event_data += 'value="' + value.cryorfid + '" onkeyup=setRFIDCODE(`CRYO`,`' + value.bag_number + '`,this)  > '
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '<tr> '
                                event_data += '<th class="td0" colspan="2" colspan="2"> '
                                event_data += '<select onfocus="chActiveTable(' + index + ')" ' + (((value.cryoremark != 0 && statusImport) || value.cryoused == 1) ? 'disabled' : '') + ' name="cryoremark' + index + '" id="cryoremark' + index + '" onchange="setRFID15(this,' + index + ')"  class="form-control remark_search form-control-sm td-input ' + ((value.cryoisremark == 0 || value.cryoinfect == 1) ? ((value.cryoinfect == 1) ? color : ((value.cryoused == 1) ? 'color3' : '')) : 'color6') + ' " '
                                event_data += 'value="' + value.cryoremark + '"  > '
                                event_data += '<option ' + ((!value.cryoremark) ? " selected " : "") + ' value="0">หมายเหตุ</option>'
                                $.each(blooddata.data, function(ind, v) {
                                    event_data += '<option ' + ((value.cryoremark == v.bloodremarkid) ? " selected " : "") + ' value="' + v.bloodremarkid + '">' + v.bloodremarktext + '|' + v.bloodremarkcode + '</option>'
                                })
                                event_data += ' </select>'
                                event_data += '</th> '
                                event_data += '</tr> '
                                event_data += '</tbody> '
                                event_data += '</table> '
                                event_data += '</td> '
                            } else {
                                event_data += '<td colspan="2" class="td-bg" onclick="chActiveTable(' + index + ')" style="width:120px !important;" > </td>';
                            }

                            $("#list_table_json").append(event_data);


                            if (value.PRC == 1) {
                                setSelect2Remark('prcremark', index);
                                setColorRFID(document.getElementById("prcremark" + index), value.prcused, value.prcinfect, value.prcisremark);
                            }


                            if (value.LPRC == 1) {
                                setSelect2Remark('lprcremark', index);
                                setColorRFID(document.getElementById("lprcremark" + index), value.lprcused, value.lprcinfect, value.lprcisremark);
                            }


                            if (value.FFP == 1) {
                                setSelect2Remark('ffpremark', index);
                                setColorRFID(document.getElementById("ffpremark" + index), value.ffpused, value.ffpinfect, value.ffpisremark);
                            }


                            if (value.PC == 1) {
                                setSelect2Remark('pcremark', index);
                                setColorRFID(document.getElementById("pcremark" + index), value.pcused, value.pcinfect, value.pcisremark);
                            }


                            if (value.LPPC == 1) {
                                setSelect2Remark('lppcremark', index);
                                setColorRFID(document.getElementById("lppcremark" + index), value.lppcused, value.lppcinfect, value.lppcisremark);
                            }


                            if (value.LPPC_PAS == 1) {
                                setSelect2Remark('lppc_pasremark', index);
                                setColorRFID(document.getElementById("lppc_pasremark" + index), value.lppc_pasused, value.lppc_pasinfect, value.lppc_pasisremark);
                            }


                            if (value.SDP == 1) {
                                setSelect2Remark('sdpremark', index);
                                setColorRFID(document.getElementById("sdpremark" + index), value.sdpused, value.sdpinfect, value.sdpisremark);
                            }


                            if (value.SDP_PAS == 1) {
                                setSelect2Remark('sdp_pasremark', index);
                                setColorRFID(document.getElementById("sdp_pasremark" + index), value.sdp_pasused, value.sdp_pasinfect, value.sdp_pasisremark);
                            }


                            if (value.WB == 1) {
                                setSelect2Remark('wbremark', index);
                                setColorRFID(document.getElementById("wbremark" + index), value.wbused, value.wbinfect, value.wbisremark);
                            }


                            if (value.LDPRC == 1) {
                                setSelect2Remark('ldprcremark', index);
                                setColorRFID(document.getElementById("ldprcremark" + index), value.ldprcused, value.ldprcinfect, value.ldprcisremark);
                            }


                            if (value.SDR == 1) {
                                setSelect2Remark('sdrremark', index);
                                setColorRFID(document.getElementById("sdrremark" + index), value.sdrused, value.sdrinfect, value.sdrisremark);
                            }

                            if (value.CRP == 1) {
                                setSelect2Remark('crpremark', index);
                                setColorRFID(document.getElementById("crpremark" + index), value.crpused, value.crpinfect, value.crpisremark);
                            }

                            if (value.CRYO == 1) {
                                setSelect2Remark('cryoremark', index);
                                setColorRFID(document.getElementById("cryoremark" + index), value.cryoused, value.cryoinfect, value.cryoisremark);
                            }

                        }, 100);


                    });


                    dateBE('.date1');

                    ////////////////////////




                }
                /////////////////////


            );

            if (arrData.length == 1 && bloodtypeopen) {
                if (checkGetIsStock() == 'true') {
                    setTimeout(function() {
                        document.getElementById("bloodstocktypecross").focus();
                        $("#bloodstocktypecross").select2("open");
                    }, 1000);

                } else {
                    setTimeout(function() {
                        document.getElementById("barcode").focus();
                    }, 1000);
                }
            }




        },
        complete: function() {
            var delayInMilliseconds = 0;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        error: function(d) {
            /*console.log("error");*/
            alert("404. Please wait until the File is Loaded.");
        }
    });

}

function setSelect2Remark(elm = "", index) {

    $("#" + elm + index).select2({
        templateResult: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span class="select2-span">&nbsp;' + ((strState[1]) ? strState[1] : '00') + '&nbsp;</span>' + ' <span >&nbsp;' + strState[0] + '</span>'
            );
            return $state;
        },
        templateSelection: function(state) {
            if (!state.id) {
                return state.text;
            }

            var strState = state.text.split("|");

            var $state = $(
                '<span >' + strState[0] + '</span>'
            );
            return $state;
        },
    }).on("select2:selecting", function(e) {
        setTimeout(function() {
            setRFID15(e.currentTarget, index);
        }, 500);
    });

    /*
    $("#" + elm + index)
        .select2()
        .on("select2:selecting", function(e) {
            setTimeout(function() {
                setRFID15(e.currentTarget, index);
            }, 500);

        });
    */
}

function clickTop() {
    $("html, body").animate({ scrollTop: 0 }, "fast");
}

function clickDown() {
    $('html,body').animate({ scrollTop: document.body.scrollHeight }, "fast");
}

function checkSetIsStock(self) {
    localStorage.setItem("isstockseparate", self.checked);
}

function checkGetIsStock() {
    return localStorage.getItem("isstockseparate");
}

function bloodRemark() {
    return $.ajax({
        url: 'data/masterdata/bloodremark.php',
        dataType: 'json',
        type: 'get',
    });
}

function setRFID(self, rfidname, index = "", isremark = 0) {

    var volome = document.getElementById(rfidname.name.replace('rfid', ''));
    var exp = document.getElementById(rfidname.name.replace('rfid', 'exp'));
    var remark = document.getElementById(rfidname.name.replace('rfid', 'remark'));

    if (self.value != '0' && isremark == 1) {
        rfidname.disabled = true;
        rfidname.classList.add("color6");


        volome.classList.add("color6");
        exp.classList.add("color6");
        remark.classList.add("color6");


    } else {
        rfidname.disabled = false;
        rfidname.classList.remove("color6");
        volome.classList.remove("color6");
        exp.classList.remove("color6");
        remark.classList.remove("color6");
    }

    if (self.value == "15")
        remarkShortBag(index);
}

function setRFIDLoad(self, rfidname, index = "", isremark = 0) {

    console.log(isremark);
    var volome = document.getElementById(rfidname.name.replace('rfid', ''));
    var exp = document.getElementById(rfidname.name.replace('rfid', 'exp'));
    var remark = document.getElementById(rfidname.name.replace('rfid', 'remark'));

    if (isremark == 1) {
        console.log("===========");
        rfidname.disabled = true;
        rfidname.classList.add("color6");

        volome.classList.add("color6");
        exp.classList.add("color6");
        remark.classList.add("color6");


    } else {
        rfidname.disabled = false;
        rfidname.classList.remove("color6");
        volome.classList.remove("color6");
        exp.classList.remove("color6");
        remark.classList.remove("color6");
    }

    if (self.value == "15")
        remarkShortBag(index);
}

function setColorRFID(self, isused = 0, infect, isremark) {

    if (infect == 1) {
        self.parentNode.children[1].children[0].children[0].style.backgroundColor = "#C00"; //แดง
    } else if (isremark == 1) {
        self.parentNode.children[1].children[0].children[0].style.backgroundColor = "#0000FF"; // น้ำเงิน
        self.parentNode.children[1].children[0].children[0].children[0].style.color = "#FFF"; // ขาว
    } else if (isused == 1) {
        self.parentNode.children[1].children[0].children[0].style.backgroundColor = "#6C0"; // เขียว
    }



}

function setRFID15(self, index) {
    if (self.value == "15")
        remarkShortBag(index);
}



function remarkShortBag(index = "") {

    if ($("#prcremark" + index).val() != "15")
        setDataModalSelectValue('prcremark' + index, 15, '[15] Short bag');

    if ($("#lprcremark" + index).val() != "15")
        setDataModalSelectValue('lprcremark' + index, 15, '[15] Short bag');

    if ($("#ldprcremark" + index).val() != "15")
        setDataModalSelectValue('ldprcremark' + index, 15, '[15] Short bag');

    if ($("#ffpremark" + index).val() != "15")
        setDataModalSelectValue('ffpremark' + index, 15, '[15] Short bag');

    if ($("#pcremark" + index).val() != "15")
        setDataModalSelectValue('pcremark' + index, 15, '[15] Short bag');

    if ($("#lppcremark" + index).val() != "15")
        setDataModalSelectValue('lppcremark' + index, 15, '[15] Short bag');

    if ($("#lppc_pasremark" + index).val() != "15")
        setDataModalSelectValue('lppc_pasremark' + index, 15, '[15] Short bag');

    if ($("#sdpremark" + index).val() != "15")
        setDataModalSelectValue('sdpremark' + index, 15, '[15] Short bag');

    if ($("#sdp_pasremark" + index).val() != "15")
        setDataModalSelectValue('sdp_pasremark' + index, 15, '[15] Short bag');

    if ($("#sdrremark" + index).val() != "15")
        setDataModalSelectValue('sdrremark' + index, 15, '[15] Short bag');

    if ($("#wbremark" + index).val() != "15")
        setDataModalSelectValue('wbremark' + index, 15, '[15] Short bag');

    if ($("#crpremark" + index).val() != "15")
        setDataModalSelectValue('crpremark' + index, 15, '[15] Short bag');

    if ($("#cryoremark" + index).val() != "15")
        setDataModalSelectValue('cryoremark' + index, 15, '[15] Short bag');

}

function checkRemarkShortBag(elename = "") {
    if (document.getElementById(elename))
        document.getElementById(elename).value = 15;
}

function setDateExp(index = 0, type = "") {
    var valume = $("#" + type + index).val();
    var obj = arrData[index];

    var donation_date_exp = $("#donation_date_exp" + index).html();

    // var date = new Date();

    // var fullyear = date.getFullYear() + 544;
    // var fullmonth = date.getMonth() + 1;
    // if (fullmonth < 10) {
    //     fullmonth = '0' + fullmonth;
    // }
    // var fullday = date.getDate();
    // if (fullday < 10) {
    //     fullday = '0' + fullday;
    // }

    var dateArray = donation_date_exp.split('/');

    var substr = dateArray[2].substr(0, 4);
    var convert = parseInt(substr) + 1;

    // var year = parseInt(dateArray[2] + 1) + 1;

    var val = dateArray[0] + '/' + dateArray[1] + '/' + convert;

    var val2 = convert + '-' + dateArray[1] + '-' + dateArray[0];
    // alert(substr);
    // alert(convert);

    $("#" + type + "exp" + index).val(getDMY2(obj[type + 'exp']));

    if (type == 'ffp' || type == 'cryo') {
        $("#" + type + "exp" + index).val(val);
        // alert(arrData[index][type + 'exp']);
        // arrData[index][type + 'exp'] = val2;
        // alert(arrData[index][type + 'exp']);
    }

    console.log(obj);
    // alert(getDMY2(obj[type + 'exp']));
    // alert(val);

    // if (valume != "") {
    // $("#" + type + "exp" + index).val(getDMY2(obj[type + 'exp']));
    // } else {
    // $("#" + type + "exp" + index).val("");
    // }

}

function setDataModalSelectValue(elem = '', itemid, itemtext) {

    var select = $('#' + elem);
    option = new Option(itemtext, itemid, true, true);
    select.append(option).trigger('change');

}