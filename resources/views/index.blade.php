@extends('layout.main')

@section('container')
    @if ($errors->any())
      <div>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif
    
    <div class="row" >
        <div class="border bg-light md-6 text-justif p-4 h-100">
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
        <div class=" border bg-light p-4">
            <div class="list-group text-center">
              
              @foreach($data as $datas)
              <div class="mb-3">
                <a href="javascript:main()" class="list-group-item list-group-item-action active mb">
                  <div class="row">
                    <div class="col">
                        <img src="/image/{{ $datas->path }}" class="img-thumbnail" alt="">
                    </div>
                    <div class="col-9">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1 text-wrap">{{ $datas->name }}</h5>
                            
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <small>{{ $datas->updated_at->diffForHumans() }}</small>
                          </div>
                          <div class="col-6">
                            <small>{{ $datas->size }}</small>
                        </div>
                          </div>
                        
                    </div>
                  </div>
                  
                  <div>
                    <a href="/item/delete/{{ $datas->id }}" class="btn btn-danger text-center" style="width: 20%; text-align: center">Hapus</a>
                  </div>
                </a>
              </div>
              @endforeach
              </div>
            </div>
        </div>
    </div>
    
    
    
    <script type="text/javascript" charset="utf-8">
      function main(){
        
      }
    </script>
@endsection