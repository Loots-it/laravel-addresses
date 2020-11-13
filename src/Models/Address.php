<?php

namespace LootsIt\Address\Models;

use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

abstract class Address extends Model
{
    use HasFactory;
    use ValidatingTrait;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = ['street', 'house_number', 'bus_number', 'postal_code', 'city', 'country_code'];


    /**
     * Whether the model should throw a ValidationException if it
     * fails validation. If not set, it will default to false.
     *
     * @var boolean
     */
    protected $throwValidationExceptions = true;

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
