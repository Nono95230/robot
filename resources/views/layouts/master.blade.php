<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Robot - @yield('title')</title>

    <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">

    <style>
      @media screen and (min-width: 993px) {
        body.withSidebar main,
        body.withSidebar header,
        body.withSidebar footer{
          padding-left:300px;
        }
        body.withSidebar .container{
          max-width: initial!important;
          width: 84%!important;
        }
      }


      main{
        margin-top:20px;
      }

      #nav-mobile li.search .search-wrapper {
        margin: 0 12px;
        transition: margin .25s ease;
      }
      #nav-mobile li.search .search-wrapper input#search {
        display: block;
        font-size: 16px;
        font-weight: 300;
        width: 100%;
        height: 45px;
        margin: 0;
        padding: 0 45px 0 15px;
        border: 0;
      }
      #nav-mobile li.search .search-wrapper i.material-icons {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
      }
      #nav-mobile li.search .search-results {
        margin: 0;
        border-top: 1px solid #e9e9e9;
        background-color: #fff;
      }

      .logo{
        line-height: initial!important;
      }
      .logo a#logo-container{
        height: auto!important;
        line-height: initial!important;
      }
      .logo a#logo-container img{
        width: 64px!important;
        height: auto!important;
      }
      a.collapsible-header{
        padding:0 32px!important;
      }
      .collapsible-body .collapse-custom{
        padding:0 48px 0 55px!important;
      }
      .red-site{
        background-color: #ee6e73 !important;
      }
      .btn-icon{
        padding: 0 1rem!important;
      }

      .card.alert button{
        background: none;
        border: none;
        position: absolute;
        top: 19px;
        right: 10px;
        font-size: 20px;
        color: #fff;
      }
      .card.alert ul{
        padding-left: 80px;
      }
      form .card.alert {
        margin-top: -28px;
        background-color: #E57373!important;
        background-color: #EF9A9A!important;
      }
      form .card.alert .card-content{
        padding: 10px 24px;
      }
      form .card.alert button{
        top: 5px;
      }

    </style>

    @include('partials.style')

  </head>

  <?php $classBody = '' ?>
  @if(auth()->check()) {{-- test si vous êtes connecté --}}
    <?php $classBody = 'withSidebar'; ?>
  @endif

  <body class="<?php echo $classBody; ?>">

    @include('partials.header')

    <main>
      <div class="container">
        {{-- Commentaire --}}
        {{-- @inject('stat','App\Services\StatRobot')
        
        <h1>{{ $stat->count()}}</h1> --}}

        @include('partials.flash-message')
        @yield('content_header')
        @yield('content')
      </div>
    </main>    

    @include('partials.footer')

    @include('partials.scripts')

  </body>
</html>

