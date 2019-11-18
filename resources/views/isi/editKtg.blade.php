@extends('../template')

@section('title','Edit Kategori')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
    <h4 class="mt-3">Edit Kategori</h4>
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <form action="{{route('updKtg',$result->id_category)}}" method="post">
                @csrf
                <div class="wrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{$result->category}}" required>
                            </div>
                        </div>

                    </div>
                </div>
                <button class="btn btn-success" ng-click="simpan()"><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{route('viewKategori')}}" class="btn btn-secondary-outline"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;&nbsp;Batal</a>
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