@extends('../template')

@section('title','Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">List Peminjaman</h3>
        <hr width="40%">
        <!-- Button tambah peminjaman -->
        <a href="{{ route('addPeminjaman') }}" class="btn btn-success mt-3"><i class="fas fa-plus-circle fa-fw"></i>&nbsp;&nbsp;&nbsp;Tambah</a><br><br>
    
        <table class="table table-stripped table-striped table-bordered mt-5" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pinjam</th>
                    <th>Anggota</th>
                    <th>Pustakawan</th>
                    <th>Tgl. Pinjam</th>
                    <th>Tgl. Kembali</th>
                    <th>Aksi</th>
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
                    <td class="text-center">
                        <a href="showDetail/{{$b->id}}" id="detail" class="btn btn-info"><i class="fas fa-eye fa-fw"></i>&nbsp;&nbsp;&nbsp;Detail</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
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
        
        $scope.detail = function() {
            // body...
            $.growl.warning({ message: "Tunggu . . ." });
        }

    });
</script>
@endsection