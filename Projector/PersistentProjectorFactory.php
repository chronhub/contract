<?php

declare(strict_types=1);

namespace Storm\Contract\Projector;

interface PersistentProjectorFactory extends ProjectorFactory
{
    /**
     * Proxy method to set the projection query filter.
     *
     * @see Context::withQueryFilter()
     */
    public function filter(ProjectionQueryFilter $queryFilter): static;
}
