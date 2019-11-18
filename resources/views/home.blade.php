@extends('../template')

@section('title','Home')
@section('page')
<div class="container shadow-lg">
    <br><br><br>
    <center><h3>Homepage</h3></center>
    <br>
    <div class="row">
       <div class="col" style="padding: 40px;">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Data peminjaman minggu ini</b></div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
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
            var uwu = Object.entries(response);
            console.log(uwu);
            uwu.forEach(function(data){
                tgl.push(data[0]);
                //Labels.push(data.stockName);
                total.push(parseInt(data[1]));
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