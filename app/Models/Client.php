<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function passwords()
    {
        return $this->hasMany(Password::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('gdl', 'like', '%'.$search.'%')
            ->orWhere('type', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orWhere('company', 'like', '%'.$search.'%');
    }
}
