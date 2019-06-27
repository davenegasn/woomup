<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'matches';

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
    protected $fillable = ['girl1_id','girl2_id','match_type_id'];

    public function girl1()
    {
        return $this->belongsTo('App\Girl');
    }
    public function girl2()
    {
        return $this->belongsTo('App\Girl');
    }
    public function match_type()
    {
        return $this->belongsTo('App\MatchType');
    }
    
}
