            <div class="mb">
                {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
            </div>
            <div class="mb">
                {{ Form::label('description', 'Descripción', ['class' => 'form-label']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) }}
            </div>
            <div class="mb">
                {{ Form::label('city', 'Ciudad', ['class' => 'form-label']) }}
                {{ Form::text('city', null, ['class' => 'form-control', 'maxlength' => 30]) }}
            </div>
            <div class="mb">
                {{ Form::label('phone', 'Teléfono', ['class' => 'form-label']) }}
                {{ Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 10]) }}
            </div>
            <div class="mb">
                {{ Form::label('delivery', '¿Tiene domicilio?', ['class' => 'form-label']) }}
                {{ Form::select('delivery', ['y' => 'Si', 'n' => 'No'], null, ['class' => 'form-control']); }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('category_id', 'Categoría', ['class' => 'form-label']) }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']); }}
            </div>
            <div class="mb mb-3">
                {{ Form::label('logo', 'Seleccionar logo restaurante', ['class' => 'form-label']) }}
                {{ Form::file('file') }}
            </div>