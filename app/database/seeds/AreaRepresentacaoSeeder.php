<?php

class AreaRepresentacaoSeeder extends Seeder
{
    public function run()
    {
        DB::table('area_representacao')->delete();
        $arearepresentacao = AreaRepresentacao::create(['nome' => 'Artes Cênicas']);
            SegmentoCultural::create(['nome' => 'Circo', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Dança', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Mímica', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Ópera', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Teatro', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Ações de capacitação e treinamento de pessoal', 'arearepresentacao_id' => $arearepresentacao->id]);
        $arearepresentacao = AreaRepresentacao::create(['nome' => 'Audiovisual']);
            SegmentoCultural::create(['nome' => 'Produção cinematográfica ou videofonográfica de curta e média metragem', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Produção radiofônica', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Produção de obras seriadas', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Formação e pesquisa audiovisual em geral', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(
                    [
                        'nome'              => 'Doações de acervos audiovisuais ou treinamento de pessoal e aquisição de equipamentos para 
                        manutenção de acervos audiovisuais de cinematecas', 
                     'arearepresentacao_id' => $arearepresentacao->id
                    ]);
            SegmentoCultural::create(['nome' => 'Infraestrutura técnica audiovisual', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Construção e manutenção de salas de cinema ou centros comunitários congêneres em 
municípios com menos de cem mil habitantes', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'difusão de acervo audiovisual, incluindo distribuição, promoção e exibição 
cinematográfica', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Preservação ou restauração de acervo audiovisual', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Rádios e TVs educativas não comerciais', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Jogos eletrônicos', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Projetos audiovisuais transmidiáticos, exceto os de produção e de difusão', 'arearepresentacao_id' => $arearepresentacao->id]);
            

        $arearepresentacao = AreaRepresentacao::create(['nome' => 'Música']);
            SegmentoCultural::create(['nome' => 'Música erudita', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Música popular', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Música instrumental', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Doações de acervos musicais a museus, arquivos públicos e instituições congêneres', 'arearepresentacao_id' => $arearepresentacao->id]);
        $arearepresentacao = AreaRepresentacao::create(['nome' => ' Artes Visuais e Artes Digitais e Eletrônicas']);
            SegmentoCultural::create(['nome' => 'Fotografia', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Artes plásticas, incluindo artes gráficas, gravura, cartazes e filatelia', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Exposições de artes', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Design e moda; (novo texto dado pela Portaria nº 5 de 26/01/2012, DOU de 30/01/2012)', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(
                [
                    'nome'                 => 'Doações de acervos de artes visuais a museus, arquivos públicos e instituições congêneres', 
                    'arearepresentacao_id' => $arearepresentacao->id
                ]);
            SegmentoCultural::create(['nome' => 'Formação técnica e artística de profissionais; (novo texto dado pela Portaria nº 5 de 
26/01/2012, DOU de 30/01/2012) ', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Projetos educativos orientados à fruição e produção de artes visuais; e (novo texto 
dado pela Portaria)', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Projetos de fomento à cadeia produtiva das artes visuais (novo texto dado pela 
Portaria nº 5 de 26/01/2012, DOU de 30/01/2012) ', 'arearepresentacao_id' => $arearepresentacao->id]);
        $arearepresentacao = AreaRepresentacao::create(['nome' => ' Patrimônio Cultural']);
            SegmentoCultural::create(['nome' => 'Doações de acervos em geral a museus, arquivos públicos e instituições congêneres', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Preservação ou restauração de patrimônio material em geral', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Preservação ou restauração de patrimônio museológico; (novo texto dado pela Portaria nº 5 e 
26/01/2012, DOU de 30/01/2012)', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Preservação ou restauração de acervos em geral', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Preservação ou restauração de acervos museológicos', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Preservação de patrimônio imaterial', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Manutenção de salas de teatro ou centros comunitários congêneres em municípios 
com menos de cem mil habitantes', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Manutenção de equipamentos culturais em geral; ', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Treinamento de pessoal ou aquisição de equipamentos para manutenção de acervos de 
museus, arquivos públicos e instituições congêneres', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Outras ações de capacitação', 'arearepresentacao_id' => $arearepresentacao->id]);

        $arearepresentacao = AreaRepresentacao::create(['nome' => 'Humanidades']);
            SegmentoCultural::create(['nome' => 'Acervos bibliográficos', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Livros de valor artístico, literário ou humanístico, incluindo obras de referência', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Periódicos e outras publicações', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Evento literário', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Eventos e ações de incentivo à leitura', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Treinamento de pessoal ou aquisição de equipamentos para manutenção de acervos 
bibliográficos', 'arearepresentacao_id' => $arearepresentacao->id]);
            SegmentoCultural::create(['nome' => 'Ações de formação e capacitação em geral', 'arearepresentacao_id' => $arearepresentacao->id]);
    }
}