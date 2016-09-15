<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Имя']) !!}
</div>

<div class="form-group">
    {!! Form::label('age', 'Возраст') !!}
    {!! Form::text('age', null, ['class' => 'form-control', 'placeholder' => 'Возраст']) !!}
</div>

<div class="form-group">
    {!! Form::label('height', 'Height') !!}
    {!! Form::text('height', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('weight', 'Weight') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Price') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('special_price', 'Special_price') !!}
    {!! Form::text('special_price', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('images', 'Images') !!}
    {!! Form::file('images[]', ['multiple']) !!}
</div>

<button type="submit" class="btn btn-default">{{ $btnName or 'Создать' }}</button>