<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user=Pablo} {--i|vip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar Correo Importante para un usuario';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = $this->argument('user');
        $vip = $this->option('vip');
        $this->confirm('Do you wish to continue?');
        $name = $this->choice('What is your name?', ['Taylor', 'Dayle'], 0 );
        $this->info($name);
        $this->info("Enviando correo de $user...");
        if($vip){
            $this->info("$user es VIP!");
        }
        $this->line('Display this on the screen');
$this->error('Something went wrong!');
$this->info('The command was successful!');
$this->table(
            ['Name', 'Email'],
            [['Luis', 'luis@dominio.com'],['Juan', 'juan@dominio.com']]
        );

    }
}
