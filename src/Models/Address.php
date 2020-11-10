<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street', 'house_number', 'bus_number', 'postal_code', 'city', 'country_code'];

    /**
     * The default rules that the model will validate against.
     *
     * @var array
     */
    protected $rules = [
        'street' => 'nullable|string|max:150',
        'house_number' => 'nullable|integer',
        'bus_number' => 'nullable|string|max:20',
        'postal_code' => 'nullable|string|max:20',
        'city' => 'nullable|string|max:150',
        'country_code' => 'nullable|alpha|size:2|country',
    ];
}
