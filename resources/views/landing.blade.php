<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keripik</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f2f2f2;
    }

    .navbar {
      background-color: #c1aad4;
    }

    .utama{
        color: #c1aad4;
    }

    .logo img {
      height: 50px;
    }

    .sidebar {
      background-color: #f2f2f2;
      padding: 10px;
    }

    .sidebar h2 {
      margin-bottom: 20px;
    }

    .card {
      margin-bottom: 20px;
    }

    .footer {
      background-color: #c1aad4;
      color: white;
      padding: 20px;
    }
    .floating-button {
      position: fixed;
      bottom: 30px;
      right: 30px;
    }
    .kanan{
        float: right;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top mb-5">
    <a class="navbar-brand logo" href="#"><img src="{{asset('utilitie')}}/img/lgo.PNG" class="mr-3" alt="Logo"><span class="font-weight-bolder">Snack Andayani</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @if(!Auth::check())
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/register')}}">Register</a>
        </li>
      </ul>
    </div>
    @else
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{Auth::user()->nama}}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="{{url('/profil')}}">Profile</a>
              <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
              
            </div>
          </div>
        </li>
      </ul>
    </div>
   
    @endif
  </nav>
  <div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-8">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Kategori</h5>
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="price-all">
                        <label class="custom-control-label" for="price-all">All Product</label>
                        <span class="badge border font-weight-normal">12</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-1">
                        <label class="custom-control-label" for="price-1">Kentang</label>
                        <span class="badge border font-weight-normal">7</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-2">
                        <label class="custom-control-label" for="price-2">Ubi Baja</label>
                        <span class="badge border font-weight-normal">5</span>
                    </div>
                </form>
            </div>
            <!-- Price End -->
            
        </div>
      <div class="col-lg-7">
        <div class="row">
            <div class="col-12 pb-1">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by name">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                    <div class="dropdown ml-4">
                        <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                    Sort by
                                </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="#">Latest</a>
                            <a class="dropdown-item" href="#">Popularity</a>
                            <a class="dropdown-item" href="#">Best Rating</a>
                        </div>
                    </div>
                      
                </div>
            </div>
          @foreach ($data as $item)
          <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                  @if ($item->foto == null)
                  <img class="img-fluid w-100" src="{{asset('master')}}/assets/img/not.jpg" alt="">
                  @else
                  <img class="img-fluid w-100" src="{{asset($item->foto)}}" alt="">
                  @endif
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="card-title text-truncate mb-3">{{$item->nama}}</h6>
                    <div class="d-flex justify-content-center">
                        <p class="card-text">@money($item->harga)</p>
                        <p class="harga d-none">{{ $item->harga}}</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border text-center">
                  @if (!Auth::check())
                    <a class="btn btn-sm text-dark p-0" href="/login"><i class="bi bi-cart-fill utama mr-1"></i>Add to Cart</a>
                  @else
                  <button class="btn btn-sm text-dark p-0 addToCartBtn" data-product-id="{{$item->id}}"><i class="bi bi-cart-fill utama mr-1"></i>Add to Cart</button>
                  @endif

                </div>
            </div>
          </div>
          @endforeach
        </div>
        
      </div>
      <div class="col-lg-3 mb-5">
        <h2>Shopping Cart</h2>
        <ul id="cartItemsList" class="list-group mb-3"></ul>
        <p id="totalPrice"></p>
        @if (Auth::check())
        <button id="checkoutBtn" class="btn btn-primary">Checkout</button>
          
        @else
          <a href="/login" class="btn btn-primary">Checkout</a>
        @endif
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

    <script>
        $(document).ready(function() {
          // Cart data
          let cartItems = localStorage.getItem('cartItems');
            cartItems = cartItems ? JSON.parse(cartItems) : [];
    
          // Add to cart button click event
          $('.addToCartBtn').click(function() {
            const productId = $(this).data('product-id');
            const productName = $(this).closest('.card').find('.card-title').text();
            const productPrice = $(this).closest('.card').find('.harga').text().replace('Rp. ', '');
            // Check if the product is already in the cart
            const existingItem = cartItems.find(item => item.id === productId);
            if (existingItem) {
              existingItem.quantity++; // Increment the quantity
            } else {
              const cartItem = { id: productId, name: productName, price: parseFloat(productPrice), quantity: 1 };
              cartItems.push(cartItem);
            }
    
            updateCart();

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
          });
    
          // Decrease button click event
          $(document).on('click', '.decreaseBtn', function() {
            const productId = $(this).data('product-id');
            const existingItem = cartItems.find(item => item.id === productId);
            if (existingItem && existingItem.quantity > 1) {
              existingItem.quantity--; // Decrease the quantity
              localStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update local storage
              updateCart();
            }
          });
    
          // Increase button click event
          $(document).on('click', '.increaseBtn', function() {
          const productId = $(this).data('product-id');
          const existingItem = cartItems.find(item => item.id === productId);
          if (existingItem) {
            existingItem.quantity++; // Increase the quantity
            localStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update local storage
            updateCart();
          }
        });
    
          // Delete button click event
          $(document).on('click', '.deleteBtn', function() {
            const productId = $(this).data('product-id');
            const itemIndex = cartItems.findIndex(item => item.id === productId);
            if (itemIndex !== -1) {
              cartItems.splice(itemIndex, 1); // Remove the item from the cartItems array
              localStorage.setItem('cartItems', JSON.stringify(cartItems)); // Update local storage
              updateCart();
            }
          });
    
          // Update cart UI
          function updateCart() {
            $('#cartItemsList').empty();
            let totalPrice = 0;
    
            for (const item of cartItems) {
              const listItem = `
                <li class="list-group-item">
                  ${item.name} - Rp. ${item.price}
                  <div class="quantity mt-2">
                    <button class="btn btn-sm decreaseBtn" data-product-id="${item.id}">-</button>
                    <span class="item-quantity">${item.quantity}</span>
                    <button class="btn btn-sm  increaseBtn" data-product-id="${item.id}">+</button>
                    <button class="btn btn-sm btn-danger kanan deleteBtn" data-product-id="${item.id}"><i class="bi bi-trash"></i></button>
                  </div>
                </li>`;
              $('#cartItemsList').append(listItem);
              totalPrice += item.price * item.quantity;
            }
    
            $('#totalPrice').text(`Total Harga: Rp. ${totalPrice.toLocaleString()}`);
          }

          $('#checkoutBtn').click(function() {
            if (cartItems.length > 0) {
                // Redirect to checkout.html
                window.location.href = '/checkout';
            } else {
                alert('Your cart is empty. Add some products before checkout.');
            }
            });

        updateCart();
        });
      </script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</body>
</html>
