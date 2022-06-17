function loadModal1() {

    document.getElementById("legend").innerHTML = "";
    document.getElementById("morris-donut-chart").innerHTML = "";

    $('#modal1').modal();
    $('#modal1').modal('open'); 
    spinnershow();

     /* MORRIS DONUT CHART
			----------------------------------------*/
			var mm = $("#modal_month_1").val();
			var yyyy = $("#modal_year_1").val();

          $.ajax({
              url: 'data/dashboard/blooodstockrfid1.php?month='+mm+'&year='+yyyy,
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

                      document.getElementById('modaldonatedatetotal').innerHTML = data.donatedatetotal + " คน";
                      document.getElementById('modaldonatemonthtotal').innerHTML = data.donatemonthotal + " คน";

                      var Data= data.donatemonthcartotal ;
        
                    var browsersChart = Morris.Donut({
                        element: 'morris-donut-chart',
                        data: Data,
                                            colors: [
                                '#FFE440','#F15BB5','#00BBF9' ,'#9B5DE5','#00F5B4','#bcaaa4' 
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
                        $('#legend').append(legendItem)
                    });

            

                    document.getElementById('modal1_prc').innerHTML = data.donatemonthtypetotal[0].prc + " ยูนิต";
                    document.getElementById('modal1_lprc').innerHTML = data.donatemonthtypetotal[0].lprc + " ยูนิต";
                    document.getElementById('modal1_ldprc').innerHTML = data.donatemonthtypetotal[0].ldprc + " ยูนิต";
                    document.getElementById('modal1_ffp').innerHTML = data.donatemonthtypetotal[0].ffp + " ยูนิต";
                    document.getElementById('modal1_pc').innerHTML = data.donatemonthtypetotal[0].pc + " ยูนิต";
                    document.getElementById('modal1_lppc').innerHTML = data.donatemonthtypetotal[0].lppc + " ยูนิต";
                    document.getElementById('modal1_lppc_pas').innerHTML = data.donatemonthtypetotal[0].lppc_pas + " ยูนิต";
                    document.getElementById('modal1_sdp').innerHTML = data.donatemonthtypetotal[0].sdp + " ยูนิต";
                    document.getElementById('modal1_sdp_pas').innerHTML = data.donatemonthtypetotal[0].sdp_pas + " ยูนิต";
                    document.getElementById('modal1_sdr').innerHTML = data.donatemonthtypetotal[0].sdr + " ยูนิต";
                    document.getElementById('modal1_wb').innerHTML = data.donatemonthtypetotal[0].wb + " ยูนิต";
                      
                  }

              },
              error: function(d) {
                  
              }
          });



         

            $('select').material_select();

  
            document.getElementsByClassName('caret')[0].innerHTML = "";
            document.getElementsByClassName('caret')[1].innerHTML = "";
      

          /* MORRIS AREA CHART
          ----------------------------------------*/

}
