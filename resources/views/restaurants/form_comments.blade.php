<div class="mb mb-2">
    {{ Form::label('description', 'Comentario', ['class' => 'form-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>
<div class="mb mb-2">
    {{ Form::select('score', ['0' => '1', 
                              '1' => '2',
                              '2' => '3',
                              '3' => '4',
                              '4' => '5',], null, ['placeholder' => 'Puntuación', 'class' => 'form-control']) }}
</div>
