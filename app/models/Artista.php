<?php

class Artista extends BaseModel
{

    protected $guarded = ['id'];

    protected $table = 'pessoas';

    public static $rules = [
    ];

    public static $meta = [
        'nome'                  =>  'text|Nome|Informe seu Nome|false|first|false|Apresentação',
        'nome_artistico'        =>  'text|Nome Artístico| Você possui nome artístico?|false|last|false|',
        'foto'                  =>  'file|Foto|Foto|false|first-last|false|Fotos',
        'inscricao_estadual'    =>  'text|Inscrição Estadual| Inscrição estadual|false|first|false|Dados Gerais',
        'inscricao_municipal'   =>  'text|Inscrição municipal|Inscrição municipal|false|null|false|',
        'razao_social'          =>  'text|Razão Social| Razão Social|false|null|false|',
        'nome_fantasia'         =>  'text|Nome Fantasia| Nome Fantasia|false|null|false|',
        'cpf_responsavel'       =>  'text|CPF do Responsável| CPF do responsável|false|null|false|',
        'rg_responsavel'        =>  'text|RG do Responsável| RG do responsável|false|null|false|',
        'cpf'                   =>  'text|CPF| Informe seu CPF|false|null|false|',
        'identidade'            =>  'text|Identidade| Identidade|false|null|false|',
        'cnpj'                  =>  'text|CNPJ|CNPJ da empresa | Identidade|false|null|false|',
        'data_nascimento'       =>  'text|Data de Nascimento| Data de nascimento|false|last|false|',
        'estado_endereco'       =>  'text|Estado|Estado|false|first|true|Endereços',
        'cidade_endereco'       =>  'text|Cidade|Cidade|false|3|true|',
        'bairro_endereco'       =>  'text|Bairro|Bairro|false|3|true|',
        'endereco'              =>  'text|Endereco|Endereco|false|3|true|',
        'numero'                =>  'text|Numero|Numero|false|3|true|',
        'cep'                   =>  'text|CEP|CEP|false|3|true|',
        'complemento'           =>  'text|Complemento|Complemento|false|last|true|',
        'contato_nome'          =>  'text|Contato|Contato|false|first|true|Contatos',
        'ContatoTipo.nome'      =>  'select|Tipo Contato|Tipo Contato|true|last|true|',
        'possui_cadastro_siniic'=>  'radio| Possui cadastro no Siniic ||false|first|false|Observações',
        'apresentacao'          =>  'longtext|Breve Apresentação ||false|false|false|',
        'historico'             =>  'longtext|Breve Histórico ||false|5|false|',
        'portfolio'             =>  'longtext|Portfólio ||false|5|false|',
        'necessidade_tecnica'   =>  'longtext|Necessidades Técnicas ||false|5|false|',
        'valor_pretendido'      =>  'money|Valor pretendido | Valor pretendido|false|falst|false|',
        'AreaRepresentacao.nome'  =>  'select|Segmento Cultural|Segmento Cultural|false||false|'
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
    
    public function segmentos()
    {
        return $this->belongsToMany('SegmentoCultural');
    }
}