@extends('../template')

@section('title','Edit Anggota')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
    <h4 class="mt-3">Edit Anggota</h4>
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <form action="{{route('updAgt',$result->id)}}" method="post">
                @csrf
                <div class="wrap">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Kode Anggota</label>
                            <input type="text" class="form-control" id="kodeangg" name="kodeangg" value="{{$result->kodeangg}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nmangg" name="nmangg" value="{{$result->nmangg}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">No. Telp</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" value="{{$result->notelp}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$result->alamat}}">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" ng-click="simpan()">Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{route('viewAnggota')}}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {

        $scope.simpan = function() {
            $.growl.notice({
                message: "Data Anggota sudah diedit"
            });
        }

        //

    });
</script>
@endsection