<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ViewsSeeder extends Seeder {

    public function run()
    {
        \DB::statement("CREATE VIEW `".ENV('DB_DATABASE')."`.`lista_faltas` AS SELECT cc.crianca_id, count(cc.presenca) total_faltas FROM chamadas ch INNER JOIN chamada_criancas cc ON cc.chamada_id = ch.id WHERE cc.presenca = 0 GROUP BY cc.crianca_id");
    }

}