@extends('../template')

@section('title','Koleksi Buku')
@section('page')
<div class="container shadow-lg">
    <br><br>
    <div style="padding: 8px;">
    <h4 class="mt-3">Koleksi Buku</h4>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle fa-fw"></i>&nbsp;Tambah</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4>
                        Tambah Koleksi
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ url('/post') }}" method="post">
                        @csrf
                        <div class="wrap">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="idkategori" class="form-control" required>
                                            <option value=""> Pilih </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Kode Buku</label>
                                        <input type="text" class="form-control" id="" name="kode">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" class="form-control" id="" name="judul">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Penulis</label>
                                        <input type="text" class="form-control" id="" name="penulis">
                                    </div>
                                </div>
                                <div class="col">
                                     <div class="form-group">
                                        <label for="">Penerbit</label>
                                        <input type="text" class="form-control" id="" name="penerbit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 
                        
                        
                       
                        
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" class="form-control" id="" name="status">
                        </div> -->
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>

        </div>
    </div>

    <table class="table table-striped mt-5">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Penulis</th>
            <th>Status</th>
        </tr>
        @foreach($bukux as $key => $b)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$b->jenis_id}}</td>
            <td>{{$b->kodebuku}}</td>
            <td>{{$b->judul}}</td>
            <td>{{$b->penerbit}}</td>
            <td>{{$b->penulis}}</td>
            <td>{{$b->status}}</td>
            <td>
                <a href="" class="btn btn-primary">Edit</a>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    <br><br>
</div>
@endsection