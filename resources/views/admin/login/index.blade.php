<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="/css/login.css" rel="stylesheet">

    <title>Zevanyastore</title>
  </head>
  <body class="container">
      
    <main class="mt-5">
      <div class="row justify-content-center">
    <div class="col-lg-5">
      <main class="form-signin">
        
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if (session()->has('loginFailed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginFailed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="wrapper fadeInDown">
          <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
              <h1 class="mt-5">Login</h1>
            </div>

            <!-- Login Form -->
            <form action="/login" method="POST">
              @csrf
              <input type="email" id="email" class="fadeIn second" name="email" placeholder="login" value="{{ old('email') }}" required autofocus>
              <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
              {{-- <input type="submit" class="fadeIn fourth" value="Log In"> --}}
              <button class="fadeIn fourth" type="submit">Login</button>
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
              <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

          </div>
        </div>
      </main>
    </div>
  </div>
    </main>
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>