<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Chamar os seeders criados para popular o banco com dados de teste
        $this->call([
            UsuarioSeeder::class,
            ContatoSeeder::class,
        ]);
        
        $this->command->info('Banco de dados populado com sucesso!');
    }
}
