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

    .login-card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            margin-top: 70px;
        }

    
    .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #c1aad4;
            color: white;
            padding: 10px;
        }
        .alert-fixed {
    position:fixed; 
    top: 20px; 
    right: 20px; 
    width: 500px;
    z-index:9999; 
    border-radius:3px;
    color: #ffffff
    
}


  </style>
</head>
<body>

  @if (\Session::has('pesan'))
  <div class="alert alert-success alert-fixed" role="alert" id="alert-success">
    <i class="fas fa-check"></i>
    {!! \Session::get('pesan') !!}
  </div> 
  @elseif (\Session::has('gagal'))
  <div class="alert alert-danger alert-fixed" role="alert" id="gagal">
    <i class="fas fa-times"></i>
    {!! \Session::get('gagal') !!}
  </div>
   @endif
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand logo" href="{{url('/')}}"><img src="{{asset('utilitie')}}/img/lgo.PNG" class="mr-3" alt="Logo"><span class="font-weight-bolder">Snack Andayani</span></a>
  </nav>

  <div class="container ">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card login-card">
                <div class="card-body">
                  <h5 class="card-title pb-4" style="text-align: center">Login || <a style="text-decoration: none" href="{{url('/register')}}">Register</a></h5>
                    <form class="user" method="post" action="{{ url('login/process') }}">
                        @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Enter Email Address...">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" 
                                            id="password" placeholder="Password">
                                            @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                
                                    <button type="submit" class="btn btn-primary btn-user btn-block" style="background-color: #c1aad4; border-color: #c1aad4">
                                        {{ __('Login') }}
                                    </button>

                                </form>
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
      setTimeout(function() {
          document.getElementById('alert-success').style.display = 'none';
      }, 3000);
      setTimeout(function() {
          document.getElementById('#gagal').style.display = 'none';
      }, 3000);
  </script>
</body>

</body>
</html>
