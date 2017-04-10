<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamada_crianca extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chamada_criancas';

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
    protected $fillable = ['crianca_id', 'presenca', 'chamada_id'];

    public function chamadas(){
        $this->belongsToMany('App\Chamada');
    }
    
}
