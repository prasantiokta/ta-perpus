@extends('../template')

@section('title','Edit Anggota')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
    <h4 class="mt-3">Edit Anggota</h4>
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <form action="{{route('updAgt',$result->id_angg)}}" method="post">
                @csrf
                <div class="wrap">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nmangg" name="nmangg" value="{{$result->nmangg}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">No. Telp</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" value="{{$result->notelp}}" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select id="kelas" name="kelas" class="form-control" required>
                                    <option value="{{$result->kelas}}">{{$result->kelas}}</option>
                                    <option disabled="">----------------------------------------------</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <select id="jurusan" name="jurusan" class="form-control" required>
                                    <option value="{{$result->jurusan}}">{{$result->jurusan}}</option>
                                    <option disabled="">----------------------------------------------</option>
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
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$result->alamat}}" required>
                            </div>
                        </div>
                        <div class="col">
                            
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" ng-click="simpan()"><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{route('viewAnggota')}}" class="btn btn-secondary-outline"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;&nbsp;Batal</a>
        </div>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {

        // $scope.simpan = function() {
        //     $.growl.notice({
        //         message: "Data Anggota sudah diedit"
        //     });
        // }

        //

    });
</script>
@endsection