@extends('../template')

@section('title','Tambah Kategori')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <br>
    <div ng-init="idny='{{$idnya}}'" style="padding: 8px;">
        <h3 class="mt-3">Kategori</h3>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#Modalinsert"><i class="fas fa-plus-circle fa-fw"></i>&nbsp;Tambah</button>

        <!-- modal insert -->
        <div id="Modalinsert" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>
                            Tambah Kategori
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            @csrf
                            <div class="wrap">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <input type="text" class="form-control" id="category" ng-model="category" name="category" required>
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
        <br><br>
        <table class="table table-striped mt-5" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $key => $c)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$c->category}}</td>
                    <td>
                        <button ng-click="hapus({{$c->id_category}})" idnya="{{$c->id_category}}" id="delbtn" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button>
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
        var allb = document.getElementById("category");
        var delbtn = document.getElementById("delbtn");

        // vars input
        $scope.id_category; //var addens id category
        $scope.category;

        $scope.simpan = function() {
            if ($scope.category == null) {
                $.growl.error({
                    message: "Isi semua field!"
                });
            } else {
                //saving
                $http.post('{{url("inserKategori")}}', {
                    category: $scope.category,
                    _token: '{{csrf_token()}}'

                }).then(function(reply) {
                    //alert("Data Buku sudah disimpan");
                    $.growl.notice({
                        message: "Kategori Berhasil Disimpan"
                    });
                    $window.location.replace("viewKategori");
                });
            }
        }

        $scope.hapus = function(id) {
            $scope.delid = id;
            console.log(id);
            //deleting
            $http.post('{{url("delKategori")}}', {
                id: $scope.delid
            }).then(function(reply) {
                //alert("Data Kategori sudah disimpan");
                $.growl.notice({
                    message: "Kategori Dihapus"
                });
                $window.location.replace("viewKategori");
            });
        }



    });
</script>
@endsection