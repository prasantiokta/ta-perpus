@extends('../template')

@section('title','Pengembalian')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">List Pengembalian</h3>
        <hr width="40%"><br>

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
                        <a href="vDetail/{{$b->pinjam_id}}" id="detail" class="btn btn-info" title="Detail"><i class="fas fa-eye fa-fw"></i></a>
                        @if($b->tgl_kembali >= $today)
                        <a href="kembaliBuku/{{$b->id}}" id="kembali" class="btn btn-primary"  title="Kembalikan"><i class="fas fa-check fa-fw"></i></a>
                        @elseif($b->tgl_kembali < $today)
                        <a href="byrDenda/{{$b->id}}" class="btn btn-danger"  title="Denda"><i class="fas fa-list fa-fw"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="ModalDenda" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>
                            Denda
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;&nbsp;Batal</button>
                    </div>
                </div>

            </div>
        </div>
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

        //today date
        var dateNow = $filter('date')(new Date(), 'yyyy-MM-dd');
        $scope.year = dateNow.substring(0,4);
        $scope.month = dateNow.substring(5,7);
        $scope.day = dateNow.substring(8,10);
        $scope.today = $scope.year + "-" + $scope.month + "-" + $scope.day;

    });
</script>
@endsection