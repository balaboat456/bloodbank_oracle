function loadModal2() {

    document.getElementById("modal2-morris-donut-chart").innerHTML = "";
    document.getElementById("modal2_legend").innerHTML = "";

    $('#modal2').modal();
    $('#modal2').modal('open'); 
    spinnershow();


     /* MORRIS DONUT CHART
			----------------------------------------*/


          $.ajax({
              url: 'data/dashboard/blooodstockrfid2.php',
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

                    var browsersChart = Morris.Donut({
                        element: 'modal2-morris-donut-chart',
                        data: data.data3,
                                            colors: [
                                '#FFE440','#F15BB5','#00BBF9' ,'#9B5DE5','#00F5B4','#66D2D6' ,'#C0C0C0'
                            ],
                        resize: true
                    });
        
                    browsersChart.options.data.forEach(function(label, i) {
                        var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " ยูนิต )" ).prepend('<br><span>&nbsp;</span>');
                        legendItem.find('span')
                        .css('backgroundColor', browsersChart.options.colors[i])
                        .css('width', '20px')
                        .css('display', 'inline-block')
                        .css('margin', '5px');
                        $('#modal2_legend').append(legendItem)
                    });


                    document.getElementById('modal2total1').innerHTML = data.total1 + " ยูนิต";

                    document.getElementById('modal2_prc').innerHTML = data.data2.prc + " ยูนิต";
                    document.getElementById('modal2_lprc').innerHTML = data.data2.lprc + " ยูนิต";
                    document.getElementById('modal2_lprc_o').innerHTML = data.data2.lprc_o + " ยูนิต";
                    document.getElementById('modal2_ldprc').innerHTML = data.data2.ldprc + " ยูนิต";

                    document.getElementById('modal2_sdr').innerHTML = data.data2.sdr + " ยูนิต";
                    document.getElementById('modal2_ldsdr').innerHTML = data.data2.ldsdr + " ยูนิต";
                    document.getElementById('modal2_pc').innerHTML = data.data2.pc + " ยูนิต";
                    document.getElementById('modal2_lppc').innerHTML = data.data2.lppc + " ยูนิต";

                    document.getElementById('modal2_lppc_pas').innerHTML = data.data2.lppc_pas + " ยูนิต";
                    document.getElementById('modal2_ldppc').innerHTML = data.data2.ldppc + " ยูนิต";
                    document.getElementById('modal2_sdp').innerHTML = data.data2.sdp + " ยูนิต";
                    document.getElementById('modal2_sdp_pas').innerHTML = data.data2.sdp_pas + " ยูนิต";

                    document.getElementById('modal2_ffp').innerHTML = data.data2.ffp + " ยูนิต";
                    document.getElementById('modal2_crp').innerHTML = data.data2.crp + " ยูนิต";
                    document.getElementById('modal2_cryo').innerHTML = data.data2.cryo + " ยูนิต";
                    document.getElementById('modal2_htfdc').innerHTML = data.data2.htfdc + " ยูนิต";
                    
                    document.getElementById('modal2_wb').innerHTML = data.data2.wb + " ยูนิต";
                       
                    // Stock2_3('list_table_stock2', data.data2);
                    // Stock2_3('list_table_stock3', data.data3);
                    // Stock4('list_table_stock4', data.data4);
                      
                  }

              },
              error: function(d) {
                  /*console.log("error");*/
                  
              }
          });
      
          /* MORRIS AREA CHART
          ----------------------------------------*/

}


