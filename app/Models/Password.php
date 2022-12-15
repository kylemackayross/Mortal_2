<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('name', 'like', '%'.$search.'%')
            ->orWhere('service', 'like', '%'.$search.'%')
            ->orWhere('address', 'like', '%'.$search.'%')
            ->orWhere('client_id', 'like', '%'.$search.'%');
    }
}
