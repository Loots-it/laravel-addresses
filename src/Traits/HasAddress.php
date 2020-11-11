<?php

declare(strict_types=1);

namespace LootsIt\Address\Traits;

trait HasAddress
{
    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @param string $related
     * @param string|null $foreignKey
     * @param string|null $ownerKey
     * @param string|null $relation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    abstract public function belongsTo($related, $foreignKey = null, $ownerKey = null, $relation = null);

    /**
     * Save the model to the database.
     *
     * @param array $options
     * @return bool
     */
    abstract public function save(array $options = []);
}