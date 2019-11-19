@extends('../template')

@section('title','Edit Pustakawan')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
    <h4 class="mt-3">Edit Pustakawan</h4>
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <form action="{{route('updUser',$userx->id)}}" method="post">
                @csrf
                <div class="wrap">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$userx->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="col">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$userx->email}}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="password">Old Password</label>
                            <div class="input-group mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="password">New Password</label>
                            <div class="input-group mb-3">
                                <input id="password" type="@{{passwordType}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" id="btncheck2" ng-click="btnEye()"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" ng-click="simpan()"><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{route('viewUser')}}" class="btn btn-secondary-outline"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;&nbsp;Batal</a>
        </div>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
function test() {
        var pw2 = document.getElementById("password2").value;
        if (pw1 != pw2) {
            alert("Password tidak sama");
            document.getElementById("simpan").disabled = false;
        } else {
            document.getElementById("simpan").disabled = false;
        }
    }
    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {

        $scope.passwordType = 'password2';

        $scope.btnEye = function() {

            if ($scope.passwordType == 'password') {
                $scope.passwordType = 'text';
            } else {
                $scope.passwordType = 'password';
            }
        }

        // $scope.simpan = function() {
        //     $.growl.notice({
        //         message: "Data Anggota sudah diedit"
        //     });
        // }

        //

    });
</script>
@endsection