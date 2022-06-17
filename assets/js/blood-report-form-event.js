function reportPrint() {
    var hn = ($('#hn').val()) ? $('#hn').val() : "0";
    var recid = ($('#type').val()) ? $('#type').val() : "0";

    var year = $('#year').val();
    var month = $('#month').val();

    var fromdate = dmyToymd2($('#fromdate').val());
    var todate = dmyToymd2($('#todate').val());


    var fromtime = $('#fromtime').val();
    var totime = $('#totime').val();

    var onedate = dmyToymd2($('#onedate').val());
    var onedateshow = $('#onedate').val();
    var fromyear = $('#fromyear').val();
    var toyear = $('#toyear').val();
    // var donation = $('input[name="donation"]:checked').val();
    var donation_status = $('#donation_status').val();
    var fromtodate = $('#fromdate').val() + " - " + $('#todate').val();
    var fromtodate2 = ($('#fromdate').val() == $('#todate').val()) ? $('#todate').val() : $('#fromdate').val() + " - " + $('#todate').val();
    var unitofficeid = ($('#unitofficeid').val()) ? $('#unitofficeid').val() : "0";
    var bloodgroupid = ($('#bloodgroupid').val()) ? $('#bloodgroupid').val() : "0";
    var unitnameid = ($('#unitnameid').val()) ? $('#unitnameid').val() : "0";
    var departmentid = ($('#departmentid').val()) ? $('#departmentid').val() : "0";
    var rhid = ($('#rhid').val()) ? $('#rhid').val() : "0";
    var hospitalid = ($('#hospitalid').val()) ? $('#hospitalid').val() : "x";
    var activityid = ($('#activityid').val()) ? $('#activityid').val() : "0";
    var yearmonth = year + '-' + (($('#month').val()) ? $('#month').val() : "00");
    var yearmonthfull = monthtext + ' ' + year;

    var donation_status1 = document.getElementById("donate1").checked;
    var donation_status2 = document.getElementById("donate2").checked;

    var bloodstocktypegroupid = $("#bloodtypegroupid").val();

    var donation_status = 0;
    if (donation_status1 == true) {
        donation_status = 1;
    } else if (donation_status2 == true) {
        donation_status = 2;
    }

    var donation_status12 = document.getElementById("donate12").checked;
    var donation_status22 = document.getElementById("donate22").checked;

    var donation_status32 = 0;
    if (donation_status12 == true) {
        donation_status32 = 1;
    } else if (donation_status22 == true) {
        donation_status32 = 2;
    }

    // var namepatient = document.getElementById("namepatient").value;
    var namepatient = ($('#namepatient').val()) ? $('#namepatient').val() : "0";

    var usercreate = ($('#usercreate').val()) ? $('#usercreate').val() : "0";

    var fromtoyear = toyear;
    if (fromyear != toyear)
        fromtoyear = fromyear + " - " + toyear;

    var fromdatetime = fromdate + ' ' + fromtime;
    var todatetime = todate + ' ' + totime;

    var fromtodatetime = $('#fromdate').val() + ' ' + fromtime + ' - ' + $('#todate').val() + ' ' + totime;

    var infected = "1";
    if (document.getElementById("infected2").checked)
        infected = "2";

    var placeid = "0";
    if (document.getElementById("placeid1").checked)
        placeid = "1";
    else if (document.getElementById("placeid2").checked)
        placeid = "2";
    else if (document.getElementById("placeid3").checked)
        placeid = "3";

    var donation = "0";
    if (document.getElementById("donate12").checked)
        donation = "1";
    else if (document.getElementById("donate22").checked)
        donation = "2";

    if (report == 1) {

    } else if (report == 2) {
        printJS({
            printable: localurl + "/report/report-danate-02-blood-sample-send-center.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 3) {
        printJS({
            printable: localurl + "/report/report-danate-03-blood-donation-list-instead-of-relatives.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
                "&bloodgroupid=" + bloodgroupid + "&donation=" + donation + "&namepatient=" + namepatient,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 4) {

        if ($('#infected1').prop('checked') == true) {
            printJS({
                printable: localurl + "/report/report-danate-04-blood-donation-infected-person-normal.php?fromdate=" +
                    fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
                    "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
                    "&unitnameid=" + unitnameid + "&activityid=" + activityid,
                type: 'pdf',
                showModal: true
            });

        } else {
            printJS({
                printable: localurl + "/report/report-danate-04-blood-donation-infected-person.php?fromdate=" +
                    fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
                    "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
                    "&unitnameid=" + unitnameid + "&activityid=" + activityid,
                type: 'pdf',
                showModal: true
            });

        }

    } else if (report == 5) {
        printJS({
            printable: localurl + "/report/report-danate-05-request-card-center.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
                "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
                "&unitnameid=" + unitnameid + "&activityid=" + activityid,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 6) {
        printJS({
            printable: localurl + "/report/report-danate-06-statistic-of-sdp.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 9) {
        printJS({
            printable: localurl + "/report/report-danate-09-platelet-donation-room-statistics.php?fromyear=" +
                fromyear + "&toyear=" + toyear + "&fromtoyear=" + fromtoyear,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 10) {
        printJS({
            printable: localurl + "/report/report-danate-10-blood-transfusion-statistics.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&hospitalid=" + hospitalid,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 11) {
        var unitnameid = document.getElementById("unitnameid").value;
        if (unitnameid == '') {
            unitnameid = 0;
        }
        var bloodgroupid = document.getElementById("bloodgroupid").value;
        if (bloodgroupid == '') {
            bloodgroupid = 0;
        }
        var rhid = document.getElementById("rhid").value;
        if (rhid == '') {
            rhid = 0;
        }
        var activityid = document.getElementById("activityid").value;
        if (activityid == '') {
            activityid = 0;
        }
        printJS({
            printable: localurl + "/report/report-danate-11-blood-collection.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&unitofficeid=" + unitofficeid +
                "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
                "&rhid=" + rhid + "&unitnameid=" + unitnameid + "&activityid=" + activityid + "&donation_status=" + donation_status,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 12) {
        printJS({
            printable: localurl + "/report/report-danate-12-platelet-conc-and-sdp-for-lab.php?onedate=" +
                onedate + "&onedateshow=" + onedateshow,
            type: 'pdf',
            showModal: true
        });

    } else if (report == 13) {
        printJS({ printable: localurl + "/report/report-danate-13-statistics-of-blood-bags-waiting-to-be-collected.php?yearmonth=" + yearmonth + "&hospitalid=" + hospitalid + '&yearmonthfull=' + yearmonthfull, type: 'pdf', showModal: true });

    } else if (report == 14) {
        printJS({
            printable: localurl + "/report/report-danate-14-people-who-cannot-donate-blood2.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&unitofficeid=" + unitofficeid +
                "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
                "&unitnameid=" + unitnameid + "&activityid=" + activityid,
            type: 'pdf',
            showModal: true
        });

    } else if (report == 15) {

        var rhidxx = ($('#rhid').val()) ? $('#rhid').val() : "0";
        printJS({
            printable: localurl + "/report/report-danate-15-people-who-donate-blood.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&unitofficeid=" + unitofficeid +
                "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
                "&rhid=" + rhidxx + "&unitnameid=" + unitnameid + "&activityid=" + activityid,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 16) {
        printJS({
            printable: localurl + "/report/report-danate-16-donation-staff.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
                "&bloodgroupid=" + bloodgroupid + "&departmentid=" + departmentid + "&rhid=" + rhid + "&donation_status=" + donation_status32,
            type: 'pdf',
            showModal: true
        });

    } else if (report == 17) {
        printJS({
            printable: localurl + "/report/report-danate-17-reasons-for-not-being-able-to-donate-blood.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 18) {
        printJS({
            printable: localurl + "/report/report-danate-18-donation-activity.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 19) {
        printJS({
            printable: localurl + "/report/report-danate-19-interruption-problems-from-accepting-donations.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 20) {
        printJS({
            printable: localurl + "/report/report-danate-20-after-donation-reaction.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 21) {
        printJS({
            printable: localurl + "/report/report-summary-blood-request-patient-cancel.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 22) {
        printJS({
            printable: localurl + "/report/report-summary-blood-request-patient-cancel.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 23) {
        printReportModal(localurl + "/report/blood-stock-exp.php?yearmonth=" + yearmonth + '&yearmonthfull=' + yearmonthfull);

    } else if (report == 26 && reportsub == 1) {
        printReportModal(localurl + "/report/report-summarize-blood-letting.php?fromdatetime=" + fromdatetime + '&todatetime=' + todatetime + '&fromtodatetime=' + fromtodatetime + '&usercreate=' + usercreate);
    } else if (report == 26 && reportsub == 2) {
        printReportModal(localurl + "/report/report-summarize-blood-exchange.php?fromdatetime=" + fromdatetime + '&todatetime=' + todatetime + '&fromtodatetime=' + fromtodatetime + '&usercreate=' + usercreate);
    } else if (report == 26 && reportsub == 3) {
        printReportModal(localurl + "/report/report-summarize-blood-washed-red-cell.php?fromdatetime=" + fromdatetime + '&todatetime=' + todatetime + '&fromtodatetime=' + fromtodatetime + '&usercreate=' + usercreate);
    } else if (report == 26 && reportsub == 4) {
        printReportModal(localurl + "/report/report-summarize-blood-serum-tear.php?fromdatetime=" + fromdatetime + '&todatetime=' + todatetime + '&fromtodatetime=' + fromtodatetime + '&usercreate=' + usercreate);
    } else if (report == 28) {
        printJS(localurl + "/report/report-request-donation-certificate.php?fromdate=" + fromdate + '&todate=' + todate);
    } else if (report == 29) {
        printReportModal(localurl + "/report/statistic-blood-pay-of-year.php?year=" + year+'&bloodstocktypegroupid='+bloodstocktypegroupid);
    } else if (report == 30) {
        printReportModal(localurl + "/report/statistic-crossmatch-of-year.php?year=" + year);
    } else if (report == 27) {
        printJS({
            printable: localurl + "/report/report-danate-27-blood-incident.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 31) {
        printJS({
            printable: localurl + "/report/report-danate-31-blood-special.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate +
                "&hn=" + hn + "&recid=" + recid,
            type: 'pdf',
            showModal: true
        });
    } else if (report == 32) {
        printReportModal(localurl + "/report/report-number38.php?yearmonth=" + yearmonth + '&yearmonthfull=' + yearmonthfull);
    }
}

function reportPrintExCel() {
    var hn = ($('#hn').val()) ? $('#hn').val() : "0";
    var recid = ($('#type').val()) ? $('#type').val() : "0";

    var year = $('#year').val();
    var fromdate = dmyToymd2($('#fromdate').val());
    var todate = dmyToymd2($('#todate').val());
    var onedate = dmyToymd2($('#onedate').val());
    var onedateshow = $('#onedate').val();
    var donation_status = $('#donation_status').val();
    var fromyear = $('#fromyear').val();
    var toyear = $('#toyear').val();
    var fromtodate = $('#fromdate').val() + " - " + $('#todate').val();
    var fromtodate2 = ($('#fromdate').val() == $('#todate').val()) ? $('#todate').val() : $('#fromdate').val() + " - " + $('#todate').val();
    var unitofficeid = ($('#unitofficeid').val()) ? $('#unitofficeid').val() : "0";
    var bloodgroupid = ($('#bloodgroupid').val()) ? $('#bloodgroupid').val() : "0";
    var unitnameid = ($('#unitnameid').val()) ? $('#unitnameid').val() : "0";
    var departmentid = ($('#departmentid').val()) ? $('#departmentid').val() : "0";
    var rhid = ($('#rhid').val()) ? $('#rhid').val() : "0";
    var hospitalid = ($('#hospitalid').val()) ? $('#hospitalid').val() : "x";
    var activityid = ($('#activityid').val()) ? $('#activityid').val() : "0";
    var fromtoyear = toyear;
    if (fromyear != toyear)
        fromtoyear = fromyear + " - " + toyear;

    var yearmonth = year + '-' + (($('#month').val()) ? $('#month').val() : "00");
    var yearmonthfull = monthtext + ' ' + year;


    var donation_status1 = document.getElementById("donate1").checked;
    var donation_status2 = document.getElementById("donate2").checked;


    var donation_status = 0;
    if (donation_status1 == true) {
        donation_status = 1;
    } else if (donation_status2 == true) {
        donation_status = 2;
    }

    var donation_status12 = document.getElementById("donate12").checked;
    var donation_status22 = document.getElementById("donate22").checked;

    var donation_status32 = 0;
    if (donation_status12 == true) {
        donation_status32 = 1;
    } else if (donation_status22 == true) {
        donation_status32 = 2;
    }

    var namepatient = ($('#namepatient').val()) ? $('#namepatient').val() : "0";


    var infected = "1";
    if (document.getElementById("infected2").checked)
        infected = "2";

    var placeid = "0";
    if (document.getElementById("placeid1").checked)
        placeid = "1";
    else if (document.getElementById("placeid2").checked)
        placeid = "2";
    else if (document.getElementById("placeid3").checked)
        placeid = "3";

    var donation = "0";
    if (document.getElementById("donate12").checked)
        donation = "1";
    else if (document.getElementById("donate22").checked)
        donation = "2";

    var fromdate = dmyToymd2($('#fromdate').val());
    var todate = dmyToymd2($('#todate').val());

    var fromtime = $('#fromtime').val();
    var totime = $('#totime').val();

    var usercreate = ($('#usercreate').val()) ? $('#usercreate').val() : "0";

    var fromdatetime = fromdate + ' ' + fromtime;
    var todatetime = todate + ' ' + totime;

    var fromtodatetime = $('#fromdate').val() + ' ' + fromtime + ' - ' + $('#todate').val() + ' ' + totime;

    var in_time = (document.getElementById("in_time").checked) ? 1 : 0;
    var out_time = (document.getElementById("out_time").checked) ? 1 : 0;

    if (report == 1) {

    } else if (report == 2) {
        printReportModal(localurl + "/report/report-danate-02-blood-sample-send-center.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate);
    } else if (report == 3) {
        // alert(namepatient);
        window.open(localurl + "/report/report-danate-03-blood-donation-list-instead-of-relatives-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
            "&bloodgroupid=" + bloodgroupid + "&donation=" + donation + "&namepatient=" + namepatient);
    } else if (report == 4) {
        if ($('#infected1').prop('checked') == true) {
            window.open(localurl + "/report/report-danate-04-blood-donation-infected-person-normal-excel.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
                "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
                "&unitnameid=" + unitnameid + "&activityid=" + activityid);
        } else {
            window.open(localurl + "/report/report-danate-04-blood-donation-infected-person-excel.php?fromdate=" +
                fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
                "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
                "&unitnameid=" + unitnameid + "&activityid=" + activityid);
        }
        // printReportModal(localurl + "/report/report-danate-04-blood-donation-infected-person.php?fromdate=" +
        //     fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
        //     "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
        //     "&unitnameid=" + unitnameid);
    } else if (report == 5) {
        window.open(localurl + "/report/report-danate-05-request-card-center-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
            "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
            "&unitnameid=" + unitnameid);
    } else if (report == 6) {
        window.open(localurl + "/report/report-danate-06-statistic-of-sdp-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate);

    } else if (report == 9) {
        printReportModal(localurl + "/report/report-danate-09-platelet-donation-room-statistics.php?fromyear=" +
            fromyear + "&toyear=" + toyear + "&fromtoyear=" + fromtoyear);
    } else if (report == 10) {
        window.open(localurl + "/report/report-danate-10-blood-transfusion-statistics-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&hospitalid=" + hospitalid);
    } else if (report == 11) {
        window.open(localurl + "/report/report-danate-11-blood-collection-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&unitofficeid=" + unitofficeid +
            "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
            "&donation_status=" + donation_status + "&unitnameid=" + unitnameid + "&activityid=" + activityid);
    } else if (report == 12) {
        printReportModal(localurl + "/report/report-danate-12-platelet-conc-and-sdp-for-lab.php?onedate=" +
            onedate + "&onedateshow=" + onedateshow);
    } else if (report == 13) {
        window.open(localurl + "/report/report-danate-13-statistics-of-blood-bags-waiting-to-be-collected-excel.php?yearmonth=" + yearmonth + "&hospitalid=" + hospitalid + '&yearmonthfull=' + yearmonthfull);
    } else if (report == 14) {
        window.open(localurl + "/report/report-danate-14-people-who-cannot-donate-blood-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&unitofficeid=" + unitofficeid +
            "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
            "&unitnameid=" + unitnameid + "&activityid=" + activityid);
    } else if (report == 15) {
        window.open(localurl + "/report/report-danate-15-people-who-donate-blood-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 + "&unitofficeid=" + unitofficeid +
            "&bloodgroupid=" + bloodgroupid + "&infected=" + infected + "&placeid=" + placeid +
            "&rhid=" + rhid + "&unitnameid=" + unitnameid + "&activityid=" + activityid);
    } else if (report == 16) {
        window.open(localurl + "/report/report-danate-16-donation-staff-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate + "&unitofficeid=" + unitofficeid +
            "&bloodgroupid=" + bloodgroupid + "&departmentid=" + departmentid + "&rhid=" + rhid + "&donation_status=" + donation_status32);
    } else if (report == 17) {
        window.open(localurl + "/report/report-danate-17-reasons-for-not-being-able-to-donate-blood-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate);
    } else if (report == 18) {
        window.open(localurl + "/report/report-danate-18-donation-activity-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate);
    } else if (report == 19) {
        printReportModal(localurl + "/report/report-danate-19-interruption-problems-from-accepting-donations.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate);
    } else if (report == 20) {
        printReportModal(localurl + "/report/report-danate-20-after-donation-reaction.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate);
    } else if (report == 24) {
        window.open(localurl + "/report/report-blood-exchange-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2);
    } else if (report == 25) {
        window.open(localurl + "/report/report-cross-match-kpi-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate2 +
            "&in_time=" + in_time + "&out_time=" + out_time + "&fromtime=" +
            fromtime + "&totime=" + totime);
    } else if (report == 26 && reportsub == 1) {
        window.open(localurl + "/report/report-summarize-blood-letting-excel.php?fromdatetime=" + fromdatetime + '&todatetime=' + todatetime + '&fromtodatetime=' + fromtodatetime + '&usercreate=' + usercreate);
    } else if (report == 26 && reportsub == 2) {
        window.open(localurl + "/report/report-summarize-blood-exchange-excel.php?fromdatetime=" + fromdatetime + '&todatetime=' + todatetime + '&fromtodatetime=' + fromtodatetime + '&usercreate=' + usercreate);
    } else if (report == 26 && reportsub == 3) {
        window.open(localurl + "/report/report-summarize-blood-washed-red-cell-excel.php?fromdatetime=" + fromdatetime + '&todatetime=' + todatetime + '&fromtodatetime=' + fromtodatetime + '&usercreate=' + usercreate);
    } else if (report == 26 && reportsub == 4) {
        window.open(localurl + "/report/report-summarize-blood-serum-tear-excel.php?fromdatetime=" + fromdatetime + '&todatetime=' + todatetime + '&fromtodatetime=' + fromtodatetime + '&usercreate=' + usercreate);
    } else if (report == 28) {
        window.open(localurl + "/report/report-request-donation-certificate-excel.php?fromdate=" + fromdate + '&todate=' + todate);
    } else if (report == 27) {
        window.open(localurl + "/report/report-danate-27-blood-incident-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate);
    } else if (report == 31) {
        window.open(localurl + "/report/report-danate-31-blood-special-excel.php?fromdate=" +
            fromdate + "&todate=" + todate + "&fromtodate=" + fromtodate +
            "&hn=" + hn + "&recid=" + recid);
    }



}

function printreport2(id) {
    // var id = $("#bloodstockmainid").val();

    // var id = $('#donateid').val();
    // console.log(id);
    printReportModal(localurl + "/report/blood-donate-accident.php?id=" + id);

}

function printreport3(id) {
    // var id = $("#bloodstockmainid").val();

    // var id = $('#donateid').val();
    // console.log(id);
    printReportModal(localurl + "/report/blood-donate-accident.php?id=" + id);

}

function setBtnExcel() {
    if (report == 6 || report == 11 || report == 14 || report == 17 || report == 24 || report == 25 || report == 4) {
        document.getElementById("reportPrintExCel").style.visibility = "visible";
    }
}

function setBtnPdfHidden() {
    if (report == 24 || report == 25) {
        document.getElementById("reportPrintPdf").style.visibility = "hidden";
    }
}

function printReportModal(pdfpath = "") {
    printJS({
        printable: pdfpath,
        type: 'pdf',
        showModal: true
    });
}

function checkBox(v) {
    if (v.previous) {
        v.checked = false;
    }
    v.previous = v.checked;
}