@extends('../template')

@section('title','Pembayaran Denda')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">Pengembalian Buku</h3>
        <hr width="40%"><br>
                    <div class="wrap">
                    	<div class="row">
                            <div class="col">
                            </div>
                            <div class="col-md-6" style="padding: 40px;">
                    			<table class="table table-stripped">
                                    <tr>
                                        <span id="id" hidden>{{$mainList->id}}</span>
                                    </tr>
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
                    	<div class="row">
                    		<div class="col">
                    			<div class="container bg-white shadow-sm rounded" style="padding: 30px">
				                    <table id="details" class="table table-stripped table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td width="20px" class="text-center">No.</td>
                                            <td hidden>ID</td>
                                            <td class="text-center">Kategori</td>
                                            <td class="text-center">Kode Buku</td>
                                            <td class="text-center">Judul Buku</td>
                                            <td class="text-center">Penulis</td>
                                            <td class="text-center">Penerbit</td>
                                            <!-- <td class="text-center">Status</td> -->
                                            <td width="20px">Pilih</td>
                                        </tr>
                                    </thead>
				                        <tbody>
				                            @foreach($list as $key => $b)
				                            <tr>
                                                <td>{{$key+1}}.</td>
                                                <td hidden>{{$b->buku_id}}</td>
                                                <td>{{$b->nmcat}}</td>
                                                <td>{{$b->kodebuku}}</td>
                                                <td>{{$b->judul}}</td>
                                                <td>{{$b->penulis}}</td>
                                                <td>{{$b->penerbit}}</td>
                                                <!-- <td>
                                                <select id="status" name="status" class="form-control" required>
                                                    <option value="{{$b->status}}">
                                                        @if($b->status == 0)
                                                        Dipinjam
                                                        @elseif($b->status == 1)
                                                        Dikembalikan
                                                        @elseif($b->status == 2)
                                                        Rusak
                                                        @else
                                                        Hilang
                                                        @endif
                                                    </option>
                                                    <option disabled="">----------------------------------------------</option>
                                                    <option value="0">Dipinjam</option>
                                                    <option value="1">Dikembalikan</option>
                                                    <option value="2">Rusak</option>
                                                    <option value="3">Hilang</option>
                                                </select>
                                                </td> -->
                                                <td class="text-center"><input type="checkbox" name="selectedRow[]" value="{{$key}}"></td>
                                            </tr>
				                            @endforeach
				                        </tbody>
				                    </table><br>
                                    <!-- <button class="btn btn-info btn-xs" id="kembalikan" title="Kembalikan"><i class="fas fa-angle-double-left"></i></button> -->
				                </div><br>
				                <center><button id="simpan" class="btn btn-success" title="Simpan"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Simpan</button></center>
                    		</div>
                    	</div>
                    </div>
                    <div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" id="myModal">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pembayaran Denda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </div>
                                <div class="modal-body">
                                    <!-- <div class="container bg-white shadow-sm rounded" style="padding: 30px">
                                        <table id="details" class="table table-stripped table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <td width="20px" class="text-center">No.</td>
                                                <td hidden>ID</td>
                                                <td class="text-center">Kategori</td>
                                                <td class="text-center">Kode Buku</td>
                                                <td class="text-center">Judul Buku</td>
                                                <td class="text-center">Penulis</td>
                                                <td class="text-center">Penerbit</td>
                                                <td class="text-center">Status</td>
                                                <td width="20px">Denda</td>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                <tr ng-repeat="d in data">
                                                    <td>@{{$index}}.</td>
                                                    <td hidden>@{{d.buku_id}}</td>
                                                    <td>@{{d.nmcat}}</td>
                                                    <td>@{{d.kodebuku}}</td>
                                                    <td>@{{d.judul}}</td>
                                                    <td>@{{d.penulis}}</td>
                                                    <td>@{{d.penerbit}}</td>
                                                    <td class="text-center">@currency(1000)</td>
                                                </tr>
                                            </tbody>
                                        </table><br>
                                        <button class="btn btn-info btn-xs" id="kembalikan" title="Kembalikan"><i class="fas fa-angle-double-left"></i></button>
                                    </div> -->
                                    <div class="col">
                                    <small class="form-text text-muted text-center">NB: Denda diambil dari @currency(1000) dikali <br> banyak buku dan jangka terlambat.</small>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Total Denda</label>
                                                <input type="text" id="dendanya" class="form-control" value="@{{denda}}" readonly>
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
                                            <button class="btn btn-success" title="Bayar" ng-click="bayar()" ng-disabled="clicked == true"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;&nbsp;Bayar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary-outline" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;&nbsp;Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
        <br><br><br>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $filter, $http, $window) {
        //vars
        $scope.clicked = false;

        $scope.range;
        $scope.data = [];

        //today date
        var dateNow = $filter('date')(new Date(), 'yyyy-MM-dd');
        $scope.year = dateNow.substring(0,4);
        $scope.month = dateNow.substring(5,7);
        $scope.day = dateNow.substring(8,10);
        $scope.todays = $scope.year + "-" + $scope.month + "-" + $scope.day;

        $(document).ready(function() {
            var table = $('#details').DataTable({
                // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                // dom: 'Blfrtip',
                // buttons: ['excel','print'],
                // "lengthChange": true
                columns: [
                        { data: "no" },
                        { data: "id" },
                        { data: "kategori" },
                        { data: "kodebuku" },
                        { data: "judul" },
                        { data: "penulis" },
                        { data: "penerbit" },
                        // { data: "status" },
                        {   
                            data: "selected",
                            defaultContent: ''
                        }
                ]
            });

            $("#simpan").click(function(){

                var listnya = [];
                var checked = $('input[name="selectedRow[]"]:checked').length;

                if (checked==0) {

                    $scope.btnMaxVal = false;
                    $.growl.error({ message: "Centang Checkbox" });

                } else {

                    $.each($("input[name='selectedRow[]']:checked"), function(){

                        listnya.push(table.row($(this).val()).data());
                        $scope.data = listnya;

                    });

                    //cek tgl
                    $scope.today = moment($scope.todays).format('YYYY-MM-DD');
                    $scope.tglkembali = document.getElementById("tglkembali").textContent;
                    
                    $scope.id_pinjam = document.getElementById("id").textContent;

                    
                    if ($scope.today > $scope.tglkembali) {

                        $.growl.error({message: "Anda harus membayar denda"});

                        var date1 = new Date($scope.today); 
                        var date2 = new Date($scope.tglkembali); 
                        
                        // To calculate the time difference of two dates 
                        var Difference_In_Time = date1.getTime() - date2.getTime(); 
                        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

                        $scope.range = Difference_In_Days;

                        $scope.denda = $scope.data.length * 1000 * Difference_In_Days;
                        document.getElementById("dendanya").value = $scope.denda;

                        $('#myModal').modal('toggle');
                    } else {
                        $http.post('{{url("kembalikan")}}', {
                            id: $scope.id_pinjam,
                            detail: $scope.data
                        }).then(function(reply) {
                            $.growl.notice({message: "Buku dikembalikan"});
                            $window.location.replace("../vPengembalian");
                        });
                    
                    }

                }

            });

        });

        $scope.bayar = function() {
            $scope.dendany = parseInt(document.getElementById("dendanya").value);
            $scope.bayarny = parseInt(document.getElementById("bayarnya").value);
            $scope.kembaliny = parseInt(document.getElementById("kembalinya").value);

            if ($scope.bayarny == null || $scope.bayarny == 0 || $scope.bayarny < $scope.dendany) {
                $.growl.error({message: "Pembayaran Kurang"});
            } else {

                $scope.clicked = true;

                $http.post('{{url("inserDenda")}}', {
                    id: $scope.id_pinjam,
                    denda: $scope.dendany,
                    bayar: $scope.bayarny,
                    kembali: $scope.kembaliny,
                    hari: $scope.range,
                    tgl: $scope.today,
                    detail: $scope.data,
                    _token: '{{csrf_token()}}'
                }).then(function(reply) {
                    $.growl.notice({message: "Buku dikembalikan"});
                    $window.location.replace("../vPengembalian");
                });
            }
        }
        
    });

    function pay() {
                var byr = parseInt(document.getElementById("bayarnya").value);
                var dnd = parseInt(document.getElementById("dendanya").value);
                var result = byr - dnd;

                if (byr == null || byr == 0 || byr < dnd) {
                    $.growl.error({message: "Pembayaran Kurang"});
                } else {
                    $.growl.notice({message: "Pembayaran denda lunas"});
                    document.getElementById("kembalinya").value = result;
                }
    }
    
</script>
@endsection