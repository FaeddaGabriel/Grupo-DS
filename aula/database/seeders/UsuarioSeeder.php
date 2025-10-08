<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Popula a tabela users com dados de teste.
     *
     * @return void
     */
    public function run()
    {
        $nomes = [
            'João Silva', 'Maria Santos', 'Pedro Oliveira', 'Ana Costa', 'Carlos Souza',
            'Juliana Lima', 'Fernando Alves', 'Beatriz Rocha', 'Ricardo Martins', 'Camila Ferreira',
            'Lucas Pereira', 'Patrícia Gomes', 'Rafael Barbosa', 'Mariana Ribeiro', 'Thiago Carvalho',
            'Amanda Araújo', 'Bruno Dias', 'Larissa Monteiro', 'Gabriel Cardoso', 'Fernanda Castro',
            'Rodrigo Pinto', 'Aline Correia', 'Marcelo Teixeira', 'Vanessa Moreira', 'Diego Nascimento',
            'Renata Freitas', 'Felipe Cavalcanti', 'Priscila Mendes', 'Gustavo Ramos', 'Daniela Vieira',
            'André Campos', 'Carolina Duarte', 'Matheus Rodrigues', 'Isabela Nunes', 'Leonardo Santana',
            'Bianca Azevedo', 'Vinicius Lopes', 'Tatiana Melo', 'Henrique Cunha', 'Natália Farias',
            'Paulo Batista', 'Letícia Moraes', 'Fábio Rezende', 'Sabrina Barros', 'Alexandre Pires',
            'Adriana Soares', 'Leandro Macedo', 'Cristina Fonseca', 'Márcio Viana', 'Elaine Borges'
        ];

        $usuarios = [];
        
        // Criar 50+ usuários com datas variadas nos últimos 12 meses
        for ($i = 0; $i < 60; $i++) {
            // Gerar uma data aleatória nos últimos 12 meses
            $diasAtras = rand(0, 365);
            $dataRegistro = Carbon::now()->subDays($diasAtras);
            
            // Alternar entre níveis de acesso (0 = admin, 1 = usuário comum)
            $nivelAcesso = ($i % 5 == 0) ? 0 : 1; // 20% admins, 80% usuários comuns
            
            $nome = $nomes[$i % count($nomes)] . ' ' . ($i + 1);
            $email = 'usuario' . ($i + 1) . '@sportsking.com';
            
            $usuarios[] = [
                'name' => $nome,
                'email' => $email,
                'password' => Hash::make('senha123'),
                'nivel_acesso' => $nivelAcesso,
                'created_at' => $dataRegistro,
                'updated_at' => $dataRegistro,
            ];
        }

        // Inserir todos os usuários de uma vez
        DB::table('users')->insert($usuarios);
        
        $this->command->info('60 usuários de teste criados com sucesso!');
    }
}
