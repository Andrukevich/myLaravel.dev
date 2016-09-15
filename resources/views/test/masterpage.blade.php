@extends('main')

@section('content')
    @foreach ($names as $name)
        <h3>{{ strtoupper($name) }}</h3>
    @endforeach
@stop

@section('title', 'asdasdsa')

@section('footer.script')
    @parent
    <script src="/js/contact.js"></script>
@endsection
