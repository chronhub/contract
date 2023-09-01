<?php

declare(strict_types=1);

namespace Storm\Contract\Tracker;

interface MessageTracker extends Tracker
{
    /**
     * Shortcut to watch on Dispatch Event
     *
     * @see Report
     */
    public function onDispatch(callable $story, int $priority = 1): EventListener;

    /**
     * Shortcut to watch on Finalize Event
     *
     * @see Report
     */
    public function onFinalize(callable $story, int $priority = 1): EventListener;

    public function newStory(string $eventName): MessageStory;
}
