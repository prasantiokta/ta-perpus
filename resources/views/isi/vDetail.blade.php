@extends('../template')

@section('title','Detail Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">Detail Peminjaman</h3>
        <hr width="40%"><br>
        		<form action="{{route('vDetail',$mainList->id)}}" method="post">
                    @csrf
                    <div class="wrap">
                    	<div class="row">
                            <div class="col-md-1">
                            </div>
                    		<div class="col">
                    			<table class="table table-stripped">
                                    <tr>
                                        <td>Kode Peminjaman&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span>&nbsp;&nbsp;&nbsp;{{$mainList->kodepinjam}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Anggota&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span>&nbsp;&nbsp;&nbsp;{{$mainList->nmangg}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pustakawan&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span>&nbsp;&nbsp;&nbsp;{{$mainList->nmpust}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl. Pinjam&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span>&nbsp;&nbsp;&nbsp;{{$mainList->tgl_pinjam}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tgl. Kembali&nbsp;&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                        <td><span>&nbsp;&nbsp;&nbsp;{{$mainList->tgl_kembali}}</span></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>         
                                </table>
                    		</div>
                            <div class="col-md-1"></div>
                    	</div>
                        <div class="row">
                            
                        </div>
                    </div>
                </form>
                <br>
                <div class="box"><br>
		            <div class="col">
		                <table id="details" class="table table-stripped table-striped table-bordered mt-5">
		                    <thead>
		                        <tr>
		                            <td width="20px">No.</td>
		                            <td>Kategori</td>
		                            <td class="text-center">Kode Buku</td>
		                            <td class="text-center">Judul Buku</td>
		                            <td class="text-center">Penulis</td>
		                            <td class="text-center">Penerbit</td>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        @foreach($list as $key => $b)
		                        <tr>
		                            <td>{{$key+1}}</td>
		                            <td>{{$b->nmcat}}</td>
		                            <td>{{$b->kodebuku}}</td>
		                            <td>{{$b->judul}}</td>
		                            <td>{{$b->penulis}}</td>
		                            <td>{{$b->penerbit}}</td>
		                        </tr>
		                        @endforeach
		                    </tbody>
		                </table>
		            </div><br>
		        </div><br>
                <a href="{{url()->previous()}}" class="btn btn-secondary-outline" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;&nbsp;Kembali</a>
		    <br><br><br>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#details').DataTable({
            // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            // dom: 'Blfrtip',
            // buttons: ['excel','print'],
            // "lengthChange": true
        });
    });

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        //vars 


    });
</script>
@endsection