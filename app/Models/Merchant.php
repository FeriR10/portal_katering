<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $table = 'merchant';


    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function menu()
    {
        return $this->hasOne(Menu::class, 'merchant_id', 'id');

    }
}
