<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Girl extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'girls';

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
    protected $fillable = ['name','role_id','company_id'];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function matches()
    {
        return $this->hasMany('App\Match');
    }
}
