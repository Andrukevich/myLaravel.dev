@extends('layouts.app')

@section('content')
    @foreach($lastNews as $news)
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">{{ $news->title }}</span></h2>
                <p class="lead">{{ str_limit($news->description) }}</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">
    @endforeach
@endsection