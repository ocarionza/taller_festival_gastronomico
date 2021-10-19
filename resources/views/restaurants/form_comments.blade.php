<div class="mb mb-2">
    {{ Form::label('comment', 'Comentario', ['class' => 'form-label']) }}
    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '4']) }}
</div>
<div class="mb mb-2">
    {{ Form::select('score', ['1' => '1', 
                              '2' => '2',
                              '3' => '3',
                              '4' => '4',
                              '5' => '5',], null, ['placeholder' => 'Puntuación', 'class' => 'form-control']) }}
</div>
