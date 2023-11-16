@extends('layout.main')

@section('container')
    <div class="row" >
        <div class="col-4 border bg-light md-6">
            <form action="index/proses" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="fileFIeld">Tambah Gambar</label>
                    <input type="file" class="form-control-file form-control-sm" id="fileFIeld" name="file">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <div class="col-8 border bg-light">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                  <div class="row">
                    <div class="col-3">
                        <img src="" class="img-thumbnail" alt="">
                    </div>
                    <div class="col-9">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                        </div>
                        <small>File size</small>
                    </div>
                  </div>
                </a>
            </div>
        </div>
    </div>
@endsection