<?php

include('test.php');
include('stack.php');

class BookList implements Stack {

    private $stack;

    public function __construct()
    {
        $this->stack = new LinkedList();
    }

    public function pop() : string
    {
        if($this->isEmpty()) {
            throw new UnderflowException("Stack is empty");
        } else {
            $lastItem = $this->top();
            $this->stack->deleteLast();
            return $lastItem;
        }
    }

    public function push(string $newItem)
    {
        $this->stack->insert($newItem);
    }

    public function top() : string
    {
        return $this->stack->getNthNode($this->stack->getSize())->data;
    }

    public function isEmpty() : bool
    {
        return $this->stack->getSize() == 0;
    }
}

try {
    $programmingBooks = new BookList();
    $programmingBooks->push("Introduction to PHP7");
    $programmingBooks->push("Mastering Javascript");
    $programmingBooks->push("MySQL Workbench Tutorial");
    echo $programmingBooks->pop() . "<br>";
    echo $programmingBooks->pop() . "<br>";
    echo $programmingBooks->top() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}