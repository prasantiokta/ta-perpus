@extends('../template')

@section('title','Detail Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">Detail Peminjaman</h3>
        <hr width="40%">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('vDetail',$mainList->id)}}" method="post">
                    @csrf
                    <div class="wrap">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Kode Pinjam</label>
                                    <input type="text" class="form-control" id="kodepinjam" name="kodepinjam" value="{{$mainList->kodepinjam}}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">ID Anggota</label>
                                    <input type="text" class="form-control" id="anggota_id" name="anggota_id" value="{{$mainList->anggota_id}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">ID Pustakawan</label>
                                    <input type="text" class="form-control" id="pustakawan_id" name="pustakawan_id" value="{{$mainList->pustakawan_id}}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Waktu Pinjam</label>
                                    <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{$mainList->tgl_pinjam}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Waktu Kembali</label>
                                    <input type="text" class="form-control" id="tgl_kembali" name="tgl_kembali" value="{{$mainList->tgl_kembali}}" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama Anggota</label>
                                    <input type="text" class="form-control" id="nmangg" name="nmangg" value="{{$mainList->nmangg}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nama Pustakawan</label>
                                    <input type="text" class="form-control" name="nmpust" id="nmpust" value="{{$mainList->nmpust}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning"><i class="fas fa-check-circle"></i>&nbsp;&nbsp;&nbsp;Kembali</button>

            </div>
        </div>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#myTable').DataTable({
    //         // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    //         // dom: 'Blfrtip',
    //         // buttons: ['excel','print'],
    //         // "lengthChange": true
    //     });
    // });

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        //vars 


    });
</script>
@endsection