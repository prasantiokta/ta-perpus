@extends('../template')

@section('title','Koleksi Buku')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <br><br>
    <div ng-init="idny='{{$idnya}}'" style="padding: 8px;">
    <h4 class="mt-3">Koleksi Buku</h4>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle fa-fw"></i>&nbsp;Tambah</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
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
                                                <option value="{{$c->id}}">{{$c->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" class="form-control" id="judul"  ng-model="judul" name="judul">
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
<<<<<<< Updated upstream:resources/views/isi/viewBuku.blade.php
                        <button class="btn btn-success" ng-click="simpan()">Simpan</button>
=======
                        <div class="form-group">
                            <label for="">Kode Buku</label>
                            <input type="number" class="form-control" id="" name="kode">
                        </div>
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input type="text" class="form-control" id="" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="">Penerbit</label>
                            <input type="text" class="form-control" id="" name="penerbit">
                        </div>
                        <div class="form-group">
                            <label for="">Penulis</label>
                            <input type="text" class="form-control" id="" name="penulis">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
>>>>>>> Stashed changes:resources/views/isi/vbuku.blade.php
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
                <a href="" class="btn btn-primary">Edit</a>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    <br><br>
</div>
<!-- App ctrl angular -->
    <script type="text/javascript">
        var app = angular.module('tesApp',[]);
        app.controller('tesCtrl', function($scope, $http, $window) {
            // vars input
            $scope.idbuku;      //var addens kodebuku
            $scope.kode;        
            $scope.judul = "";       
            $scope.penulis;     
            $scope.penerbit;    

            $scope.simpan = function(){
                //generate kode
                var idbk = JSON.parse($scope.idny);
                $scope.idbuku = idbk+1;
                $scope.kode = $scope.judul.substring(0,4).toUpperCase() + "-" + $scope.idbuku;  
                console.log($scope.idny);
                //saving
                $http.post('{{route('inserBuku')}}',{
                    kode : $scope.kode,
                    jenis_id: $scope.jenis_id,
                    judul: $scope.judul,
                    penulis: $scope.penulis,
                    penerbit: $scope.penerbit,
                    _token:'{{csrf_token()}}'

                }).then(function (reply){
                    alert("Data Buku sudah disimpan");
                    //$.growl.notice({title: "[INFO]", message: "Data Buku Berhasil Disimpan"});
                    $window.location.replace("viewBuku");
                });
            }

            //

        });
    </script>
@endsection