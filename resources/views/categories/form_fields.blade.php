<div class="mb mb-2">
    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'minlength' => 10, 'maxlength' => 40]) }}
</div>
<div class="mb mb-2">
    {{ Form::label('description', 'Descripción', ['class' => 'form-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>