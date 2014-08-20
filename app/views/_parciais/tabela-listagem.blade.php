@if($itens->count())
<table class="table">
    <thead>
        <tr>
        @foreach($campos as $campo)
            <th>{{ $campo }}</th>
        @endforeach
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($itens as $item)
        <tr>
            @foreach($campos as $campo)
                <td>{{{ $item->$campo }}}</td>
            @endforeach
            <td class="acoes">
                <div class="btn-group pull-right">
                    <a class="btn btn-default" href="{{URL::action('MenusController@listar')}}?menu={{$item->id}}">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                    <a class="btn btn-default" href="{{URL::action('MenusController@editar', [$item->id])}}">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <a class="btn btn-danger" href="{{URL::action('MenusController@deletar', [$item->id])}}">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

<!-- <a href="{{URL::action('MenusController@criar', [Input::get('menu')])}}" class="btn btn-default btn-large btn-block">
    <i class="fa fa-plus"></i> Adicionar Sub-menu
</a> -->