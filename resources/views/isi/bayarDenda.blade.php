@extends('../template')

@section('title','Pembayaran Denda')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">Pembayaran Denda</h3>
        <hr width="40%"><br>
                    <div class="wrap">
                    	<div class="row">
                            <div class="col-md-5" id="bayar">
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
                                            <input type="text" id="bayarnya" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Kembalian</label>
                                            <input type="text" id="kembalinya" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-success" title="Bayar" ng-click="bayar()"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;&nbsp;Bayar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col-md-6" id="ket">
                    			<table class="table table-stripped">
                                    <tr>
                                        <td>Kode Peminjaman&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span id="kode">&nbsp;&nbsp;&nbsp;{{$mainList->kodepinjam}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Anggota&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span id="nmangg">&nbsp;&nbsp;&nbsp;{{$mainList->nmangg}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pustakawan&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span id="nmpust">&nbsp;&nbsp;&nbsp;{{$mainList->nmpust}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl. Pinjam&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span id="tglpinjam">&nbsp;&nbsp;&nbsp;{{$mainList->tgl_pinjam}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl. Kembali&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td><span id="tglkembali">{{$mainList->tgl_kembali}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Terlambat&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td><span id="jarak">{{$jarakny}} hari</span></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>         
                                </table>
                    		</div>
                    	</div>
                    </div>
                <br>
                <div class="box"><br>
		            <div class="col">
		                <table id="details" class="table table-stripped table-striped table-bordered mt-5">
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
		        </div><center><button class="btn btn-info" title="Simpan" ng-click="simpan()"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Simpan</button></center>
		    <br><br>
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

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $filter, $http, $window) {
        //vars
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
            } else {
                var kembali = $scope.bayare-$scope.denda;
                $.growl.notice({message: "Pembayaran denda lunas"});
                document.getElementById("kembalinya").value = kembali;
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
                    jarak: $scope.jarak,
                    _token: '{{csrf_token()}}'

                }).then(function(reply) {
                    $.growl.notice({ message: "Buku telah dikembalikan" });
                    $window.location.replace("vPengembalian");
                });
            
        }

    });
</script>
@endsection