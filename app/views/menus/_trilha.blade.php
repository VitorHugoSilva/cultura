@foreach($trilha as $item) 
<small><i class="fa fa-angle-right"></i></small>
<a href="{{URL::action('MenusController@listar')}}?menu={{$item->id}}">
    <small> {{{$item->nome}}}</small>
</a>
@endforeach