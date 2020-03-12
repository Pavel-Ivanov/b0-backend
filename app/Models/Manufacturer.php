<?php

namespace App\Models;

use App\Enums\Countries;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $guarded = [];

    public function getFullNameAttribute(): string
    {
        return "{$this->name} / {$this->country}";
    }

    public static function defaultManufacturers(): array
    {
        return [
            ['name' => 'Renault', 'country' => Countries::FR],
            ['name' => 'Big Filters', 'country' => Countries::RU],
            ['name' => 'Filtron', 'country' => Countries::PL],
            ['name' => 'Mann', 'country' => Countries::DE],
            ['name' => 'Koito', 'country' => Countries::JP],
        ];
    }
}
