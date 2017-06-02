@extends('layouts.master')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('content')
    @if(!empty($robot))
        <div class="row">
            <div class="col s12">
                <div class="card">
                    @if($robot->link == null)
                    <h2>Robot : {{ $robot->name }}</h2>    
                    @else
                        <div class="card-image">
                            <img src="{{ url('images', $robot->link)  }}">
                            <span class="card-title">Robot : {{ $robot->name }}</span>
                        </div>
                    @endif
                    <div class="card-content">
                        <p>{{ $robot->description }}</p>
                        
                        @include('partials.tags')

                        <p>This article was publihed at : {{ $robot->published_at }}</p>
                        <p>Catégorie : {{ $category }}</p>
                    </div>

        
                </div>
            </div>
        </div>
    @endif

@endsection
