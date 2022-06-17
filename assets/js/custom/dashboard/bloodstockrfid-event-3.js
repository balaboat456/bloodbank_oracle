function loadModal3(state = false) {

    if (state)
        spinnershow();
    /* MORRIS DONUT CHART
			----------------------------------------*/

    $.ajax({
        url: 'data/dashboard/blooodstockrfid3.php',
        dataType: 'json',
        type: 'get',
        complete: function() {
            var delayInMilliseconds = 200;
            setTimeout(function() {
                spinnerhide();
            }, delayInMilliseconds);
        },
        success: function(data) {

            if (data.status) {

                data = JSON.parse(JSON.stringify(data).replace(/null/g, '""'));
                document.getElementById('modal2_door').innerHTML = "";
                document.getElementById('modalgatetotal').innerHTML = data.gatetotal + " ยูนิต";

                $.each(data.gatearray, function(inx, vl) {
                    $("#modal2_door").append('<a href="#modalgate' + vl + '" class="waves-effect waves-light btn"><i class="material-icons left">sensor_window</i>ตู้ที่ ' + vl + '</a>&nbsp;&nbsp;&nbsp;');
                });

                loadModalGate3(data.data);

            }

        },
        error: function(d) {
            /*console.log("error");*/

        }
    });


    /* MORRIS AREA CHART
    ----------------------------------------*/

}

function loadModalGate3(data) {


    document.getElementById('modaldatemain3').innerHTML = "";
    var event_data = '';
    $.each(data, function(inx, vl) {

        event_data += '<div id="modalgate' + vl.gateid + '" name="modalgate' + vl.gateid + '" class="col-md-12 col-sm-12 col-xs-12">';
        event_data += '    <div class="card">';
        event_data += '        <div class="card-action">';
        event_data += '            <b>ตู้ที่ ' + vl.gateid + '</b>';
        event_data += '        </div>';
        event_data += '        <div class="card-image">';
        event_data += '            <ul class="collection">';


        $.each(vl.data, function(index, value) {

            var amount = 0;
            var itemcount = 0;


            amount = parseInt(value.prc) + parseInt(value.lprc) + parseInt(value.lprc_o) + parseInt(value.ldprc) + parseInt(value.sdr) + parseInt(value.ldsdr) + parseInt(value.other);
            event_data += '                <li class="collection-item avatar">';

            if (value.bloodgroupname == "A") {
                event_data += '                    <img alt="alternative text" title="this will be displayed as a tooltip" class="circle" src="assets/images/blood_a.png" ';
                event_data += '                        style="height: 80px; width: 55px;margin-top: 8px;" /> ';
            } else if (value.bloodgroupname == "B") {
                event_data += '                    <img class="circle" src="assets/images/blood_b.png" ';
                event_data += '                        style="height: 80px; width: 55px;margin-top: 8px;" /> ';
            } else if (value.bloodgroupname == "O") {
                event_data += '                    <img class="circle" src="assets/images/blood_o.png" ';
                event_data += '                        style="height: 80px; width: 55px;margin-top: 8px;" /> ';
            } else if (value.bloodgroupname == "AB") {
                event_data += '                    <img class="circle" src="assets/images/blood_ab.png" ';
                event_data += '                        style="height: 80px; width: 55px;margin-top: 8px;" /> ';
            } else {
                event_data += '                    <img class="circle" src="assets/images/blood_other.png" ';
                event_data += '                        style="height: 80px; width: 55px;margin-top: 8px;" /> ';
            }


            event_data += '                   <div style="height: 65px;">';

            for (let i = 0; i < parseInt(value.prc); i++) {

                var itemcount_10 = Math.floor(itemcount / 10) * 65;

                console.log(itemcount_10);
                event_data += '                        <img class="circle" src="assets/images/bloodbag_prc.png" ';
                event_data += '                            style="height: 80px; width: 55px;margin-top: 8px;left: ' + (itemcount_10 + 100 + (itemcount * 15)) + 'px;" /> ';
                itemcount++;
            }

            for (let i = 0; i < parseInt(value.lprc); i++) {

                var itemcount_10 = Math.floor(itemcount / 10) * 65;
                event_data += '                        <img class="circle" src="assets/images/bloodbag_lprc.png" ';
                event_data += '                            style="height: 80px; width: 55px;margin-top: 8px;left: ' + (itemcount_10 + 100 + (itemcount * 15)) + 'px;" /> ';
                itemcount++;
            }

            for (let i = 0; i < parseInt(value.lprc_o); i++) {
                var itemcount_10 = Math.floor(itemcount / 10) * 65;
                event_data += '                        <img class="circle" src="assets/images/bloodbag_lprc_o.png" ';
                event_data += '                            style="height: 80px; width: 55px;margin-top: 8px;left: ' + (itemcount_10 + 100 + (itemcount * 15)) + 'px;" /> ';
                itemcount++;
            }

            for (let i = 0; i < parseInt(value.ldprc); i++) {
                var itemcount_10 = Math.floor(itemcount / 10) * 65;
                event_data += '                        <img class="circle" src="assets/images/bloodbag_ldprc.png" ';
                event_data += '                            style="height: 80px; width: 55px;margin-top: 8px;left: ' + (itemcount_10 + 100 + (itemcount * 15)) + 'px;" /> ';
                itemcount++;
            }

            for (let i = 0; i < parseInt(value.sdr); i++) {
                var itemcount_10 = Math.floor(itemcount / 10) * 65;
                event_data += '                        <img class="circle" src="assets/images/bloodbag_sdr.png" ';
                event_data += '                            style="height: 80px; width: 55px;margin-top: 8px;left: ' + (itemcount_10 + 100 + (itemcount * 15)) + 'px;" /> ';
                itemcount++;
            }

            for (let i = 0; i < parseInt(value.ldsdr); i++) {
                var itemcount_10 = Math.floor(itemcount / 10) * 65;
                event_data += '                        <img class="circle" src="assets/images/bloodbag_ldsdr.png" ';
                event_data += '                            style="height: 80px; width: 55px;margin-top: 8px;left: ' + (itemcount_10 + 100 + (itemcount * 15)) + 'px;" /> ';
                itemcount++;
            }

            for (let i = 0; i < parseInt(value.other); i++) {
                var itemcount_10 = Math.floor(itemcount / 10) * 65;
                event_data += '                        <img class="circle" src="assets/images/bloodbag_other.png" ';
                event_data += '                            style="height: 80px; width: 55px;margin-top: 8px;left: ' + (itemcount_10 + 100 + (itemcount * 15)) + 'px;" /> ';
                itemcount++;
            }

            event_data += '                    </div> ';
            event_data += '                    <div ';
            event_data += '                        style="height: 65px;right:0pxheight: 65px;right: 50px;position: absolute;margin-top: -45px;"> ';
            event_data += '                        <span class="title" style="font-size:60px;">' + amount + '</span> ';
            event_data += '                    </div>';
            event_data += '                </li>';

        });



        event_data += '            </ul>';
        event_data += '        </div>';
        event_data += '    </div>';

        event_data += '</div>';


    });

    $("#modaldatemain3").append(event_data);


}