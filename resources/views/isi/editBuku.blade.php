@extends('../template')

@section('title','Edit Buku')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
    <h4 class="mt-3">Edit Buku</h4>
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <form action="{{route('updBuku',$result->id_buku)}}" method="post">
                @csrf
                <div class="wrap">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select id="opt" name="jenis_id" class="form-control" required>
                                    @foreach($cat as $c)
                                    <option value="{{$c->id_category}}" nama="{{$c->category}}">{{$c->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{$result->judul}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Penulis</label>
                                <input type="text" class="form-control" id="penulis"  name="penulis" value="{{$result->penulis}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{$result->penerbit}}">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{route('viewBuku')}}" class="btn btn-secondary">Batal</a>
        </div>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        //vars 
        // $scope.data;

        var allb = document.getElementById("opt");
        //$scope.data = $result;
        // console.log($scope.data);

        // // vars input
        // $scope.kode = $scope.data.kodebuku;
        // $scope.judul = $scope.data.judul;
        // $scope.penulis = $scope.data.penulis;
        // $scope.penerbit = $scope.data.penulis;

        $scope.simpan = function() {
            //generate kode
            //$scope.kode = $scope.judul.substring(0, 4).toUpperCase() + "-" + $scope.data.id_buku;
            //nmcat
            $scope.nmcat = allb.options[allb.selectedIndex].getAttribute("nama");
            console.log($scope.nmcat);
            //data
            // var data = {
            //     kode: $scope.kode,
            //     jenis_id: $scope.jenis_id,
            //     judul: $scope.judul,
            //     penulis: $scope.penulis,
            //     penerbit: $scope.penerbit,
            //     nmcat: $scope.nmcat
            // }
            //saving
            $http.post('{{url('updBuku')}}', {
                    nmcat: $scope.nmcat,
                    _token: '{{csrf_token()}}'

                }).then(function(reply) {
                alert("Data Buku sudah diubah");
                //$.growl.notice({title: "[INFO]", message: "Data Buku Berhasil Disimpan"});
                // $window.location.replace("viewBuku");
                });
        }

        //

    });
</script>
@endsection