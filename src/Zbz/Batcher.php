<?php

namespace Zbz;

use SplQueue;

class Batcher
{
    protected $size;
    protected $queue;
    protected $callback;

    /**
     * Batcher constructor.
     *
     * @param int      $size
     * @param callable $callback
     */
    public function __construct($size, callable $callback)
    {
        $this->size     = $size;
        $this->queue    = new SplQueue();
        $this->callback = $callback;
    }

    public function add($data)
    {
        $this->queue->enqueue($data);

        if ($this->queue->count() >= $this->size) {
            $this->process();
        }
    }

    public function finish()
    {
        if ($this->queue->count()) {
            $this->process();
        }
    }

    protected function process()
    {
        $items = array();

        while (!$this->queue->isEmpty()) {
            $items[] = $this->queue->dequeue();
        }

        if ($items) {
            $callback = $this->callback;
            $callback($items);
        }
    }
}
