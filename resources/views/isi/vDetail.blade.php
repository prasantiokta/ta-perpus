@extends('../template')

@section('title','Detail Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">Detail Peminjaman</h3>
        <hr width="40%">
        		<form action="{{route('vDetail',$mainList->id)}}" method="post">
                    @csrf
                    <div class="wrap">
                    	<div class="row">
                    		<div class="col">
                    			<div class="row">
                    				<div class="col">
                    					<div class="form-group">
		                                    <label for="">Kode Pinjam</label>
		                                    <input type="text" class="form-control" id="kodepinjam" name="kodepinjam" value="{{$mainList->kodepinjam}}" readonly>
		                                </div>
                    				</div>
                    			</div>
                    			<div class="row">
                    				<div class="col">
                    					<div class="form-group">
		                                    <label for="">Nama Anggota</label>
		                                    <input type="text" class="form-control" id="nmangg" name="nmangg" value="{{$mainList->nmangg}}" readonly>
		                                </div>
                    				</div>
                    				<div class="col">
                    					<div class="form-group">
		                                    <label for="">Nama Pustakawan</label>
		                                    <input type="text" class="form-control" name="nmpust" id="nmpust" value="{{$mainList->nmpust}}" readonly>
		                                </div>
                    				</div>
                    			</div>
                    			<div class="row">
                    				<div class="col">
                    					<div class="form-group">
		                                    <label for="">Waktu Pinjam</label>
		                                    <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{$mainList->tgl_pinjam}}" readonly>
		                                </div>
                    				</div>
                    				<div class="col">
                    					<div class="form-group">
		                                    <label for="">Waktu Kembali</label>
		                                    <input type="text" class="form-control" id="tgl_kembali" name="tgl_kembali" value="{{$mainList->tgl_kembali}}" readonly>
		                                </div>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="col">
                    			
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col">
                    			
                    		</div>
                    	</div>
                    </div>
                </form>

                <div class="box">
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
		        </div>
		    <br><br>
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