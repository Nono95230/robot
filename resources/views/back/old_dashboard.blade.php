@extends('layouts.master')

@section('title', 'DashBoard')


@section('style')
  <style >
    #credits li,
    #credits li a {
      color: white;
    }

    #credits li a {
      font-weight: bold;
    }

    .footer-copyright .container,
    .footer-copyright .container a {
      color: #BCC2E2;
    }

    .fab-tip {
      position: fixed;
      right: 85px;
      padding: 0px 0.5rem;
      text-align: right;
      background-color: #323232;
      border-radius: 2px;
      color: #FFF;
      width: auto;
    }
    .waves-effect.show-overflow{
      overflow:visible;
    }

  </style>
@endsection


@section('content_header')
<div class="row">
    <div class="col s12">
    <h2>@yield('title')</h2>
  </div>
</div>
@endsection

@section('content')
    
<div class="row">

    <div class="col m6 s12">
      <div style="padding: 35px;" align="center" class="card">
        <div class="row">
          <div class="card-title">
            <b>User Management</b>
          </div>
        </div>

        <div class="row">
          <div class="col m1 l2">&nbsp;</div>
          <a href="#!">
            <div style="padding: 30px;" class="grey lighten-3 col l8 m10 s12 waves-effect show-overflow">
              <img src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989969/people_2_knqa3y.png" class="responsive-img" /><br>
              <span class="indigo-text text-lighten-1"><h5>List</h5></span>
              <span class="btn-floating left halfway-fab waves-effect waves-light btn right red-site">26</span>
              <a class="btn-floating right halfway-fab waves-effect waves-light btn right red-site"><i class="material-icons">add</i></a>
            </div>
          </a>
          <div class="col m1 l2">&nbsp;</div>
        </div>
      </div>
    </div>

    <div class="col m6 s12">
      <div style="padding: 35px;" align="center" class="card">
        <div class="row">
          <div class="card-title">
            <b>Robot Management</b>
          </div>
        </div>
        <div class="row">
          <div class="col m1 l2">&nbsp;</div>
          <a href="#!">
            <div style="padding: 30px;" class="grey lighten-3 col l8 m10 s12 waves-effect show-overflow">
              <img src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989970/product_mdq6fq.png" class="responsive-img" /><br>
              <span class="indigo-text text-lighten-1"><h5>List</h5></span>
              <span class="btn-floating left halfway-fab waves-effect waves-light btn right red-site">26</span>
              <a class="btn-floating right halfway-fab waves-effect waves-light btn right red-site"><i class="material-icons">add</i></a>
            </div>
          </a>
          <div class="col m1 l2">&nbsp;</div>
        </div>
      </div>
    </div>

</div>

<div class="row">

  <div class="col m6 s12">
    <div style="padding: 35px;" align="center" class="card">
      <div class="row">
        <div class="card-title">
          <b>Category Management</b>
        </div>
      </div>
      <div class="row">
        <div class="col m1 l2">&nbsp;</div>
        <a href="#!">
          <div style="padding: 30px;" class="grey lighten-3 col l8 m10 s12 waves-effect show-overflow">
            <img src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989969/squares_dylwo9.png" class="responsive-img" /><br>
            <span class="indigo-text text-lighten-1"><h5>List</h5></span>
            <span class="btn-floating left halfway-fab waves-effect waves-light btn right red-site">26</span>
            <a class="btn-floating right halfway-fab waves-effect waves-light btn right red-site"><i class="material-icons">add</i></a>
          </div>
        </a>
        <div class="col m1 l2">&nbsp;</div>

      </div>
    </div>
  </div>

  <div class="col m6 s12">
    <div style="padding: 35px;" align="center" class="card">
      <div class="row">
        <div class="card-title">
          <b>Tag Management</b>
        </div>
      </div>

      <div class="row">
        <div class="col m1 l2">&nbsp;</div>
        <a href="#2">
          <div style="padding: 30px;" class="grey lighten-3 col l8 m10 s12 waves-effect show-overflow">
            <img src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989969/brand_lldqpu.png" class="responsive-img" /><br>
            <span class="indigo-text text-lighten-1"><h5>List</h5></span>
            <span class="btn-floating left halfway-fab waves-effect waves-light btn right red-site">26</span>
            <a href="#1" class="btn-floating right halfway-fab waves-effect waves-light btn right red-site"><i class="material-icons">add</i></a>
          </div>
        </a>
        <div class="col m1 l2">&nbsp;</div>

      </div>
    </div>
  </div>

</div>
    

@endsection





