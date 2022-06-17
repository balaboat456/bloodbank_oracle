function loadModal4() {

    document.getElementById("morris-bar-chart").innerHTML = "";
    document.getElementById("modal4-morris-donut-chart").innerHTML = "";
    document.getElementById("modal4_legend").innerHTML = "";
    $('#modal4').modal();
    $('#modal4').modal('open'); 
    spinnershow();

     /* MORRIS DONUT CHART
			----------------------------------------*/

            var mm = $("#modal_month_4").val();
			var yyyy = $("#modal_year_4").val();

          $.ajax({
              url: 'data/dashboard/blooodstockrfid4.php?month='+mm+'&year='+yyyy,
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

                        document.getElementById('modal4total1').innerHTML = data.total1 + " ยูนิต";
                        document.getElementById('modal4total2').innerHTML = data.total2 + " ยูนิต";
                        document.getElementById('modal4total3').innerHTML = data.total3 + " ยูนิต";
                        document.getElementById('modal4total4').innerHTML = data.total4 + " ยูนิต";

                         Morris.Bar({
                            element: 'morris-bar-chart',
                            data: data.data,
                            xkey: 'y',
                            ykeys: ['a', 'b'],
                            labels: ['CROSSMATCH', 'จ่ายโลหิต'],
                            barColors: [
                                '#e91e63','#30cc7b','#30cc7b' 
                            ],
                            hideHover: 'auto',
                            resize: true
                        });
                    

                        var browsersChart = Morris.Donut({
                            element: 'modal4-morris-donut-chart',
                            data: data.data2,
                                                colors: [
                                    '#FFE440','#F15BB5','#00BBF9' ,'#9B5DE5','#00F5B4','#66D2D6'  ,'#C0C0C0'
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
                            $('#modal4_legend').append(legendItem)
                        });
                    
                      
                  }

              },
              error: function(d) {
                
              }
          });

          $('select').material_select();

  
        document.getElementsByClassName('caret')[2].innerHTML = "";
        document.getElementsByClassName('caret')[3].innerHTML = "";

    
      
          /* MORRIS AREA CHART
          ----------------------------------------*/

}