function Stock2_3(eid = '', data) {


    var body = document.getElementById(eid).getElementsByTagName(
        'tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';
    var prc = 0;
    var lprc = 0;
    var lprc_o = 0;
    var ldprc = 0;
    var ffp = 0;
    var pc = 0;
    var sdp = 0;
    var sdp_pas = 0;
    var sdr = 0;
    var wb = 0;
    var lppc = 0;
    var lppc_pas = 0;
    var cryo = 0;
    var amount = 0;
    var amountItem = 0;

    var prc2 = 0;
    var lprc2 = 0;
    var lprc_o2 = 0;
    var ldprc2 = 0;
    var ffp2 = 0;
    var pc2 = 0;
    var sdp2 = 0;
    var sdp_pas2 = 0;
    var sdr2 = 0;
    var wb2 = 0;
    var lppc2 = 0;
    var lppc_pas2 = 0;
    var cryo2 = 0;
    var amount2 = 0;
    var amountItem2 = 0;
    $.each(data, function(index, value) {
        amountItem = parseInt(value.prc) + parseInt(value.lprc)+ parseInt(value.lprc_o) + parseInt(value.ldprc) + 
            parseInt(value.ffp) + parseInt(value.pc) + parseInt(value.sdp) +
            parseInt(value.sdr) + parseInt(value.wb) + parseInt(value.lppc) +
            parseInt(value.lppc_pas) + parseInt(value.sdp_pas);
        // parseInt(value.cryo) + parseInt(value.lppc_pas) + parseInt(value.sdp_pas);

        amountItem2 = parseInt(value.prc2) + parseInt(value.lprc2)+ parseInt(value.lprc_o2) + parseInt(value.ldprc2) +
            parseInt(value.ffp2) + parseInt(value.pc2) + parseInt(value.sdp2) +
            parseInt(value.sdr2) + parseInt(value.wb2) + parseInt(value.lppc2) +
            parseInt(value.lppc_pas2) + parseInt(value.sdp_pas2);
        // parseInt(value.cryo2) + parseInt(value.lppc_pas2) + parseInt(value.sdp_pas2);
        event_data += '<tr>';
        event_data += '<td>' + value.bloodgroupname + '</td>';
        event_data += '<td>' + ((value.prc > 0) ? value.prc : '-') + '</td>';
        event_data += '<td>' + ((value.lprc > 0) ? value.lprc : '-') + '</td>';
        event_data += '<td>' + ((value.lprc_o > 0) ? value.lprc_o : '-') + '</td>';
        event_data += '<td>' + ((value.ffp > 0) ? value.ffp : '-') + '</td>';
        event_data += '<td>' + ((value.pc > 0) ? value.pc : '-') + '</td>';
        event_data += '<td>' + ((value.lppc > 0) ? value.lppc : '-') + '</td>';
        event_data += '<td>' + ((value.lppc_pas > 0) ? value.lppc_pas : '-') + '</td>';
        event_data += '<td>' + ((value.sdp > 0) ? value.sdp : '-') + '</td>';
        event_data += '<td>' + ((value.sdp_pas > 0) ? value.sdp_pas : '-') + '</td>';
        event_data += '<td>' + ((value.wb > 0) ? value.wb : '-') + '</td>';
        event_data += '<td>' + ((value.ldprc > 0) ? value.ldprc : '-') + '</td>';
        event_data += '<td>' + ((value.sdr > 0) ? value.sdr : '-') + '</td>';
        event_data += '<td><b>' + amountItem + '</b></td>';
        // event_data += '<td>' + ((value.cryo > 0) ? value.cryo : '-') + '</td>';
        


        event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';

        event_data += '<td>' + ((value.prc2 > 0) ? value.prc2 : '-') + '</td>';
        event_data += '<td>' + ((value.lprc2 > 0) ? value.lprc2 : '-') + '</td>';
        event_data += '<td>' + ((value.lprc_o2 > 0) ? value.lprc_o2 : '-') + '</td>';
        event_data += '<td>' + ((value.ffp2 > 0) ? value.ffp2 : '-') + '</td>';
        event_data += '<td>' + ((value.pc2 > 0) ? value.pc2 : '-') + '</td>';
        event_data += '<td>' + ((value.lppc2 > 0) ? value.lppc2 : '-') + '</td>';
        event_data += '<td>' + ((value.lppc_pas2 > 0) ? value.lppc_pas2 : '-') + '</td>';
        event_data += '<td>' + ((value.sdp2 > 0) ? value.sdp2 : '-') + '</td>';
        event_data += '<td>' + ((value.sdp_pas2 > 0) ? value.sdp_pas2 : '-') + '</td>';
        event_data += '<td>' + ((value.wb2 > 0) ? value.wb2 : '-') + '</td>';
        event_data += '<td>' + ((value.ldprc2 > 0) ? value.ldprc2 : '-') + '</td>';
        event_data += '<td>' + ((value.sdr2 > 0) ? value.sdr2 : '-') + '</td>';
        event_data += '<td><b>' + amountItem2 + '</b></td>';
        // event_data += '<td>' + ((value.cryo2 > 0) ? value.cryo2 : '-') + '</td>';
        


        event_data += '</tr>';

        prc += parseInt(value.prc);
        lprc += parseInt(value.lprc);
        lprc_o += parseInt(value.lprc_o);
        ldprc += parseInt(value.ldprc);
        ffp += parseInt(value.ffp);
        pc += parseInt(value.pc);
        sdp += parseInt(value.sdp);
        sdp_pas += parseInt(value.sdp_pas);
        sdr += parseInt(value.sdr);
        wb += parseInt(value.wb);
        lppc += parseInt(value.lppc);
        lppc_pas += parseInt(value.lppc_pas);
        cryo += parseInt(value.cryo);
        amount += parseInt(amountItem);

        prc2 += parseInt(value.prc2);
        lprc2 += parseInt(value.lprc2);
        ldprc2 += parseInt(value.ldprc2);
        ffp2 += parseInt(value.ffp2);
        pc2 += parseInt(value.pc2);
        sdp2 += parseInt(value.sdp2);
        sdp_pas2 += parseInt(value.sdp_pas2);
        sdr2 += parseInt(value.sdr2);
        wb2 += parseInt(value.wb2);
        lppc2 += parseInt(value.lppc2);
        lppc_pas2 += parseInt(value.lppc_pas2);
        cryo2 += parseInt(value.cryo2);
        amount2 += parseInt(amountItem2);

    });
    event_data += '<tr>';
    event_data += '<td><b>' + 'รวม' + '</b></td>';
    event_data += '<td><b>' + prc + '</b></td>';
    event_data += '<td><b>' + lprc + '</b></td>';
    event_data += '<td><b>' + lprc_o + '</b></td>';
    event_data += '<td><b>' + ffp + '</b></td>';
    event_data += '<td><b>' + pc + '</b></td>';
    event_data += '<td><b>' + lppc + '</b></td>';
    event_data += '<td><b>' + lppc_pas + '</b></td>';
    event_data += '<td><b>' + sdp + '</b></td>';
    event_data += '<td><b>' + sdp_pas + '</b></td>';
    event_data += '<td><b>' + wb + '</b></td>';
    event_data += '<td><b>' + ldprc + '</b></td>';
    event_data += '<td><b>' + sdr + '</b></td>';
    event_data += '<td><b>' + amount + '</b></td>';
    // event_data += '<td><b>' + cryo + '</b></td>';

    event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';

    event_data += '<td><b>' + prc2 + '</b></td>';
    event_data += '<td><b>' + lprc2 + '</b></td>';
    event_data += '<td><b>' + lprc_o2 + '</b></td>';
    event_data += '<td><b>' + ffp2 + '</b></td>';
    event_data += '<td><b>' + pc2 + '</b></td>';
    event_data += '<td><b>' + lppc2 + '</b></td>';
    event_data += '<td><b>' + lppc_pas2 + '</b></td>';
    event_data += '<td><b>' + sdp2 + '</b></td>';
    event_data += '<td><b>' + sdp_pas2 + '</b></td>';
    event_data += '<td><b>' + wb2 + '</b></td>';
    event_data += '<td><b>' + ldprc2 + '</b></td>';
    event_data += '<td><b>' + sdr2 + '</b></td>';
    event_data += '<td><b>' + amount2 + '</b></td>';
    // event_data += '<td><b>' + cryo2 + '</b></td>';
    event_data += '</tr>';
    $('#' + eid).append(event_data);

}

function Stock4(eid = '', data) {


    var body = document.getElementById(eid).getElementsByTagName(
        'tbody')[0];
    while (body.firstChild) {
        body.removeChild(body.firstChild);
    }

    var event_data = '';
    $.each(data, function(index, value) {
        event_data += '<tr>';
        event_data += '<td><b>' + value.cryo + '</b></td>';
        event_data += '<td style="width:1px;border: #FFF;background: #333;"></td>';
        event_data += '<td><b>' + value.cryo2 + '</b></td>';
        event_data += '</tr>';
    });
   
    

    event_data += '</tr>';
    $('#' + eid).append(event_data);

}


