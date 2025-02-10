<?php

namespace JobMetric\Accounting\Events;

class CountingableResourceEvent
{
    /**
     * The countingable model instance.
     *
     * @var mixed
     */
    public mixed $countingable;

    /**
     * The resource to be filled by the listener.
     *
     * @var mixed|null
     */
    public mixed $resource;

    /**
     * Create a new event instance.
     *
     * @param mixed $countingable
     */
    public function __construct(mixed $countingable)
    {
        $this->countingable = $countingable;
        $this->resource = null;
    }
}
