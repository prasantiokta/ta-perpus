@extends('../template')

@section('title','Edit Buku')
@section('page')
<div class="container">
	<h4 class="mt-3">Edit Buku</h4>
	<!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>
                            Edit Koleksi
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('updBuku',$data->id)}}" method="post">
                            @csrf
                            <div class="wrap">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <select id="jenis_id" ng-model="jenis_id" name="jenis_id" class="form-control" required>
                                                @foreach($category as $data)
                                                <option value="{{$data->id}}">{{$data->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Judul</label>
                                            <input type="text" class="form-control" id="judul" ng-model="judul" name="judul" value="{{$data->judul}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Penulis</label>
                                            <input type="text" class="form-control" id="penulis" ng-model="penulis" name="penulis" value="{{$data->penulis}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Penerbit</label>
                                            <input type="text" class="form-control" id="penerbit" ng-model="penerbit" name="penerbit" value="{{$data->penerbit}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" ng-click="simpan()">Simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
                </div>
</div>
@endsection