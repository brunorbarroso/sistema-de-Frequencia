<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Cidade extends Authenticatable
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cidades';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'uf',
    ];

    public function projeto(){
        return $this->BelongsTo('App\Projeto');
    }

}
