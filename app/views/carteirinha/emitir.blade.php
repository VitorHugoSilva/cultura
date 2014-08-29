nome:
<br />
{{ $nome }}
<br/>
nome artistico:
{{ $nome_artistico }}
<br/>
cod:
{{ $cod_identificacao }}
<br/>
cpf:
{{ $cpf }}
<br/>
data nascimento:
<br/>
{{ $data_nascimento }}
<br/>
validade:
<br/>
{{ (new DateTime())->format('Y') . '/' . (new DateTime())->modify('1 year')->format('Y') }}