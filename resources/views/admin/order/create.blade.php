@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'order.store', 'files' => true]) !!}
        @include('admin.order.form')
    {!! Form::close() !!}
@endsection
