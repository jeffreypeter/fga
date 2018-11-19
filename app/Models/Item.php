<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'description', 'quantity',
    ];
    public function itemName()
    {
        return $this->belongsTo('App\Models\ItemName');
    }

    public function storage()
    {
        return $this->belongsTo('App\Models\Storage');
    }
}
