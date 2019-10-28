@extends('../template')

@section('title','Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <br>
    <div style="padding: 8px;">
        <h3 class="mt-3">List Peminjaman</h3>

        <!-- Button tambah peminjaman -->
        <a href="{{ route('addPeminjaman') }}" class="btn btn-info mt-3"><i class="fas fa-plus-circle fa-fw"></i>&nbsp;Tambah</a>
    
        <table class="table table-striped mt-5" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pinjam</th>
                    <th>Anggota</th>
                    <th>Pustakawan</th>
                    <th>Tgl. Pinjam</th>
                    <th>Tgl. Kembali</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($list as $key => $b)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$b->kodepinjam}}</td>
                    <td>{{$b->nmangg}}</td>
                    <td>{{$b->nmpust}}</td>
                    <td>{{$b->tgl_pinjam}}</td>
                    <td>{{$b->tgl_kembali}}</td>
                    <!-- <td>
                        <button ng-click="hapus({{$b->id}})" idnya="{{$b->id}}" id="delbtn" class="btn btn-danger"><i class="fas fa-trash fa-fw"></i></button>
                    </td> -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        //vars 
        

    });
</script>
@endsection