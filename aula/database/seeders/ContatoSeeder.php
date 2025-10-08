<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContatoSeeder extends Seeder
{
    /**
     * Popula a tabela tbcontato com dados de teste.
     *
     * @return void
     */
    public function run()
    {
        $nomes = [
            'João Silva', 'Maria Santos', 'Pedro Oliveira', 'Ana Costa', 'Carlos Souza',
            'Juliana Lima', 'Fernando Alves', 'Beatriz Rocha', 'Ricardo Martins', 'Camila Ferreira',
            'Lucas Pereira', 'Patrícia Gomes', 'Rafael Barbosa', 'Mariana Ribeiro', 'Thiago Carvalho',
            'Amanda Araújo', 'Bruno Dias', 'Larissa Monteiro', 'Gabriel Cardoso', 'Fernanda Castro'
        ];

        $mensagensCurtas = [
            'Gostaria de mais informações sobre os produtos.',
            'Preciso de ajuda com minha conta.',
            'Quando terá novos produtos disponíveis?',
            'Qual o horário de atendimento?',
            'Como faço para cancelar minha assinatura?'
        ];

        $mensagensMedias = [
            'Olá, estou interessado em saber mais sobre os serviços oferecidos pela empresa. Poderia me enviar mais detalhes sobre preços e condições?',
            'Bom dia! Fiz uma compra recentemente e gostaria de saber o status do meu pedido. O número do pedido é #12345.',
            'Boa tarde! Estou com dificuldades para acessar minha conta. Já tentei recuperar a senha mas não recebi o email.',
            'Olá! Gostaria de saber se vocês trabalham com entregas para todo o Brasil e qual o prazo médio de entrega.',
            'Boa noite! Tenho interesse em fazer uma parceria comercial com a empresa. Com quem devo falar?'
        ];

        $mensagensLongas = [
            'Prezados, venho por meio desta mensagem solicitar informações detalhadas sobre os produtos e serviços oferecidos pela empresa. Estou em busca de uma solução completa para gerenciamento esportivo e gostaria de entender melhor como o sistema funciona, quais são os recursos disponíveis, os planos de pagamento, as formas de suporte técnico e se há possibilidade de personalização do sistema de acordo com as necessidades específicas do meu negócio. Aguardo retorno.',
            'Olá, equipe SportsKing! Sou gestor de um clube esportivo e estou avaliando diferentes plataformas para modernizar nossa gestão. Vi que vocês oferecem soluções interessantes e gostaria de agendar uma demonstração do sistema. Também gostaria de saber sobre casos de sucesso, referências de outros clientes, possibilidade de integração com sistemas que já utilizamos e qual seria o investimento necessário para implementar a solução completa em nossa organização.',
            'Boa tarde! Sou cliente há alguns meses e estou muito satisfeito com o sistema. No entanto, recentemente identifiquei algumas necessidades específicas que não estão sendo atendidas pelas funcionalidades atuais. Gostaria de sugerir melhorias e também entender se há possibilidade de desenvolvimento de módulos customizados. Além disso, tenho algumas dúvidas sobre a utilização de determinadas funcionalidades e gostaria de agendar um treinamento para minha equipe.',
            'Prezados, estou entrando em contato para relatar um problema técnico que venho enfrentando nos últimos dias. O sistema está apresentando lentidão em determinados horários e algumas funcionalidades não estão carregando corretamente. Já tentei acessar por diferentes navegadores e dispositivos, mas o problema persiste. Gostaria de solicitar suporte técnico urgente, pois isso está impactando negativamente nossas operações diárias. Agradeço a atenção e aguardo retorno o mais breve possível.',
            'Olá! Sou estudante de Educação Física e estou desenvolvendo meu trabalho de conclusão de curso sobre gestão esportiva. Durante minhas pesquisas, encontrei a plataforma de vocês e fiquei muito interessado em conhecer mais sobre como a tecnologia pode auxiliar na administração de clubes e centros esportivos. Gostaria de saber se seria possível agendar uma entrevista com alguém da equipe para conversar sobre o desenvolvimento do sistema, os desafios enfrentados e as perspectivas futuras do mercado.'
        ];

        $contatos = [];
        
        // Criar 120 contatos com mensagens variadas
        for ($i = 0; $i < 120; $i++) {
            // Gerar uma data aleatória nos últimos 12 meses
            $diasAtras = rand(0, 365);
            $dataContato = Carbon::now()->subDays($diasAtras);
            
            // Escolher o tipo de mensagem baseado em probabilidades
            $tipoMensagem = rand(1, 100);
            if ($tipoMensagem <= 30) {
                // 30% mensagens curtas
                $mensagem = $mensagensCurtas[array_rand($mensagensCurtas)];
            } elseif ($tipoMensagem <= 70) {
                // 40% mensagens médias
                $mensagem = $mensagensMedias[array_rand($mensagensMedias)];
            } else {
                // 30% mensagens longas
                $mensagem = $mensagensLongas[array_rand($mensagensLongas)];
            }
            
            $nome = $nomes[array_rand($nomes)];
            $email = strtolower(str_replace(' ', '.', $nome)) . ($i + 1) . '@email.com';
            
            $contatos[] = [
                'nomeContato' => $nome,
                'emailContato' => $email,
                'mensagemContato' => $mensagem,
                'created_at' => $dataContato,
                'updated_at' => $dataContato,
            ];
        }

        // Inserir todos os contatos de uma vez
        DB::table('tbcontato')->insert($contatos);
        
        $this->command->info('120 contatos de teste criados com sucesso!');
    }
}
