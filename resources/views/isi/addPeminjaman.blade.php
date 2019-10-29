@extends('../template')

@section('title','Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <br>
    <div ng-init="idny='{{$idnya}}'" style="padding: 8px;">
        <h4 class="mt-3">Tambah Peminjaman</h4><hr><br>
        <div class="row">
        	<div class="col-md-5">
        		<div class="form-group">
                    <label for="">Pilih Anggota</label>
                    <select id="anggota" ng-model="anggota" class="wonge form-control" required>
                        @foreach($agt as $c)
                        <option value="{{$c->id_angg}}" nama="{{$c->nmangg}}">{{$c->nmangg}}</option>
                        @endforeach
                    </select>
                </div>
        	</div>
            <div class="col">
                
            </div>
        	<div class="col-md-3">
                <div class="form-group">
                    <label>Pustakawan</label>
                    <input type="text" id="pust" class="form-control" value="{{ Auth::user()->name }}" idelo="{{ Auth::user()->id }}" readonly>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-5">
        		<div class="form-group">
        			<label>Tgl. Pinjam</label>
        			<input type="date" ng-model="tglpinjam" id="tglpinjam" class="form-control" value="@{{today}}" min="@{{today}}">
        		</div>
        	</div>
        	<div class="col-md-5">
        		<div class="form-group">
        			<label>Tgl. Kembali</label>
        			<input type="date" ng-model="tglkembali" name="tglkembali" id="tglkembali" class="form-control" aria-describedby="senpie" min="@{{today}}" >
                    <small id="senpie" class="form-text text-muted">
                        Tiap buku hanya boleh dipinjam selama 3 hari.
                    </small>
        		</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-5">
        		<div class="form-group">
        			<label>Pilih Buku</label>
                    <select id="bukunekuy" ng-model="databuku" class="bukune custom-select" ng-disabled="@{{$scope.data.length >= 3}}">
                        @foreach($bukue as $i)
                        <option value="{{$i->id_buku}}" kode="{{$i->kodebuku}}" judul="{{$i->judul}}" penulis="{{$i->penulis}}" penerbit="{{$i->penerbit}}">{{$i->judul}}</option>
                        @endforeach
                    </select>

        		</div>
        	</div>
        	<div class="col">
        		
        	</div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <button type="button" class="btn btn-info" id="addBtn" ng-click="add()" data-target="#added"><i class="fas fa-plus-circle fa-fw"></i></button>
            </div>
        </div>
        <div class="row added" id="added" ng-show="filled == true" ng-hide="filled == false">
            <div class="col">
                <table class="table table-stripped table-striped table-bordered mt-5">
                    <thead>
                        <tr>
                            <td width="20px">No.</td>
                            <td class="text-center">Kode Buku</td>
                            <td class="text-center">Judul Buku</td>
                            <td class="text-center">Penerbit</td>
                            <td class="text-center">Penulis</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody ng-repeat="d in data">
                        <tr>
                            <td width="20px">@{{$index + 1}}.</td>
                            <td class="text-center">@{{d.kodebuku}}</td>
                            <td class="text-center">@{{d.judul}}</td>
                            <td class="text-center">@{{d.penulis}}</td>
                            <td class="text-center">@{{d.penerbit}}</td>
                            <td class="text-center"><button class="btn btn-danger" ng-click="del($index)"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <button class="btn btn-success" ng-click="addPinjam()"><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Simpan</button>
            </div>
        </div>
    </div>
    <br><br><br>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $filter, $http, $window) {

        //autocomplete select2
        $(document).ready(function() {
            $('.bukune').select2();
        });

        $(document).ready(function() {
            $('.wonge').select2();
        });

        $("#addBtn").click(function() {
            $(window).animate({scrollTop: $(document).height() + $(".added").height()});
        });

        //vars
        var bukuny = document.getElementById("bukunekuy");
        var agtny = document.getElementById("anggota_id");
        var angg = document.getElementById("anggota");

        $scope.data = [];   //tampungan list

        $scope.tglpinjam;
        $scope.tglkembali;
        $scope.databuku;
        $scope.anggota;
        $scope.nmpust;

        // addens
        $scope.filled = false;
        $scope.btnMaxVal = false;

        //today date
        var dateNow = $filter('date')(new Date(), 'yyyy-MM-dd');
        $scope.year = dateNow.substring(0,4);
        $scope.month = dateNow.substring(5,7);
        $scope.day = dateNow.substring(8,10);
        $scope.today = $scope.year + "-" + $scope.month + "-" + $scope.day;

        // function
        $scope.init = function() {
            $http.get('{{url("addPeminjaman")}}', {
                }).then(function(reply) {
                    var idny = reply.idnya;
                    $scope.idny = idny;
                });
        }

        $scope.checkLength = function() {
            if ($scope.data.length > 0) {
                $scope.filled = true;
            } else if ($scope.data.length == 0) {
                $scope.filled = false;
            }
        }

        //list
        $scope.add = function() {
            if ($scope.databuku == null) {
                $.growl.warning({message: "Masukkan buku yang akan dipinjam"});
            } else if ($scope.data.length >= 3){
                $.growl.warning({message: "Hanya boleh meminjam 3 buku"});
                $scope.btnMaxVal = true;
            } else {
                $scope.btnAdd = true;

                //buku
                $scope.kodebuku = bukuny.options[bukuny.selectedIndex].getAttribute("kode");
                $scope.judul = bukuny.options[bukuny.selectedIndex].getAttribute("judul");
                $scope.penulis = bukuny.options[bukuny.selectedIndex].getAttribute("penulis");
                $scope.penerbit = bukuny.options[bukuny.selectedIndex].getAttribute("penerbit");

                //insert to list
                $scope.form = {
                    id: $scope.databuku,
                    kodebuku: $scope.kodebuku,
                    judul: $scope.judul,
                    penulis: $scope.penulis,
                    penerbit: $scope.penerbit
                }

                $.growl.notice({message: "Buku ditambahkan ke list"});
                $scope.data.push($scope.form);
            }

            $scope.checkLength(1);
            
        }

        $scope.del = function(idx) {
            $.growl.warning({message: "Buku dihapus dari list"});
            var del = $scope.data[idx];
            $scope.data.splice(idx, 1);

            $scope.checkLength(1);
        }

        //end list

        $scope.addPinjam = function() {
            if ($scope.anggota == null || $scope.tglkembali == null) {
                $.growl.error({message: "Isi semua field!"});
            } else {
                //create kodepinjam
                var id = JSON.parse($scope.idny);
                $scope.id = id + 1;
                $scope.kodepinjam = $scope.year + $scope.month + $scope.day + "-" + $scope.id;
                // get angg
                $scope.nmangg = angg.options[angg.selectedIndex].getAttribute("nama");
                // get pust id
                var pust = document.getElementById("pust");
                $scope.idpust = pust.getAttribute("idelo");
                $scope.nmpust = pust.getAttribute("value");
                //tglkmbl
                // var day = $scope.tglkembali.tostring();
                $scope.tglk = moment($scope.tglkembali).format('YYYY-MM-DD');
                console.log($scope.tglk);

                $http.post('{{url("inserPinjam")}}', {
                    kode: $scope.kodepinjam,
                    anggota_id: $scope.anggota,
                    pustakawan_id: $scope.idpust,
                    tglpinjam: $scope.today,
                    tglkembali: $scope.tglk,
                    nmangg: $scope.nmangg,
                    nmpust: $scope.nmpust,
                    detail: $scope.data,
                    _token: '{{csrf_token()}}'

                }).then(function(reply) {
                    $.growl.notice({ message: "Data Peminjaman sudah disimpan" });
                    $window.location.replace("vPeminjaman");
                });
            }
        }

    });

</script>
@endsection