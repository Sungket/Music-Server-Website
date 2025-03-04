<?php

require("test.php");
require("iQueue.php");

class AgentQueue implements Queue {
    private $limit;
    private $queue;

    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList();
    }

    public function dequeue() : string
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty");
        } else {
            $lastItem = $this->peek();
            $this->queue->deleteFirst();
            return $lastItem;
        }
    }

    public function enqueue(string $newItem)
    {
        if ($this->queue->getSize() < $this->limit) {
            $this->queue->insert($newItem);
        } else {
            throw new OverflowException("Queue is full");
        }
    }

    public function peek() : string
    {
        return $this->queue->getNthNode(1)->data;
    }

    public function isEmpty() : bool
    {
        return $this->queue->getSize() == 0;
    }
}

try {
    $agents = new AgentQueue(10);
    $agents->enqueue("Fred");
    $agents->enqueue("John");
    $agents->enqueue("Keith");
    $agents->enqueue("Adiyan");
    $agents->enqueue("Mikhael");
    echo $agents->dequeue() . "<br>";
    echo $agents->dequeue() . "<br>";
    echo $agents->peek() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}