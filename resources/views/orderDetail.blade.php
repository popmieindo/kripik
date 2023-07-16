@extends('layouts.admin')

@section('content')

<div class="row mb-3">
  <div class="col-6">
    <div class="card">
        <div class="card-body p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Nama</h6>
                  <span class="text-xs">{{$member->nama}}</span>
                </div>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Email</h6>
                    <span class="text-xs">{{$member->email}}</span>
                  </div>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Handphone</h6>
                    <span class="text-xs">{{$member->no_hp}}</span>
                  </div>
                </div>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Alamat</h6>
                    <span class="text-xs">{{$member->alamat}}</span>
                  </div>
                </div>
              </li>
          </ul>
        </div>
      </div>
  </div>
  <div class="col-6">
    <div class="card">
        <div class="card-body p-3">
          <ul class="list-group">
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Status :</h6>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <form method="POST" action="{{ route('order.updateStatus', ['id' => $data->id]) }}">
                  @csrf
                  @method('PUT')
                  <select class="form-control selectpicker" name="status" data-show-subtext="true" data-live-search="true">
                      <option value="{{ $data->status }}">{{ $data->status }}</option>
                      @foreach ($stt as $b)
                          <option value="{{ $b->nama }}">{{ $b->nama }}</option>
                      @endforeach
                  </select>
                  <button type="submit" class="btn btn-primary btn-sm">ubah</button>
                </div>
            </form>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Total</h6>
                  
                </div>
              </div>
              <div class="d-flex">
                <span class="text-bold">@money($data->total)</span>
              </div>
            </li>
            
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Payment</h6>
                  <span class="text-xs font-weight-bold">Dana</span>
                </div>
              </div>
              
             
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm"><a href="">Bukti Pembayaran</a></h6>
                    
                  </div>
                </div>
                <div class="d-flex">
                    <i class="ni ni-bold-right" aria-hidden="true"></i>
                  </div>
              </li>
          </ul>
        </div>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Detail Order</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7" style="width: 10%">Jumlah</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                  
                  
                  
                </tr>
              </thead>
              <tbody>
                
                @foreach ($cart as $item)
                <tr>
                  <td align="center">
                    <h6 class="mb-0 text-sm ">{{ $item->qty}}</h6>
                  </td>
                  <td>
                    <span class="text-xs font-weight-bold">{{ $item->nama }}</span>
                  </td>
                  <td>
                    <p class="text-sm font-weight-bold mb-0">{{ $item->harga}}</p>
                  </td>
                  {{-- <td>
                    <span class="text-xs font-weight-bold">{{$item->alamat}}</span>
                  </td> --}}
    
                  
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
