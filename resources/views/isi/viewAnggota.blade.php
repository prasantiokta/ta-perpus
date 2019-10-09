@extends('../template')

@section('title','Daftar Anggota')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <br><br>
    <div ng-init="idny='{{$idnya}}'" style="padding: 8px;">
        <h4 class="mt-3">Daftar Anggota</h4>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle fa-fw"></i>&nbsp;Tambah</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>
                            Tambah Anggota
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            @csrf
                            <div class="wrap">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nmangg" ng-model="nmangg" name="nmangg">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">No. Telp</label>
                                            <input type="text" class="form-control" id="notelp" ng-model="notelp" name="notelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" ng-model="alamat" name="alamat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" ng-click="simpan()">Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
                </div>

            </div>
        </div>

        <table class="table table-striped mt-5">
            <tr>
                <th>No</th>
                <th>Kode Anggota</th>
                <th>Nama Lengkap</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
            @foreach($agt as $key => $a)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$a->kodeangg}}</td>
                <td>{{$a->nmangg}}</td>
                <td>{{$a->notelp}}</td>
                <td>{{$a->alamat}}</td>
                <td>
                    <a href="editAnggt/{{$a->id}}" class="btn btn-primary"><i class="fas fa-pencil-alt fa-fw"></i>
                    </a>
                    <button ng-click="hapus({{$a->id}})" idnya="{{$a->id}}" id="delbtn" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <br><br>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        // vars input
        $scope.id; //var addens kodebuku
        $scope.kodeangg;
        $scope.nmangg = "";
        $scope.notelp;
        $scope.alamat;

        $scope.simpan = function() {
            //generate kode
            var id = JSON.parse($scope.idny);
            $scope.id = id + 1;
            //nmcat
            $scope.nmangg = allb.options[allb.selectedIndex].getAttribute("nmangg");
            //saving
            $http.post('{{url("inserAgt")}}', {
                kodeangg: $scope.kodeangg,
                nmangg: $scope.nmangg,
                notelp: $scope.notelp,
                alamat: $scope.alamat,
                _token: '{{csrf_token()}}'

            }).then(function(reply) {
                //alert("Data Buku sudah disimpan");
                $.growl.notice({
                    message: "Anggota berhasil ditambahkan!"
                });
                $window.location.replace("viewAnggota");
            });
        }

        $scope.hapus = function(id) {
            $scope.delid = id;
            console.log(id);
            //deleting
            $http.post('{{url("deleteAgt")}}', {
                id: $scope.delid
            }).then(function(reply) {
                //alert("Data Buku sudah disimpan");
                $.growl.notice({
                    message: "Anggota berhasil dihapus!"
                });
                $window.location.replace("viewAnggota");
            });
        }


        //

    });
</script>
@endsection