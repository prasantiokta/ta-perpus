@extends('../template')

@section('title','Rekapan')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">List Rekapan</h3>
        <hr width="40%">

        <table class="table table-stripped table-striped table-bordered mt-5" id="myTable">
            <thead>
                <tr>
                    <th width="20px" class="text-center">No</th>
                    <th class="text-center">Kode Pinjam</th>
                    <th class="text-center">Anggota</th>
                    <th class="text-center">Pustakawan</th>
                    <th class="text-center">Tgl. Pinjam</th>
                    <th class="text-center">Tgl. Kembali</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $key => $b)
                <tr>
                    <td>{{$key+1}}.</td>
                    <td>{{$b->kodepinjam}}</td>
                    <td>{{$b->nmangg}}</td>
                    <td>{{$b->nmpust}}</td>
                    <td>{{$b->tgl_pinjam}}</td>
                    <td>{{$b->tgl_kembali}}</td>
                    <td class="text-center">
                        <a href="dtlRekap/{{$b->id}}" id="detail" class="btn btn-info" title="Detail"><i class="fas fa-eye fa-fw"></i></a>
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
            $.growl.warning({
                message: "Tunggu . . ."
            });
        }

    });
</script>
@endsection