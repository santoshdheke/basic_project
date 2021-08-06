<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrudMaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud';

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

        $totalColumn = $this->getTotalTableColumn();

        $totalColumnString = "";

        if ($totalColumn>0){
            for ($i=0;$i<$totalColumn;$i++){
                $input['type_of_column'.$i] = $this->ask('column'.($i+1).' type');
                $input['name_of_column'.$i] = $this->ask('column'.($i+1).' name');
                $input['unique_of_column'.$i] = $this->ask('column'.($i+1).' unique');
                $input['nullable_of_column'.$i] = $this->ask('column'.($i+1).' nullable');
                $input['default_of_column'.$i] = $this->ask('column'.($i+1).' default');

                $validator = \Validator::make($input, [
                    'type_of_column'.$i => 'required',
                    'name_of_column'.$i => 'required',
                ]);

                if ($validator->fails()) {
                    echo 0;
                } else {
                    $column = "\$table->".$input['type_of_column'.$i]."('".$input['name_of_column'.$i]."')";
                    if ($input['nullable_of_column'.$i]){
                        $column = $column."->nullable()";
                    }
                    if ($input['unique_of_column'.$i]){
                        $column = $column."->unique()";
                    }
                    if ($input['default_of_column'.$i]){
                        $column = $column."->default(".$input['default_of_column'.$i].")";
                    }
                    $totalColumnString = $totalColumnString.$column.';';
                }
            }
        }else{
            echo 'total column is '.$totalColumn;
        }

        echo $totalColumnString;

        return 'hi';
    }

    public function getTotalTableColumn()
    {
        $input['totalColumn'] = $this->ask('How many column in this module?');
        $validator = \Validator::make($input, [
            'answer1' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $input['totalColumn'];
        } else {
            return $input['totalColumn'];
        }
    }
}
