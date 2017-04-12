<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crianca extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'criancas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nomecompleto', 'datanascimento', 'foto', 'mae', 'contato', 'sexo', 'projeto_id'];

    public function projetos(){
        return $this->BelongsTo('App\Projeto', 'projeto_id', 'id');
    }
    
}
