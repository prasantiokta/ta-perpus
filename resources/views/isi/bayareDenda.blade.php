@extends('../template')

@section('title','Pembayaran Denda')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">Pembayaran Denda</h3>
        <hr width="40%"><br>
                    <div class="wrap">
                    	<div class="row">
                            <div class="col-md-6" style="padding: 40px;">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Total Denda</label>
                                            <input type="text" id="total" class="form-control" value="{{$denda}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Pembayaran</label>
                                            <input type="text" id="bayarnya" class="form-control" onkeyup="pay()">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Kembalian</label>
                                            <input type="text" id="kembalinya" class="form-control" onkeyup="pay()" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-success" title="Bayar" ng-click="bayar()"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;&nbsp;Bayar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding: 40px;">
                    			<table class="table table-stripped">
                                    <tr>
                                        <td>Kode Peminjaman</td>
                                        <td width="20px">:</td>
                                        <td><span id="kode">{{$mainList->kodepinjam}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Anggota</td>
                                        <td width="20px">:</td>
                                        <td><span id="nmangg">{{$mainList->nmangg}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pustakawan</td>
                                        <td width="20px">:</td>
                                        <td><span id="nmpust">{{$mainList->nmpust}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pinjam</td>
                                        <td width="20px">:</td>
                                        <td><span id="tglpinjam">{{$mainList->tgl_pinjam}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Kembali</td>
                                        <td width="20px">:</td>
                                        <td><span id="tglkembali">{{$mainList->tgl_kembali}}</span></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>         
                                </table>
                    		</div>
                    	</div>
                    	<span id="jarak" hidden>{{$jarakny}}</span>
                    	<div class="row">
                    		<div class="col">
                    			<div class="container bg-white shadow-sm rounded" style="padding: 30px">
				                    <table id="details" class="table table-stripped table-striped table-bordered">
				                        <thead>
				                            <tr>
				                                <td width="20px">No.</td>
				                                <td>Kategori</td>
				                                <td class="text-center">Kode Buku</td>
				                                <td class="text-center">Judul Buku</td>
				                                <td class="text-center">Penulis</td>
				                                <td class="text-center">Penerbit</td>
				                            </tr>
				                        </thead>
				                        <tbody>
				                            @foreach($list as $key => $b)
				                            <tr>
				                                <td>{{$key+1}}</td>
				                                <td>{{$b->nmcat}}</td>
				                                <td>{{$b->kodebuku}}</td>
				                                <td>{{$b->judul}}</td>
				                                <td>{{$b->penulis}}</td>
				                                <td>{{$b->penerbit}}</td>
				                           </tr>
				                            @endforeach
				                        </tbody>
				                    </table>
				                </div><br>
				                <center><button class="btn btn-info" title="Simpan" ng-click="simpan()" ng-if="lanjut == true"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Simpan</button></center>
                    		</div>
                    	</div>
                    </div>
        <br><br><br>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#details').DataTable({
            // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            // dom: 'Blfrtip',
            // buttons: ['excel','print'],
            // "lengthChange": true
        });

    });

    function pay() {
            var text1 = document.getElementById("bayarnya").value;
            var text2 = document.getElementById("total").value;
            var result = parseInt(text1) - parseInt(text2);

            if (!isNaN(result)) {
                document.getElementById("kembalinya").value = result;
            }
    }

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $filter, $http, $window) {
        //vars
        $scope.lanjut = false;

        //var input
        $scope.kodepinjam;
        $scope.nmangg; 
        $scope.kembali;

        //today date
        var dateNow = $filter('date')(new Date(), 'yyyy-MM-dd');
        $scope.year = dateNow.substring(0,4);
        $scope.month = dateNow.substring(5,7);
        $scope.day = dateNow.substring(8,10);
        $scope.today = $scope.year + "-" + $scope.month + "-" + $scope.day;

        $scope.bayar = function() {
            $scope.denda = parseInt(document.getElementById("total").value);
            $scope.bayare = parseInt(document.getElementById("bayarnya").value);

            if ($scope.bayare == 0 || $scope.bayare < $scope.denda) {
                $.growl.error({message: "Pembayaran Kurang"});
                document.getElementById("kembalinya").value = null;
                $scope.lanjut = false;
            } else {
                var kembali = $scope.bayare-$scope.denda;
                $.growl.notice({message: "Pembayaran denda lunas"});
                document.getElementById("kembalinya").value = kembali;
                $scope.lanjut = true;
            }

        }

        $scope.simpan = function () {

                // ngisi var
                $scope.kembali = document.getElementById("kembalinya").value;
                $scope.kodepinjam = document.getElementById("kode").textContent;
                $scope.nmangg = document.getElementById("nmangg").textContent;

                //tglkmbl
                $scope.datenow = moment($scope.today).format('YYYY-MM-DD');
                $scope.tglkembali = document.getElementById("tglkembali").textContent;
                $scope.jarak = parseInt(document.getElementById("jarak").textContent);

                //console.log($scope.tglkembali);

                $http.post('{{url("inserDenda")}}', {
                    kode: $scope.kodepinjam,
                    denda: $scope.denda,
                    bayare: $scope.bayare,
                    kembali: $scope.kembali,
                    nmangg: $scope.nmangg,
                    datenow: $scope.datenow,
                    tglkembali: $scope.tglkembali,
                    jarak: $scope.jarak

                }).then(function(reply) {
                    $.growl.notice({ message: "Buku telah dikembalikan" });
                    $window.location.replace("../vPengembalian");
                });
            
        }
        
    });
</script>
@endsection