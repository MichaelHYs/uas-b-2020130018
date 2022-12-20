<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->hasMany('App\Models\orders');
    }
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'char';
}
