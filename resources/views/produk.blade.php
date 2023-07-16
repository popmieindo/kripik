@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-4 text-end">
      <div class="row px-4 py-2">
        <div class="col-6 d-flex align-items-center">
          <h6 class="mb-0">Produk</h6>
        </div>
        <div class="col-6 text-end">
          <a href="{{route('add')}}" class="btn btn-outline-primary btn-sm mb-0"><i class="fas fa-plus me-1"></i>add</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Keripik</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                  <td>
                    <div class="d-flex px-2">
                      <div>
                        @if ($item->foto == null)
                        <img src="{{asset('master')}}/assets/img/not.jpg" class="avatar avatar-sm rounded-circle me-2" alt="produk">
                        @else
                        <img src="{{asset($item->foto)}}" class="avatar avatar-sm rounded-circle me-2" alt="produk">
                        @endif
                      </div>
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm">{{ $item->nama}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm font-weight-bold mb-0">{{ $item->kategori}}</p>
                  </td>
                  <td>
                    <span class="text-xs font-weight-bold">@money($item->harga)</span>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v text-xs"></i></button>
                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="{{url('admin/produk-edit')}}/{{$item->id}}"><i class="fas fa-user-edit" style="margin-right: 0.5rem"></i>  update</a>
                          <a class="dropdown-item" href="/admin/hapus-produk/{{ $item->id }}" onclick="return confirm('Hapus Produk {{ $item->nama }}?')"><i class="fas fa-trash" style="margin-right: 0.9rem"></i>  delete</a>
                        </div>                         
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
