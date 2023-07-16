<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link id="pagestyle" href="{{asset('master')}}/assets/css/abc.css" rel="stylesheet" />
  
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top mb-5">
    <a class="navbar-brand logo" href="/shop"><img src="{{asset('utilitie')}}/img/lgo.PNG" class="mr-3" alt="Logo"><span class="font-weight-bolder">Snack Andayani</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{Auth::user()->nama}}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
              
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{Auth::user()->nama}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Nama</label><input type="text" class="form-control" placeholder="enter phone number" value=" {{Auth::user()->nama}}"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="email" class="form-control" placeholder="enter email id" value=" {{Auth::user()->email}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{Auth::user()->no_hp}}"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address line 1" value=" {{Auth::user()->alamat}}"></div>
            
                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Order</span></div><br>
                <table class="table table-bordered table-sm table-responsive" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Pay</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Cart</th>
                            <!-- Add other cart-related headers here -->
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($data as $order)
                        <tr>
                            <td>{{ $order->kode }}</td>
                            <td>{{ $order->pay }}</td>
                            <td>@money($order->total)</td>
                            <td>
                                <div class="{{ $order->status }}">
                                {{ $order->status }}
                                </div>
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @php
                                    $bb = $order->id;
                                    $carts = \App\Models\Cart::where('order_id', $bb)->get();
                                @endphp
                                <table rules="none" class="table  table-borderless table-responsive" style="width: 100%; border-color: #f3f3f3">
                                    <thead>
                                        <tr>
                                            <th>qty</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{$cart->qty}}</td>
                                            <td>{{ $cart->nama }}</td>
                                            <td>@money($cart->harga)</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$data->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
</div>
</div>
  

  <footer class="footer">
    <div class="container text-center">
      <p>&copy; Snack Andayani. All Rights Reserved.</p>
    </div>
  </footer>

  <a href="#" class="btn btn-success floating-button"><i class="bi bi-whatsapp"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
    <script src="js/main.js"></script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</body>
</html>
