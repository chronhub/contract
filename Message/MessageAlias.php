<?php

declare(strict_types=1);

namespace Storm\Contract\Message;

use Storm\Message\InvalidMessageAlias;

interface MessageAlias
{
    /**
     * @throws InvalidMessageAlias when class string does not exist.
     */
    public function toAlias(string|object $class): string;
}
