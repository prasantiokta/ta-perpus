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
                                            <input type="text" class="form-control" id="nmangg" ng-model="nmangg" name="nmangg" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">No. Telp</label>
                                            <input type="text" class="form-control" id="notelp" ng-model="notelp" name="notelp" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Kelas</label>
                                            <select id="kelas" ng-model="kelas" name="kelas" class="form-control" required>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Jurusan</label>
                                            <select id="jurusan" ng-model="jurusan" name="jurusan" class="form-control" required>
                                                <option value="Akuntansi">Akuntansi</option>
                                                <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                                                <option value="Pemasaran">Pemasaran</option>
                                                <option value="Akomodasi Perhotelan">Akomodasi Perhotelan</option>
                                                <option value="Pertelevisian">Pertelevisian</option> 
                                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                                <option value="Multimedia">Multimedia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" ng-model="alamat" name="alamat" required>
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
        <br><br><br>
        <table class="table table-striped mt-5" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($agt as $key => $a)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$a->kodeangg}}</td>
                <td>{{$a->nmangg}}</td>
                <td>{{$a->kelas}}</td>
                <td>{{$a->jurusan}}</td>
                <td>{{$a->notelp}}</td>
                <td>{{$a->alamat}}</td>
                <td>
                    <a href="editAnggt/{{$a->id_angg}}" class="btn btn-primary"><i class="fas fa-pencil-alt fa-fw"></i>
                    </a>
                    <button ng-click="hapus({{$a->id_angg}})" idnya="{{$a->id_angg}}" id="delbtn" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br><br>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">

    $(document).ready(function(){
        $('#myTable').DataTable({
            // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            // dom: 'Blfrtip',
            // buttons: ['excel','print'],
            // "lengthChange": true
        });
    });

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        // vars input
        $scope.id; //var add kodeangg
        $scope.kodeangg;
        $scope.nmangg = "";
        $scope.kelas;
        $scope.jurusan;
        $scope.notelp;
        $scope.alamat;

        $scope.simpan = function() {
            // validate
            if ($scope.nmangg == null || $scope.kelas == null || $scope.jurusan == null || $scope.notelp == null || $scope.alamat == null) {
                $.growl.error({message: "Isi semua field!"});
            } else {
                //generate kode
                var id = JSON.parse($scope.idny);
                console.log(id);
                $scope.id = id + 1;
                $scope.kodeangg = $scope.nmangg.substring(0, 4).toUpperCase() + "-" + $scope.id;
                //saving
                $http.post('{{url("inserAgt")}}', {
                    kodeangg: $scope.kodeangg,
                    nmangg: $scope.nmangg,
                    kelas: $scope.kelas,
                    jurusan: $scope.jurusan,
                    notelp: $scope.notelp,
                    alamat: $scope.alamat,
                    _token: '{{csrf_token()}}'

                }).then(function(reply) {
                    //alert("Data Buku sudah disimpan");
                    $.growl.notice({message: "Anggota berhasil ditambahkan!"});
                    $window.location.replace("viewAnggota");
                });
            }
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