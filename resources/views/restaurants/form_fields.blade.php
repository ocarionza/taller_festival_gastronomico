            <div class="mb mb-2 mb-2">
                {{ Form::label('name', 'Nombre', ['class' => 'form-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('description', 'Descripción', ['class' => 'form-label']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('city', 'Ciudad', ['class' => 'form-label']) }}
                {{ Form::text('city', null, ['class' => 'form-control', 'maxlength' => 30]) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('phone', 'Teléfono', ['class' => 'form-label']) }}
                {{ Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 10]) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('category_id', 'Categoría', ['class' => 'form-label']) }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']); }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('delivery', '¿Tiene domicilio?', ['class' => 'form-label']) }}
                {{ Form::select('delivery', ['y' => 'Si', 'n' => 'No'], null, ['class' => 'form-control']); }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('schedule', 'Horario', ['class' => 'form-label']) }}
                {{ Form::text('schedule', null, ['class' => 'form-control', 'maxlength' => 70]) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('latitude', 'Latitud', ['class' => 'form-label']) }}
                {{ Form::text('latitude', null, ['class' => 'form-control', 'maxlength' => 11]) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('longitude', 'Longitud', ['class' => 'form-label']) }}
                {{ Form::text('longitude', null, ['class' => 'form-control', 'maxlength' => 11]) }}
            </div>


            <div class="mb mb-2">
                <div id="mapa" style="width: 100%; height: 500px;">    
                </div>
            </div>
            <script>
                function iniciarMapa(){
                    var latitude = 19.3886;
                    var longitude = -99.1740;

                    coordenadas = {
                        lng: longitude,
                        lat: latitude
                    }

                    generarMapa(coordenadas);
                }

                function generarMapa(coordenadas){
                    var mapa = new google.maps.Map(document.getElementById('mapa'),{
                        zoom: 12,
                        center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
                    })

                    marcador = new google.maps.Marker({
                        map: mapa,
                        draggable: true,
                        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
                    })

                    marcador.addListener('dragend', function(event){
                        document.getElementById('latitude').value = this.getPosition().lat();
                        document.getElementById('longitude').value = this.getPosition().lng();
                    })
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script> 

            <div class="mb mb-2">
                {{ Form::label('logo', 'Seleccionar logo restaurante', ['class' => 'form-label']) }}
                <br>{{ Form::file('file') }}
                
            </div>
            <div class="mb mb-2">
                {{ Form::label('facebook', 'Facebook', ['class' => 'form-label']) }}
                {{ Form::text('facebook', null, ['class' => 'form-control', 'maxlength' => 90]) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('twitter', 'Twitter', ['class' => 'form-label']) }}
                {{ Form::text('twitter', null, ['class' => 'form-control', 'maxlength' => 90]) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('instagram', 'Instagram', ['class' => 'form-label']) }}
                {{ Form::text('instagram', null, ['class' => 'form-control', 'maxlength' => 90]) }}
            </div>
            <div class="mb mb-2">
                {{ Form::label('youtube', 'Youtube', ['class' => 'form-label']) }}
                {{ Form::text('youtube', null, ['class' => 'form-control', 'maxlength' => 90]) }}
            </div>