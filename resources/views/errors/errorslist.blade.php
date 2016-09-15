@if(isset($errors) and $errors->any())
    <ul class="list-group">
    @foreach($errors->all() as $err)
        <li class="list-group-item-danger" style="margin-top: 10px">{{ $err }}</li>
    @endforeach
    </ul>
@endif