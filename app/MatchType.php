<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'match_types';

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
    protected $fillable = ['name'];

    public function matches()
    {
        return $this->hasMany('App\Match');
    }
}
