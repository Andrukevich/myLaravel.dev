@extends('layouts.app')


@section('content')
    {!! Form::model($order, ['route' => ['order.upgrade', 'id' => $order->id], 'files' => true, 'method' => 'put']) !!}
    @include('admin.order.form', ['btnName' => 'Редактировать'])
{!! Form::close() !!}

    @unless($order->image->isEmpty())
        @foreach($order->image as $image)
            <a href="#">Удалить</a>
            <img width="100" src="/{{ $image->th_path }}" alt="">
        @endforeach
    @endunless
@endsection