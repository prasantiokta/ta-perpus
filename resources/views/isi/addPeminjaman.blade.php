@extends('../template')

@section('title','Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <br>
    <div ng-init="idny='{{$idnya}}'" style="padding: 8px;">
        <h4 class="mt-3">Tambah Peminjaman</h4><hr><br>
        <div class="row">
        	<div class="col">
        		<div class="form-group">
                    <label for="">Pilih Anggota</label>
                    <select id="anggota_id" ng-model="anggota_id" name="anggota_id" class="form-control" required>
                        @foreach($agt as $c)
                        <option value="{{$c->id_angg}}" nama="{{$c->nmangg}}">{{$c->nmangg}}</option>
                        @endforeach
                    </select>
                </div>
        	</div>
        	<div class="col">
                	
            </div>
        </div>
        <div class="row">
        	<div class="col">
        		<div class="form-group">
        			<label>Tgl. Pinjam</label>
        			<input type="date" name="tglpinjam" class="form-control">
        		</div>
        	</div>
        	<div class="col">
        		<div class="form-group">
        			<label>Tgl. Kembali</label>
        			<input type="date" name="tglkembali" class="form-control">
        		</div>
        	</div>
        	<div class="col">

        	</div>
        	<div class="col">
        		<div class="form-group">
        			<label>Pustakawan</label>
        			<input type="text" name="nmpust">
        		</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col">
        		<div class="form-group">
        			<label>Pilih Buku</label>
        			<input type="text" name="bukue">
        		</div>
        	</div>
        	<div class="col">
        		
        	</div>
        </div>

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