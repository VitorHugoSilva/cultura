{{Form::model($model, ['action' => Meta::getController() . '@index', 'method' => 'GET', 'class' => 'form-inline form-search', 'role' => 'form', 'id' => 'form-pesquisa'])}}

            <div class="input-group">
              {{ Form::text('pesquisa', Input::old('pesquisa'), ['class' => 'form-control', 'placeholder' => 'Pesquisa...']) }}
              <span class="input-group-btn">
                {{ Form::button('<i class="fa fa-search"></i>',['class' => 'btn btn-default', 'type' => 'submit']) }}
                @if(Input::has('pesquisa'))
                <a class="btn btn-default" id="form-pesquisa-limpar" href="{{URL::action(Meta::getController() . '@index')}}">
                  <i class="fa fa-times"></i> 
                </a>
                @endif
              </span>
            </div><!-- /input-group -->
            
{{Form::close()}}
