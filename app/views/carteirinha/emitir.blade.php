<style>
    #container{
        position: relative;
        background: url("{{ URL::asset('imagens/fundo-carteira.jpg') }}") no-repeat center top;
        width: 640px;
        height: 400px;
        margin: 0 auto;
    }
    div{
        /*border: 1px solid red;*/
        position: absolute;
        text-transform: uppercase;
        font-weight: bold;
        font-family: Arial;
        left: 195px;
    }
    #foto{
        height: 171px;
        width: 145px;
        top: 87px;
        left: 20px;
        text-align: center;
        margin: 0 auto;
        background: url("data:image/jpeg;base64,<?php echo pg_unescape_bytea($foto)?>") no-repeat center center;
    }
    #foto img{
        border: 1px solid red;
        position: relative;
        top: 50%;   
        left: 50%;
    }
    #nome{
        top: 103px;
        
    }
    #nome_artistico{
        top: 165px;
    }
    #identificador{
        top: 228px;
    }
    #cpf{
        top: 290px;
    }
    #data_nascimento{
        left: 450px;
        top: 290px;
    }
    #segmento{
        top: 350px;
    }
</style>

<div id='container'>
    <div id='foto'>
    </div>
    <div id='nome'>
        {{ $nome }}
    </div>
    <div id='nome_artistico'>
        {{ $nome_artistico }}
    </div>

    <div id='identificador'>
        {{ $cod_identificacao }}
    </div>

    <div id='cpf'>
        {{ $cpf }}
    </div>
    <div id='data_nascimento'>
        {{ $data_nascimento }}    
    </div>
    <div id='segmento'>
        {{ $arearepresentacao }}
    </div>
    <div id='validade'>
        {{ (new DateTime())->format('Y') . '/' . (new DateTime())->modify('1 year')->format('Y') }}
    </div>
</div>
