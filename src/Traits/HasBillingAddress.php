<?php

declare(strict_types=1);

namespace LootsIt\Address\Traits;

use LootsIt\Address\Models\Address;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasBillingAddress
{
    use HasAddress;

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class)->withDefault();
    }

    public function updateBillingAddress(array $values): Address
    {
        $this->billingAddress->fill($values)->save();

        $this->billingAddress()->associate($this->billingAddress);
        $this->save();

        return $this->billingAddress;
    }
}