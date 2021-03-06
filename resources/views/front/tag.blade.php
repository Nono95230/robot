@extends('layouts.master')

@section('title', 'Tag')

@section('sidebar')
    @parent
@endsection

@section('content')
<h3>{{ $title }}</h3>


    @foreach ($robots as $robot)
        @if ($robot->status === 'published')
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ url('images', $robot->link)  }}">
                            <span class="card-title">Robot : {{ $robot->name }}</span>
                        </div>
                        <div class="card-content">
                            @if ( strlen($robot->description) > $limit )
                                <p>{{ substr($robot->description,0, $limit) }}...</p>
                            @else
                                <p>{{ $robot->description }}</p>
                            @endif

                            @include('partials.tags')
                        </div>
                        <div class="card-action">
                            <a href="/robot/{{ $robot->id }}/{{$robot->slug}}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
