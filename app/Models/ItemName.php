<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemName extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'description',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
