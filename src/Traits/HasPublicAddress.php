<?php

declare(strict_types=1);

namespace LootsIt\Address\Traits;

use LootsIt\Address\Models\Address;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasPublicAddress
{
    use HasAddress;

    public Address $publicAddress;

    public function publicAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class)->withDefault();
    }

    public function updatePublicAddress(array $values): Address
    {
        $this->publicAddress->fill($values)->save();

        $this->publicAddress()->associate($this->publicAddress);
        $this->save();

        return $this->publicAddress;
    }
}