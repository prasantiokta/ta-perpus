@extends('../template')

@section('title','Koleksi Buku')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <br><br>
    <div ng-init="idny='{{$idnya}}'" style="padding: 8px;">
        <h4 class="mt-3">Koleksi Buku</h4>

        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modalinsert"><i class="fas fa-plus-circle fa-fw"></i>&nbsp;Tambah</button>

        <!-- modal insert -->
        <div id="Modalinsert" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>
                            Tambah Koleksi
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
                                            <label for="">Kategori</label>
                                            <select id="jenis_id" ng-model="jenis_id" name="jenis_id" class="form-control" required>
                                                @foreach($category as $c)
                                                <option value="{{$c->id_category}}" nama="{{$c->category}}">{{$c->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Judul</label>
                                            <input type="text" class="form-control" id="judul" ng-model="judul" name="judul">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Penulis</label>
                                            <input type="text" class="form-control" id="penulis" ng-model="penulis" name="penulis">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Penerbit</label>
                                            <input type="text" class="form-control" id="penerbit" ng-model="penerbit" name="penerbit">
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
                <th>Kategori</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($bukux as $key => $b)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$b->category}}</td>
                <td>{{$b->kodebuku}}</td>
                <td>{{$b->judul}}</td>
                <td>{{$b->penerbit}}</td>
                <td>{{$b->penulis}}</td>
                <td>{{$b->status}}</td>
                <td>
                    <a href="editBuku/{{$b->id_buku}}" class="btn btn-primary"><i class="fas fa-pencil-alt fa-fw"></i>
                    </a>

                    <a href="delete/{{$b->id_buku}}" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></a>
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
        //vars 
        var allb = document.getElementById("jenis_id");

        // vars input
        $scope.idbuku; //var addens kodebuku
        $scope.kode;
        $scope.judul = "";
        $scope.penulis;
        $scope.penerbit;

        $scope.simpan = function() {
            //generate kode
            var idbk = JSON.parse($scope.idny);
            $scope.idbuku = idbk + 1;
            $scope.kode = $scope.judul.substring(0, 4).toUpperCase() + "-" + $scope.idbuku;
            console.log($scope.idny);
            //nmcat
            $scope.nmcat = allb.options[allb.selectedIndex].getAttribute("nama");
            //saving
            $http.post('{{url('
                inserBuku ')}}', {
                    kode: $scope.kode,
                    jenis_id: $scope.jenis_id,
                    judul: $scope.judul,
                    penulis: $scope.penulis,
                    penerbit: $scope.penerbit,
                    nmcat: $scope.nmcat,
                    _token: '{{csrf_token()}}'

                }).then(function(reply) {
                alert("Data Buku sudah disimpan");
                //$.growl.notice({title: "[INFO]", message: "Data Buku Berhasil Disimpan"});
                $window.location.replace("viewBuku");
            });
        }

        //

    });
</script>
@endsection