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
    
  @inject('statall','App\Services\StatAll')

  <div class="row">
    @foreach($statall->getDashboard() as $dashboard)
      <div class="col m6 s12">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="card-title">
              <b>{{ $dashboard['title'] }}</b>
            </div>
          </div>

          <div class="row">
            <div class="col m1 l2">&nbsp;</div>
            <a href="{{ $dashboard['list-link'] }}">
              <div style="padding: 30px;" class="grey lighten-3 col l8 m10 s12 waves-effect show-overflow">
                <img src="{{ $dashboard['image'] }}" class="responsive-img" /><br>
                <span class="indigo-text text-lighten-1"><h5>List</h5></span>
                <span class="btn-floating left halfway-fab waves-effect waves-light btn right red-site">{{ $dashboard['count'] }}</span>
                <a href="{{ $dashboard['add-link'] }}" class="btn-floating right halfway-fab waves-effect waves-light btn right red-site"><i class="material-icons">add</i></a>
              </div>
            </a>
            <div class="col m1 l2">&nbsp;</div>
          </div>
        </div>
      </div>

      @if($dashboard['number'] %2 === 0)
        </div><div class="row">
      @endif
    @endforeach
  </div>



@endsection





