<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'meal_id', 'meal_data'];
    protected $casts = ['meal_data' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
