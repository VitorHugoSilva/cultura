<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{URL::to('/')}}">
      {{ HTML::image('imagens/logo1.jpg', 'logo',['style'=>'height: 30px; width: 60;']) }}
      Sistema de Cadastro do Artista 
 </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">    
      @if(isset($menus))
        @foreach($menus as $menu)
          @include('_parciais.menus.item', ['menu' => $menu])
        @endforeach
      @endif

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>