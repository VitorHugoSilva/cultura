<!DOCTYPE html>
<html>
<head>
    <title>Careira</title>
    <style>
       body
          {
              font-family: arial;
              font-size:9px;

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
        top: 45px;
        z-index: 44444;

     }
     .cpf{
        width: 38%;
        float: left;
     }

     .data_nasc{
        width: 35%;
        float: left;
     }
     .posicionamenoto_segmento_funcao{
        text-align: left;
        position: relative;
        top:56px;
        z-index: 44444;


     }
     .posicionamenoto_data_validade
     {
       width: 20%;
         position: relative;
        top: 160px;
        left: 76%;
        height: 10px;
         z-index: 3333;
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
             border:2px solid #000000;
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
        {{ HTML::image('imagens/fundo-carteira-costa.jpg', 'fundo',['class'=>'imagem_fundo']) }}
        <div class="dadospessais">
            <!--# DADOS PESSOAS-->
               
                   <div class="posicionamenoto_data_validade"> 00/00/0000</div>
               </div>
        </div>
    
    </div>

</body>
</html>