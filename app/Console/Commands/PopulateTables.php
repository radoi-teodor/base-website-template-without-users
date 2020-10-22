<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Output;
use Illuminate\Console\Command;
use Log;
use Carbon\Carbon;

class PopulateTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */

     public $tables = array(
       'App\User'=>[
            [
                'email'=>'radoi.teodor.cristian@gmail.com',
                'password'=>'$2y$10$.TX2bARFzuqVwPVwbuW27.hKMbnamFyJxk0W4TlITfS4JMcSI3yWi',
            ],
         ],
     );

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */


    public function populate_table($table_name){
      $output = new Output\ConsoleOutput();
      $output->writeln('Starting populating table "'.$table_name.'".');

      $table_data = $this->tables[$table_name];
      foreach ($table_data as $row) {
        $obj = new $table_name;
        foreach ($row as $key => $value) {
          $obj->$key = $value;
        }
        $obj->save();
      }
      $output->writeln('Population success for table "'.$table_name.'".');
      $output->writeln('');
    }

    public function handle()
    {
        $output = new Output\ConsoleOutput();
        $table = strval($this->argument('table'));

        if($table=='all'){
          $tables_data = $this->tables;
          foreach ($tables_data as $key => $value) {
            $this->populate_table($key);
          }
          $output->writeln('Done.');
        }else{
          if(array_key_exists($table, $this->tables)){
            $this->populate_table($table);
            $output->writeln('Done.');
          }else{
            $output->writeln('No table population data found with this name.');
          }
        }

    }
}
