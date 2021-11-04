<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
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

        <div class="text-center">
          <i class="bi bi-person-fill fs-1"></i>
        </div>
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        <form action="/login" method="POST">
          @csrf
          <div class="form-floating mb-3">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required autofocus>
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}  
              </div>   
            @enderror
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}  
              </div>   
            @enderror
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
        <div class="mt-3 text-center">
          <small >
            <a href="/register">Don't have account?</a>
          </small>
        </div>
      </main>
    </div>
  </div>
    </main>
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>