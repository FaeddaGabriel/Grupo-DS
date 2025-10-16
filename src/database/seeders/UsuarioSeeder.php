<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Popula a tabela users com dados de testeeee.
     *
     * @return void
     */
    public function run()
    {
        $nomesFemininos = [
            "Maria",
            "Ana",
            "Juliana",
            "Beatriz",
            "Camila",
            "Patrícia",
            "Mariana",
            "Amanda",
            "Larissa",
            "Fernanda",
            "Aline",
            "Vanessa",
            "Renata",
            "Priscila",
            "Daniela",
            "Carolina",
            "Isabela",
            "Bianca",
            "Tatiana",
            "Natália",
            "Letícia",
            "Sabrina",
            "Adriana",
            "Cristina",
            "Elaine",
        ];
        $sexos = ["Masculino", "Feminino"];

        $nomes = [
            "João Silva",
            "Maria Santos",
            "Pedro Oliveira",
            "Ana Costa",
            "Carlos Souza",
            "Juliana Lima",
            "Fernando Alves",
            "Beatriz Rocha",
            "Ricardo Martins",
            "Camila Ferreira",
            "Lucas Pereira",
            "Patrícia Gomes",
            "Rafael Barbosa",
            "Mariana Ribeiro",
            "Thiago Carvalho",
            "Amanda Araújo",
            "Bruno Dias",
            "Larissa Monteiro",
            "Gabriel Cardoso",
            "Fernanda Castro",
            "Rodrigo Pinto",
            "Aline Correia",
            "Marcelo Teixeira",
            "Vanessa Moreira",
            "Diego Nascimento",
            "Renata Freitas",
            "Felipe Cavalcanti",
            "Priscila Mendes",
            "Gustavo Ramos",
            "Daniela Vieira",
            "André Campos",
            "Carolina Duarte",
            "Matheus Rodrigues",
            "Isabela Nunes",
            "Leonardo Santana",
            "Bianca Azevedo",
            "Vinicius Lopes",
            "Tatiana Melo",
            "Henrique Cunha",
            "Natália Farias",
            "Paulo Batista",
            "Letícia Moraes",
            "Fábio Rezende",
            "Sabrina Barros",
            "Alexandre Pires",
            "Adriana Soares",
            "Leandro Macedo",
            "Cristina Fonseca",
            "Márcio Viana",
            "Elaine Borges",
        ];

        $usuarios = [
            [
                "name" => "admin",
                "email" => "adm@gmail.com",
                "password" => Hash::make("123"),
                "sexo" => "Masculino",
                "nivel_acesso" => 0,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "Usuario",
                "email" => "teste@gmail.com",
                "password" => Hash::make("123"),
                "sexo" => "Feminino",
                "nivel_acesso" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ];

        // Cria 60 usuários de teste
        for ($i = 0; $i < 60; $i++) {
            $diasAtras = rand(0, 365);
            $dataRegistro = Carbon::now()->subDays($diasAtras);
            $nivelAcesso = $i % 5 == 0 ? 0 : 1;

            $nomeCompleto = $nomes[$i % count($nomes)] . " " . ($i + 1);
            $primeiroNome = explode(" ", $nomes[$i % count($nomes)])[0];
            $email = "usuario" . ($i + 1) . "@sportsking.com";

            $sexoUsuario = in_array($primeiroNome, $nomesFemininos)
                ? "Feminino"
                : "Masculino";

            $usuarios[] = [
                "name" => $nomeCompleto,
                "email" => $email,
                "password" => Hash::make("senha123"),
                "sexo" => $sexoUsuario,
                "nivel_acesso" => $nivelAcesso,
                "created_at" => $dataRegistro,
                "updated_at" => $dataRegistro,
            ];
        }

        // Inserir todos os usuários de uma vez
        DB::table("users")->insert($usuarios);

        $this->command->info("62 usuários de teste criados com sucesso!");
    }
}
