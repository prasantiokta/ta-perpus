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
        <br>
        <div class="box">
            <br>
            <div class="col">
                <table id="bukuTb" class="table table-stripped table-striped table-bordered mt-5">
                    <thead>
                        <tr>
                            <td width="20px" class="text-center">No.</td>
                            <td hidden>ID</td>
                            <td class="text-center">Kategori</td>
                            <td class="text-center">Kode Buku</td>
                            <td class="text-center">Judul Buku</td>
                            <td class="text-center">Penulis</td>
                            <td class="text-center">Penerbit</td>
                            <td width="20px">Pilih</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bukue as $key => $b)
                        <tr>
                            <td>{{$key+1}}.</td>
                            <td hidden>{{$b->id_buku}}</td>
                            <td>{{$b->nmcat}}</td>
                            <td>{{$b->kodebuku}}</td>
                            <td>{{$b->judul}}</td>
                            <td>{{$b->penulis}}</td>
                            <td>{{$b->penerbit}}</td>
                            <td class="text-center"><input type="checkbox" name="selectedRow[]" value="{{$key}}"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><small class="form-text text-muted text-center">Klik "Tambah ke list" setelah menambah atau mengubah buku yang dipilih</small><br>
                <button class="btn btn-secondary" id="addBuku" ><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;&nbsp;Tambah ke list</button>
                <button hidden class="btn btn-info" ng-click="showList()" data-toggle="modal" data-target="#ModalList"><i class="fas fa-list"></i>&nbsp;&nbsp;&nbsp;Lihat List</button>
            </div>
            <br>
        </div>
        <div id="ModalList" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>
                            List buku
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <table id="list" class="table table-stripped table-striped table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <td class="text-center">Kategori</td>
                                            <td class="text-center">Kode Buku</td>
                                            <td class="text-center">Judul Buku</td>
                                            <td class="text-center">Penulis</td>
                                            <td class="text-center">Penerbit</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="b in data">
                                            <td>@{{b.kategori}}</td>
                                            <td>@{{b.kodebuku}}</td>
                                            <td>@{{b.judul}}</td>
                                            <td>@{{b.penulis}}</td>
                                            <td>@{{b.penerbit}}</td>
                                            <td><button class="btn btn-info" ng-click="del($index)" title="Hapus"><i class="fas fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        p
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <center><button class="btn btn-success" ng-click="addPinjam()"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Simpan Peminjaman</button></center>
            </div>
        </div>
        <br>
    </div>
    <br>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $filter, $http, $window) {

        //vars
        var bukuny = document.getElementById("bukuTb");
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

        // jquery

        $(document).ready(function() {

            $('.wonge').select2();

            var table = $('#bukuTb').DataTable({
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
                    {   
                        data: "selected",
                        defaultContent: ''
                    }
                ]
            });

            $("#addBuku").click(function(){

                var listnya = [];
                var checked = $('input[name="selectedRow[]"]:checked').length;

                if (checked==0) {

                    $scope.filled = false;
                    $.growl.error({ message: "Centang Checkbox" });

                } else if (checked > 0 && checked <= 3) {

                    $.each($("input[name='selectedRow[]']:checked"), function(){

                        listnya.push(table.row($(this).val()).data());
                        $scope.data = listnya;

                    });

                    $scope.filled = true;
                    $.growl.notice({ message: "Masuk ke list" });

                } else {

                    $.growl.error({ message: "Tidak boleh meminjam lebih dari 3 buku" });
                    $scope.filled = false;

                }

                console.log($scope.filled);
            });

        });

        // function
        $scope.init = function() {

            // $http.get('{{url("addPeminjaman")}}', {
            //     }).then(function(reply) {
            //         var idny = reply.idnya;
            //         $scope.idny = idny;
            //     });

        }

        //list


        $scope.del = function(idx) {

            $.growl.warning({message: "Buku dihapus dari list"});
            var del = $scope.data[idx];
            $scope.data.splice(idx, 1);
            $.each($("input[name='selectedRow[]']:checked"), function(){

                var deleted = $("input[name='selectedRow[]']:unchecked");

            });

        }

        //end list

        $scope.addPinjam = function() {
            if ($scope.anggota == null || $scope.tglkembali == null) {
                $.growl.error({message: "Isi semua field!"});
            } else if ($scope.data.length == 0) {
                $.growl.error({message: "Centang Checkbox"});
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
                $scope.tglk = moment($scope.tglkembali).format('YYYY-MM-DD');

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