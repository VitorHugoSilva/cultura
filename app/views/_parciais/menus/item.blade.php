@if($menu->filhos->count())
  
<li class="@if(isset($submenu)) dropdown-submenu @else dropdown @endif">
  <a @if(! isset($submenu)) class="dropdown-toggle" @endif data-toggle="dropdown" title="{{{$menu->descricao}}}" href="{{URL::to($menu->url)}}">
    {{{ $menu->nome }}}
    @if(! isset($submenu)) <i class="fa fa-caret-down"></i> @endif
  </a>
  <ul class="dropdown-menu" role="menu">
    @foreach($menu->filhos as $menu)
      @include('_parciais.menus.item', ['menu' => $menu, 'submenu' => true])
    @endforeach
  </ul>
</li>

@else
  <li>
    <a title="{{{$menu->descricao}}}" href="{{{URL::to($menu->url)}}}">
      {{{$menu->nome}}}
    </a>
  </li>
@endif