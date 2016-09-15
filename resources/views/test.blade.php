@foreach($errors->all() as $err)
    <li style="color: red; font-size: 140%">{{ $err }}</li>
@endforeach
<form action="{{ route('post.form') }}" method="post" enctype="multipart/form-data">
    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
    {{ csrf_field() }}
    <input type="text" name="email" value="{{ old('email') }}"><br>
    <input type="text" name="age" value="{{ old('age') }}"><br>
    <textarea name="about" id="" cols="30" rows="10">{{ old('about') }}</textarea><br>
    М<input type="radio" name="gender" value="Mr" checked>
    Ж<input type="radio" name="gender" value="Ms">
    {{--<select name="sel" id="">
        <option value="one">1</option>
        <option value="two">2</option>
        <option value="three">3</option>
    </select>
    <br />
    <input type="file" name="file"><br>--}}
    <input type="submit">
</form>