@extends('../template')

@section('title','Daftar Pustakawan')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div ng-init="idny='{{$idnya}}'" style="padding: 8px;">
        <h3 class="mt-3 text-center">Daftar Pustakawan</h3>
        <hr width="40%">
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle fa-fw"></i>&nbsp;&nbsp;&nbsp;Tambah</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>
                            Tambah Pustakawan
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/inserUser') }}" method="post">
                            @csrf
                            <div class="wrap">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="password">Password</label>
                                        <div class="input-group mb-3">
                                            <input id="password" type="@{{passwordType}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-info" id="btncheck" ng-click="btnEye()"><i class="fas fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="password">Confirm Password</label>
                                        <div class="input-group mb-3">
                                            <input id="password2" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" onchange="test()">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <!-- <div class="input-group-append">
                                                <button class="btn btn-outline-info" id="btncheck2" ng-click="btnEye()"><i class="fas fa-eye"></i></button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-success" id="simpan" type="submit"><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;&nbsp;Batal</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
        @endif

        <table class="table table-stripped table-striped table-bordered mt-5" id="myTable">
            <thead>
                <tr>
                    <th width="20px" class="text-center">No</th>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">Email</th>
                    <th width="30px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userx as $key => $u)
                <tr>
                    <td>{{$key+1}}.</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>

                    <td class="text-center">
                    <a href="editUser/{{$u->id}}" class="btn btn-primary" title="Edit"><i class="fas fa-pencil-alt fa-fw"></i>
                        </a>
                        
                        <button ng-click="hapus({{$u->id}})" idnya="{{$u->id}}" id="delbtn" class="btn btn-danger" title="Hapus"><i class="fas fa-trash fa-fw"></i></button>
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
    function test(){
        var pw1 = document.getElementById("password").value;
        var pw2 = document.getElementById("password2").value;
        if(pw1 != pw2){
            alert("Password tidak sama");
            document.getElementById("simpan").disabled = false;
        }
        else{
            document.getElementById("simpan").disabled = false;
        }
    }

    // $(document).ready(function(){
    //     $('#btncheck').click(function(){
    //         if ($('#password').attr('type','password')) {
    //             $('#password').attr('type','text');
    //         } else if (('#password').attr('type','text')) {
    //             $('#password').attr('type','password');
    //         } else {
    //             alert("Kesalahan");
    //         }
    //     });
    // });

    $(document).ready(function() {
        $('#myTable').DataTable({
            // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            // dom: 'Blfrtip',
            // buttons: ['excel','print'],
            // "lengthChange": true
        });
    });

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        //vars 
        var allb = document.getElementById("name");
        var delbtn = document.getElementById("delbtn");

        $scope.passwordType = 'password';

        $scope.btnEye = function(){

            if($scope.passwordType == 'password'){
                $scope.passwordType = 'text';
            }
            else{
                $scope.passwordType = 'password';
            }
        }

        $scope.hapus = function(id) {
            $scope.delid = id;
            console.log(id);
            //deleting
            $http.post('{{url("deleteUser")}}', {
                id: $scope.delid
            }).then(function(reply) {
                //alert("Pustakawan berhasil dihapus");
                $.growl.notice({
                    message: "Pustakawan berhasil dihapus!"
                });
                $window.location.replace("viewUser");
            });
        }

    });
</script>
@endsection