<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    {{ HTML::style('assets/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('assets/select/select2.css') }}
    {{ HTML::style('assets/select/select2-bootstrap.css') }}
    {{ HTML::style('assets/dropzone/dropzone.css') }}
    {{ HTML::script('assets/jquery/jquery-2.1.1.min.js') }}
    {{ HTML::script('assets/dropzone/dropzone.js') }}


   
    <style>
        body { padding-top: 40px; }
        .form-novo { margin-bottom:12px;}
        .acoes-da-pagina {  margin-top: -40px; }
        .acoes-item { }
        .page-header h1 { font-size:2em; }
        .dropdown-submenu{position:relative;}
        .dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
        .dropdown-submenu:hover>.dropdown-menu{display:block;}
        .dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
        .dropdown-submenu:hover>a:after{border-left-color:#ffffff;}
        .dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}
        .alert.alert-main {border-radius: 0; margin-top:-21px;}
    </style>
</head>

<body>

@section('menu-principal')
    @include('_parciais.menus.menu-principal')
@show

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                @section('titulo')
                    @if(View::exists(Meta::getControllerSlug() . '.' . 'titulo'))
                        @include(Meta::getControllerSlug() . '.' . 'titulo')
                    @else
                        @include('_parciais.titulo')
                    @endif
                @show
                <div class="acoes-da-pagina pull-right row">
                    @yield('acoes-da-pagina')
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            @if (Session::has('mensagem'))
                @include('_parciais.alert', ['mensagem' => Session::pull('mensagem')])
            @endif

            @if (Session::has('erro'))
                @include('_parciais.alert', ['mensagem' => Session::pull('erro'), 'class' => 'danger'])
            @endif

            <div id="conteudo">
                @yield('conteudo')
            </div>
        </div>
    </div>
</div>
    
    
    {{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('assets/select/select2.min.js') }}
    {{ HTML::script('assets/select/select2_locale_pt-BR.js') }}

    <script type="text/javascript">
    $(document).ready(function(){
        $(".alert").alert();
        $("#btn-acao-submit").click(function(){
            $('#conteudo form').submit();
        });

        $('#alertas').delay(800).fadeOut('slow');
        $("select").select2();
        $("#arearepresentacao_id").change(function(){
            $.get('../segmentos_culturais/por-area/' + $(this).val(), function( retorno ){
                                var data = jQuery.parseJSON(retorno);
                                $.each(data, function(i, item){
                                   $("#arearepresentacao_id").after("<br/><div class='form-group'><input class='' type='checkbox' name='artista[segmentos]'> " + item.nome + "</div>");
                                });
                       });
                });
        $(document).on('click','.addElement', function(){
            var clone = $(this).parent().parent().clone().insertAfter($(this).parent().parent());
            $(clone).find('.addElement').remove();
            $(clone).find('.col-sm-3').append('<span class="btn btn-danger removeElement"> <i class="fa fa-minus"></i> Remover</span>');
            $(this).parent().parent().find('input').val('');
        });
        $(document).on('click','.removeElement',  function(){
            $(this).parent().parent().remove();
            
        });
        
        $(document).on('click','.addGroup', function(){
            var clone = $(this).parent().parent().parent().clone().insertAfter($(this).parent().parent().parent());
            $(clone).find('.addElement').remove();
            $(clone).find('.btn-group').append('<span class="btn btn-danger removeGroup"> <i class="fa fa-minus"></i> Remover</span>').find('.addGroup').remove();
            $(this).parent().parent().parent().find('input').val('');
        });
        $(document).on('click','.removeGroup',  function(){
            $(this).parent().parent().parent().remove();
            
        });
    });   
    </script>

</body>
</html>
