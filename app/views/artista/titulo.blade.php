{{--
    icon?  classe de iconde do font awesome (eye, trash, list*)
    titulo? o título da página
--}}
<h1>
    <i class="fa fa-{{$icon or 'list'}}"></i>
    Carteirinha2
    <span class="small">
        <i class="fa fa-angle-right"></i>
        {{ Meta::getAction() }}
    </span>
</h1>
