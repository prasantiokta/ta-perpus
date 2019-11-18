@extends('../template')

@section('title','Home')
@section('page')
<div class="container shadow-lg">
    <br><br><br>
    <h3>Homepage</h3>
    <br>
    <div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-heading"><b>Charts</b></div>
               <div class="panel-body">
                   <canvas id="canvas" height="280" width="600"></canvas>
               </div>
           </div>
       </div>
    </div>
    <br><br><br>
</div>

<script>
        var url = "{{url('/chart')}}";
        var tgl = new Array();
        //var Labels = new Array();
        var total = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            console.log(response);
            response.forEach(function(data){
                tgl.push(data.order_date);
                //Labels.push(data.stockName);
                total.push(data.total_order);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:tgl,
                      datasets: [{
                          label: 'Total Peminjaman',
                          data: total,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
         
         
            });
            
        });
        
        </script>
@endsection