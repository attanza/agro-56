<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    
    <title>Agro Jabar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.0/css/bulma.min.css">
    <style>
      .navbar {
        background-color: #FB9B00;
      }
    </style>
  </head>
  <body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="{{ url('/') }}">
            {{-- <img src="{{ asset('images/logo.png') }}" alt="Agro Jabar"> --}}
            <h4 class="title is-4 has-text-white">Agro Jabar</h4>
          </a>
        </div>
      </div>
    </nav>
  <section class="section">
    <div class="container">
     @yield('content')
    </div>
  </section>
  </body>
</html>