<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
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

    .bg-utama{
        background-color: #c1aad4;
    }
    .loading {
  position: relative;
  }

  .loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
  }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top mb-5">
    <a class="navbar-brand logo" id="resetOrderBtn" href="/shop"><img src="{{asset('utilitie')}}/img/lgo.PNG" class="mr-3" alt="Logo"><span class="font-weight-bolder">Snack Andayani</span></a>
    
  </nav>

  <div class="container-fluid">
    <div class="row px-xl-5 justify-content-center">
        <div class="col-lg-4">
            <div class="card border-secondary mb-3">
                <div class="card-header bg-utama border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <form method="post" action="{{route('save')}}" id="mycart">
                  @csrf
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3" id="cartItemsList"></h5>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold" id="totalPrice"></h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary" style="margin-bottom: 4rem;">
                <div class="card-header bg-utama border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio d-flex justify-content-between">
                            <input type="radio" class="custom-control-input" name="pay" id="paypal">
                            <label class="custom-control-label" for="paypal"><img src="{{asset('utilitie')}}//img/dana.webp" alt="" width="60px"></label>
                            <span style="text-align: end;">+62 895 6208 39555</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio d-flex justify-content-between">
                            <input type="radio" class="custom-control-input" name="pay" id="directcheck" >
                            <label class="custom-control-label" for="directcheck"><img src="{{asset('utilitie')}}//img/gpy.png" alt="" width="80px"></label>
                            <span>+62 822 7454 4877</span>
                        </div>
                    </div>
                    
                </div>
                  <div class="" id="formCart">
                    <h5 class="font-weight-medium mb-3" id="isi"></h5>
                  </div>

                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block bg-utama font-weight-bold my-3 py-3" type="submit" id="placeOrderBtn">Place Order</button>
                </div>
                </form>

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

    <script>
       $(document).ready(function() {
      // Get cart items from Local Storage
      let cartItems = localStorage.getItem('cartItems');
      cartItems = cartItems ? JSON.parse(cartItems) : [];


      $('#cartItemsList').addClass('loading');

// Update cart items UI
function updateCartItems() {
  // Show loading state

  // Simulate async request
  setTimeout(function() {
    // Remove loading state
    $('#cartItemsList').removeClass('loading');

    if (cartItems.length === 0) {
      $('#cartItemsList').append('<p>Your cart is empty.</p>');
    } else {
      const totalPrice = calculateTotalPrice();

      for (const item of cartItems) {
        $('#cartItemsList').append(`
          <div class="d-flex justify-content-between">
            <p>${item.quantity}</p>
            <p>${item.name}</p>
            <p>Rp. ${item.price}</p>
          </div>
        `);
      }

      for (const itemform of cartItems) {
        $('#mycart').append(`
          <input type="hidden" name="nama[]" value="${itemform.name}" readonly>
          <input type="hidden" name="harga[]" value="${itemform.price}" readonly>
          <input type="hidden" name="qty[]" value="${itemform.quantity}" readonly>
        `);
      }

      $('#totalPrice').text(`Rp. ${totalPrice.toLocaleString()}`);
      $('#mycart').append(`<input type="hidden" name="total" value="${totalPrice}" readonly>`);
    }
  }, 1000); // Simulating 1 second delay for demonstration purposes
}

      // Calculate total price
      function calculateTotalPrice() {
        let totalPrice = 0;

        for (const item of cartItems) {
          totalPrice += item.price * item.quantity;
        }

        return totalPrice;
      }

      // Place order button click event
      $('#placeOrderBtn').click(function() {
        if (cartItems.length > 0) {
          // Perform place order process
          alert('Order placed successfully!');
          cartItems = []; // Clear the cartItems array
          localStorage.removeItem('cartItems'); // Remove cartItems from Local Storage
          updateCartItems();
        } else {
          alert('Your cart is empty. Add some products before placing an order.');
        }
      });

      $('#resetOrderBtn').click(function() {
        if (cartItems.length > 0) {
          // Perform place order process
          cartItems = []; // Clear the cartItems array
          localStorage.removeItem('cartItems'); // Remove cartItems from Local Storage
          updateCartItems();
        } else {
          alert('Your cart is empty. Add some products before placing an order.');
        }
      });

      // Update cart items UI when page loads
      updateCartItems();
    });
      </script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</body>
</html>
