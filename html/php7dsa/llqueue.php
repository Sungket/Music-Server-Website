<?php

require("ll.php");
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
    $agents->enqueue("Fred", 1);
    $agents->enqueue("John", 2);
    $agents->enqueue("Keith", 3);
    $agents->enqueue("Adiyan", 4);
    $agents->enqueue("Mikhael", 2);
    echo $agents->dequeue() . "<br>";
    echo $agents->dequeue() . "<br>";
    echo $agents->peek() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}