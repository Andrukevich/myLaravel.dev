@extends('layouts.app')

@section('content')
    @foreach($orders as $order)

            <div class="row ng-scope">
                <div class="col-md-7 col-md-pull-3 col-md-offset-5">
                    <p class="search-results-count">About 94 700 000 (0.39 sec.) results</p>
                    <section class="search-result-item">
                        <a class="image-link" href="#"><img class="image" src="http://bootdey.com/img/Content/avatar/avatar1.png"></a>
                        <div class="search-result-item-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="search-result-item-heading"><a href="#">{{ $order->name }}</a></h4>
                                    <p class="info">Рост: {{ $order->height }}, Вес: {{ $order->weight }}</p>
                                    <p class="description">Not just usual Metro. But something bigger. Not just usual widgets, but real widgets. Not just yet another admin template, but next generation admin template.</p>
                                </div>
                                <div class="col-sm-3 text-align-center">
                                    @if($order->special_price)
                                        <p class="value3 mt-sm" style="text-decoration: line-through;">{{ $order->price }}</p>
                                        <p class="value3 mt-sm" style="color: red">{{ $order->special_price }}</p>
                                    @else
                                        <p class="value3 mt-sm">{{ $order->price }}</p>
                                    @endif
                                    <p class="fs-mini text-muted">PER WEEK</p><a class="btn btn-primary btn-info btn-sm" href="{{ route('slaves.order', ['id' => $order->id]) }}">Изучить</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    @endforeach
    <div class="row ng-scope">
        <div class="col-md-9 col-md-offset-3">
            {{ $orders->render() }}
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/order.css">
@endsection