@extends('layouts.app')

@section('content')
<div class="container" ng-app="tesApp" ng-controller="tesCtrl">
    <div ng-init="idny='{{$idnya}}'" class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register Anggota</div>

                <div class="card-body bg-red-gradient">
                    <form>
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="nmangg" type="text" class="form-control" name="nmangg" ng-model="nmangg" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">No. Telp</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="notelp" ng-model="notelp" name="notelp" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Kelas</label>

                            <div class="col-md-6">
                                <select id="kelas" ng-model="kelas" name="kelas" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Jurusan</label>

                            <div class="col-md-6">
                                <select id="jurusan" ng-model="jurusan" name="jurusan" class="form-control" required>
                                    <option value="">Pilih</option>
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
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="alamat" ng-model="alamat" name="alamat" required>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button class="btn btn-success" ng-click="simpan()" ng-disabled="saving == true"><i class="fas fa-check-circle"></i>Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
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

        // addens
        $scope.saving = false;
        $scope.deleting = false;

        $scope.simpan = function() {
            // validate
            if ($scope.nmangg == null || $scope.kelas == null || $scope.jurusan == null || $scope.notelp == null || $scope.alamat == null) {
                $.growl.error({
                    message: "Isi semua field!"
                });
            } else {
                //generate kode
                var id = JSON.parse($scope.idny);
                $scope.id = id;
                $scope.kodeangg = $scope.nmangg.substring(0, 4).toUpperCase() + "-" + $scope.id;
                //saving
                $scope.saving = true;
                $http.post('{{url("inserAgt")}}', {
                    kodeangg: $scope.kodeangg,
                    nmangg: $scope.nmangg,
                    kelas: $scope.kelas,
                    jurusan: $scope.jurusan,
                    notelp: $scope.notelp,
                    alamat: $scope.alamat,
                    _token: '{{csrf_token()}}'

                }).then(function(reply) {
                    alert("Anggota telah terdaftar!");

                    $window.location.replace("/");
                });
            }
        }
    });
</script>
@endsection