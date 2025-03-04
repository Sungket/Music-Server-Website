<?php

interface Queue {

    public function enqueue(string $item);

    public function dequeue();

    public function peek();

    public function isEmpty();
}