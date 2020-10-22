<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Output;
use Illuminate\Console\Command;
use App\User;
use Hash;

class MakeAuth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MakeAuth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public $email='radoi.teodor.cristian@gmail.com';
    public $password='Saphir987';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $output = new Output\ConsoleOutput();

        $output->writeln('Making Auth.');

        $user = User::where('email', $this->email)->first();

        if($user){
          $user->password = Hash::make($this->password);
          $user->save();

          $output->writeln('Existing user editted.');

        }else{
          $user = new User;
          $user->email = $this->email;
          $user->password = Hash::make($this->password);
          $user->save();

          $output->writeln('User created.');
        }


        return 0;
    }
}
