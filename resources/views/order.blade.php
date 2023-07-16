@extends('layouts.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-4 text-end">
      <div class="row px-4 py-2">
        <div class="col-6 d-flex align-items-center">
          <h6 class="mb-0">Member</h6>
        </div>
        <div class="col-6 text-end">
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Member</h6>
        </div>
        <div class="card-body px-5 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0" id="tabelAnda">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Kode Pesanan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Total</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                  <th></th>
                  
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>

                  <td>
                    <div class="d-flex" style="padding-left: 2%">
                      <div class="my-auto">
                          <h6 class="mb-0 text-sm">{{ $item->kode}}</h6>
                      </div>
                    </div>
                    
                  </td>
                  
                  <td>
                    <div class="d-flex" style="padding-left: 20%">
                      <div class="my-auto">
                          <h6 class="mb-0 text-sm">{{ $item->member->nama}}</h6>
                      </div>
                    </div>
                    
                  </td>

                  <td>
                    <div class="d-flex">
                      <div class="my-auto">
                          <h6 class="mb-0 text-sm">@money($item->total)</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span  class="text-xs font-weight-bold {{ $item->status }}">{{ $item->status }}</span>
                  </td>
                  {{-- <td>
                    <p class="text-sm font-weight-bold mb-0">{{ $item->no_hp}}</p>
                  </td>
                  <td>
                    <span class="text-xs font-weight-bold">{{$item->alamat}}</span>
                  </td> --}}
                  <td class="align-middle">
                    <a class="" href="{{url('admin/order-detail')}}/{{$item->id}}"><i class="fas fa-eye"></i></a>                  
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
