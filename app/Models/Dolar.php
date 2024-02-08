<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dolar extends Model
{
    use HasFactory;

    protected $table = "dolars";
    protected $fillable = ['value', 'date'];
    protected $hidden = ["created_at", "updated_at"];
    protected $casts = [
        "value" => "double",
        "date" => "datetime",
    ];
}
