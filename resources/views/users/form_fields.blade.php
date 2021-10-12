<div class="mb mb-2">
    {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'minlength' => 10, 'maxlength' => 40]) }}
</div>
<div class="mb mb-2">
    {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
</div>
<div class="mb mb-2">
    {{ Form::label('password', 'Contraseña', ['class' => 'form-label']) }}
    {{ Form::text('password', null,['class' => 'form-control', 'maxlength' => 30]) }}
</div>
<div class="mb mb-3">
    {{ Form::label('type', 'Tipo usuario', ['class' => 'form-label']) }}
    {{ Form::select('type', [ 'user' => 'user', 'owner' => 'owner', 'admin' => 'admin'], null, ['class' => 'form-control']) }}
</div>