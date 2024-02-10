<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function scopeFindByDates(Builder $query, Carbon $startDate, Carbon $endDate): Builder
    {
        return $query
            ->whereDate('date', '>=', $startDate)
            ->whereDate('date', '<=', $endDate);
    }
}
