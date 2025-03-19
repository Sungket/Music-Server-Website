<?php

class MinHeap {

    public $heap;
    public $count;

    public function __construct(int $size)
    {
        $this->heap = array_fill(0, $size + 1, 0);
        $this->count = 0;
    }
}

public function create(array $arr = []) {
    if ($arr) {
        foreach ($arr as $val) {
            $this->insert($val);
        }
    }
}

public function insert(int $i) {
    if ($this->count == 0) {
        $this->heap[1] = $i;
        $this->count = 2;
    } else {
        $this->heap[$this->count++] = $i;
        $this->siftUp();
    }
}

public function siftUp() {
    $tmpPos = $this->count - 1;
    $tmp = intval($tmpPos / 2);

    while ($tmpPos > 0 && $this->heap[$tmp] > $this->heap[$tmpPos]) {
        $this->swap($tmpPos, $tmp);
        $tmpPos = intval($tmpPos / 2);
        $tmp = intval($tmpPos / 2);
    }
}