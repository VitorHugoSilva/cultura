<?php

class Artista extends BaseModel
{

    protected $guarded = ['id'];

    protected $table = 'pessoas';

    public static $rules = [
        'nome' => 'required|max:40|unique:pessoas'
    ];

    public static $meta = [
        'nome'                  =>  'text|Nome|Informe seu Nome|false|first|true|Apresentação',
        'nome_artistico'        =>  'text|Nome Artístico| Você possui nome artístico?|false|last|false|',
        'inscricao_estadual'    =>  'text|Inscrição Estadual| Inscrição estadual|false|first|true|Dados Gerais',
        'inscricao_municipal'   =>  'text|Inscrição municipal|Inscrição municipal|false|null|true|',
        'razao_social'          =>  'text|Razão Social| Razão Social|false|null|false|',
        'nome_fantasia'         =>  'text|Nome Fantasia| Nome Fantasia|false|null|false|',
        'cpf_responsavel'       =>  'text|CPF do Responsável| CPF do responsável|false|null|false|',
        'rg_responsavel'        =>  'text|RG do Responsável| RG do responsável|false|null|false|',
        'cpf'                   =>  'text|CPF| Informe seu CPF|false|null|false|',
        'identidade'            =>  'text|Identidade| Identidade|false|null|false|',
        'cnpj'                  =>  'text|CNPJ|CNPJ da empresa | Identidade|false|null|false|',
        'data_nascimento'       =>  'text|Data de Nascimento| Data de nascimento|false|last|false|',
        'estado_endereco'       =>  'text|Estado|Estado|false|first|true|Endereços',
        'cidade_endereco'       =>  'text|Cidade|Cidade|false|3|false|',
        'bairro_endereco'       =>  'text|Bairro|Bairro|false|3|false|',
        'endereco'              =>  'text|Endereco|Endereco|false|3|false|',
        'numero'                =>  'text|Numero|Numero|false|3|false|',
        'cep'                   =>  'text|CEP|CEP|false|3|false|',
        'complemento'           =>  'text|Complemento|Complemento|false|last|false|',
        'contato_nome'          =>  'text|Contato|Contato|false|first|true|Contatos',
        'tipo_contato'          =>  'text|Tipo Contato|Tipo Contato|false|last|false|',
        'possui_cadastro_siniic'=>  'text| Possui cadastro no Siniic | Identidade|false|5|false|',
        'apresentacao'          =>  'longtext|Breve Apresentação | Identidade|false|first|true|',
        'historico'             =>  'longtext|Breve Histórico | Identidade|false|5|false|',
        'portfolio'             =>  'longtext|Portfólio | Identidade|false|5|false|',
        'necessidade_tecnica'   =>  'longtext|Necessidades Técnicas | Identidade|false|5|false|',
        'valor_pretendido'      =>  'money|Valor pretendido | Identidade|false|falst|false|'
    ];
    
    public static function meta()
    {
        $metadata = [];
        foreach (static::$meta as $campo => $metas) {
            $meta = new \stdClass;
            $meta->name = $campo;
            list($meta->type, $meta->label, $meta->placeholder, $meta->acrescentavel, $meta->categoria, $meta->acrescentavel_por_categoria, $meta->rotulo_grupo) = explode('|', $metas);
            $metadata[] = $meta;
        }

        return $metadata;
    }
}