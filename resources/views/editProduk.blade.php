@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">
    <form method="POST" action="{{url('/admin/update-produk')}}/{{$data->id}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Produk</p>
              <button class="btn btn-primary btn-sm ms-auto">Submit</button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nama Produk</label>
                  <input class="form-control" name="nama" type="text" value="{{$data->nama}}">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Kategori</label>
                  <input class="form-control" name="kategori" type="text" value="{{$data->kategori}}">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Harga</label>
                  <input class="form-control" name="harga" type="number" value="{{$data->harga}}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-profile">
            @if ($data->foto == null)
                <img src="{{asset('utilitie')}}/img/upload.png" alt="Image placeholder" class="card-img-top" id="output">
                @else
                <img src="{{asset($data->foto)}}" alt="Image placeholder" class="card-img-top" id="output">
                @endif
          <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
            <div class="d-flex justify-content-between">
                <label class="form-label m-1 btn-primary" for="formFile">Upload</label>
                <input type="file" class="form-control d-none" name="foto" id="formFile"
                accept=".jpeg, .jpg, .png" onchange="loadFile1(event)" />
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    var loadFile1 = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };
  </script>
@endsection
