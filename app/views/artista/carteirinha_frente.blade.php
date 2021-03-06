@extends('_layouts.principal')

@section('acoes-da-pagina')
    <div class="pull-right">
    <a class="btn btn-success" title="Clique aqui para cadastrar um novo" href="{{URL::action('CarteirinhaController@emitirCarteirinhaCosta',[$id])}}">
    <i class="fa fa-arrow-circle-o-right"></i> Ver Costa
    </a>
    <div class="btn-group">
    <a class="btn btn-default" href="{{ URL::action('ArtistaController@listar') }}">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>
</div>
    </div>
@stop

@section('conteudo')
<style type="text/css" media="screen">
     body
          {
              font-family: arial;
              font-size:12px;

          }
      
     .posicionamentoimg
     {
        float: left;
        width: 22.9%;
        left: 3.2%;
        top: 37px;
         height:78px;
         position: relative;
         z-index: 1;
         background: url("data:image/jpeg;base64,<?php echo pg_unescape_bytea($foto)?>") no-repeat center center;
     }
     .posicionamentoimg img
     {
        width: 100%;
        height: 100%;
     }
     .posicionamento_ifo
     {
         width: 90%;
         position: relative;
        top: 30px;
        left: 6.5%;
        height: 140px;
         z-index: 3333;
     }
     .posicionamenoto_nome{
        text-align: left;
        position: relative;
        top: 8px;
        z-index: 44444;
     }
     .posicionamenoto_nome_artistico{
        text-align: left;
        position: relative;
        top: 21px;
        z-index: 44444;
     }
     .posicionamenoto_num_identificacao{
        text-align: left;
        position: relative;
        top: 33px;
        z-index: 44444;
     }
     .posicionamenoto_cpf_datanasc{
        text-align: left;
        position: relative;
        top: 40px;
        z-index: 44444;

     }
     .cpf{
        width: 38%;
        float: left;
     }

     .data_nasc{
        width: 40%;
        float: left;
        position: relative;
        left: 100px;
     }
     .posicionamenoto_segmento_funcao{
        position: relative;
        top:65px;
        left: -70px;
        font-size: 8px;
        z-index: 44444;
        text-align: left;
     }
     .imagem_fundo
     {
         width: 100%;
         height: 100%;
         position: relative;
         z-index: 0;
     }
     .dadospessais
     {
         position: relative;
         z-index: 1000;
         top: -100%;
         
     }
     
     .espaco_imagem
     {
         position: relative;
         z-index: 2222;
         left: 2%;
     }
   @media screen
   {
          .sonaimpressao
          {
             display:none;
             visibility:hidden
          }
          .bordapagina
          {
             width:295px;
             height:175px;
             background-color:#FFFFFF;
             border:1px solid #000000;
         //     padding:10px 10px 14px;
           
         //    overflow:hidden;
/*             background-image:url(../../../imagens/logotipos/carteira_gabriel.jpg);
              background-repeat: no-repeat;*/
           
                  margin:auto;
                  
          }
          
   }
   @media print
   {
          .sonatela
          {
             display:none;
             visibility:hidden
          }
          .bordapagina
          {
            width:100%;
             height:175px;
       
           //  padding:10px 10px 14px;
             overflow:hidden;
/*             background-image:url(../../../imagens/logotipos/carteira_gabriel.jpg);
                      background-repeat: no-repeat;
              background-position: center;*/
            
          }
      

   }
   </style>
</head>
<body>
<div class='bordapagina'>
        {{ HTML::image('imagens/fundo-carteira.jpg', 'fundo',['class'=>'imagem_fundo']) }}
        <div class="dadospessais">
            <!--# DADOS PESSOAS-->
                <div class='posicionamentoimg'>
                </div><!--  #FIM DA CÉLULA QUE CHAMA A IMAGEM-->
               <!--##################-->
               <div  class="posicionamento_ifo">
                   <div class="posicionamenoto_nome">{{ $nome }}</div>
                   <div class="posicionamenoto_nome_artistico">{{ $nome_artistico }}</div>
                   <div class="posicionamenoto_num_identificacao">{{ $cod_identificacao }}</div>
                   <div class="posicionamenoto_cpf_datanasc"> 
                        <div class="cpf">{{ $cpf }}</div>
                        <div class="data_nasc">{{ $data_nascimento }}</div>
                   </div>
                   <div class="posicionamenoto_segmento_funcao">{{ $arearepresentacao }}</div>
               </div>
        </div>
    
    </div>

</body>
</html>


@stop

  