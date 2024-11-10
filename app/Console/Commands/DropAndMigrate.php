<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class DropAndMigrate extends Command
{
    // Nome do comando no terminal
    protected $signature = 'db:drop-and-migrate';

    // Descrição do comando
    protected $description = 'Droppa o banco de dados e recria ele antes de rodar as migrações';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Nome do banco de dados, você pode passar isso como variável de ambiente ou diretamente aqui
        $database = env('DB_DATABASE');

        // Exibe mensagem informando que o banco está sendo droppado
        $this->info('Dropping the database...');

        // Dropa o banco de dados
        DB::statement("DROP DATABASE IF EXISTS $database");

        // Cria novamente o banco de dados
        $this->info('Creating the database...');
        DB::statement("CREATE DATABASE $database");

        // Rodando as migrações
        $this->info('Running migrations...');
        Artisan::call('migrate', ['--force' => true]);

        $this->info('Migrations completed successfully.');
    }
}
