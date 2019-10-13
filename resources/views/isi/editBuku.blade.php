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
                                <select id="opt" name="jenis_id" class="form-control">
                                    <option value="{{$result->jenis_id}}">{{$result->nmcat}}</option>
                                    <option disabled="">-----------------------------------</option>
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
                <button class="btn btn-success" ng-click="simpan()">Simpan</button>
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

        $scope.simpan = function() {
            $.growl.notice({ message: "Data Buku sudah diedit" });
        }

        //

    });
</script>
@endsection