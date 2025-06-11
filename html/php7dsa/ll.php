<?php

class ListNode {
    public $data = NULL;
    public $next = NULL;
    public $priority = NULL;

    public function __construct(?string $data = NULL, ?int $priority = NULL)
    {
        $this->data = $data;
        $this->priority = $priority;
    }
}

class LinkedList implements Iterator{
    private $firstNode = NULL;
    private $totalNodes = 0;
    private $_currentNode = NULL;
    private $_currentPosition = 0;

    public function insert(?string $data = NULL, ?int $priority = NULL) {
        $newNode = new ListNode($data);
        $this->totalNodes++;

        if ($this->firstNode === NULL) {
            $this->firstNode = &$newNode;
        } else {
            $previous = $this->firstNode;
            $currentNode = $this->firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->priority < $priority) {

                    if ($currentNode == $this->firstNode) {
                        $previous = $this->firstNode;
                        $this->firstNode = $newNode;
                        $newNode->next = $previous;
                        return;
                    }
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    return;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
        return TRUE;
    }

    public function display() {
        echo "Total book titles: ".$this->totalNodes."<br>";
        $currentNode = $this->firstNode;
        while ($currentNode !== NULL) {
            echo $currentNode->data . "<br>";
            $currentNode = $currentNode->next;
        }
    }

    public function insertAtFirst(string $data = NULL) {
        $newNode = new ListNode($data);
        if ($this->firstNode === NULL) {
            $this->firstNode = &$newNode;
        } else {
            $currentFirstNode = $this->firstNode;
            $this->firstNode = &$newNode;
            $newNode->next = $currentFirstNode;
        }
        $this->totalNodes++;
        return TRUE;
    }

    public function search(string $data = NULL) {
        if ($this->totalNodes) { //checks whether LL is empty
            $currentNode = $this->firstNode; //set the pointer to first node
            while ($currentNode !== NULL) {
                if ($currentNode->data === $data) {
                    return $currentNode;
                }
                $currentNode = $currentNode->next;
            }
        }
        return FALSE;
    }

    public function insertBefore(string $data = NULL, string $query = NULL) {
        $newNode = new ListNode($data);

        if ($this->firstNode) {
            $previous = NULL;
            $currentNode = $this->firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    $this->totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfter(string $data = NULL, string $query = NULL) {
        $newNode = new ListNode($data);

        if ($this->firstNode) {
            $nextNode = NULL;
            $currentNode = $this->firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== NULL) {
                        $newNode->next = $nextNode;
                    }
                    $currentNode->next = $newNode;
                    $this->totalNodes++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }

    public function deleteFirst() {
        if ($this->firstNode !== NULL) {
            if ($this->firstNode->next !== NULL) {
                $this->firstNode = $this->firstNode->next;
            } else {
                $this->firstNode = NULL;
            }
            $this->totalNodes--;
            return TRUE;
        }
        return FALSE;
    }

    public function deleteLast() {
        if ($this->firstNode !== NULL) {
            $currentNode = $this->firstNode;
            if ($currentNode->next === NULL) {
                $this->firstNode = NULL;
            } else {
                $previousNode = NULL;

                while ($currentNode->next !== NULL) { //iterate thru the LL
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }
                $previousNode->next = NULL;
                $this->totalNodes--;
                return TRUE;
            }
        }
        return FALSE;
    }

    public function delete(string $query = NULL) {
        if ($this->firstNode) {
            $previous = NULL;
            $currentNode = $this->firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    if ($currentNode->next === NULL) {
                        $previous->next = NULL;
                    } else {
                        $previous->next = $currentNode->next;
                    }

                    $this->totalNodes--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function reverse() {
        if ($this->firstNode !== NULL) {
            if ($this->firstNode->next !== NULL) {
                $reversedList = NULL;
                $next = NULL;
                $currentNode = $this->firstNode;
                while ($currentNode !== NULL) {
                    $next = $currentNode->next;
                    $currentNode->next = $reversedList;
                    $reversedList = $currentNode;
                    $currentNode = $next;
                }
                $this->firstNode = $reversedList;
            }
        }
    }

    public function getNthNode(int $n = 0) {
        $count = 1;
        if ($this->firstNode !== NULL) { //check if the LL is not empty, then set the 
            $currentNode = $this->firstNode; //pointer to the first node.
            while ($currentNode !== NULL) { //iterate thru the nodes
                if ($count === $n) {    //found a match
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function getSize() {
        return $this->totalNodes;
    }

    public function current(): mixed
    {
        return $this->_currentNode->data;
    }

    public function next(): void
    {
        $this->_currentPosition++;
        $this->_currentNode = $this->_currentNode->next;
    }

    public function key(): mixed
    {
        return $this->_currentPosition;
    }

    public function rewind(): void
    {
        $this->_currentPosition = 0;
        $this->_currentNode = $this->firstNode;
    }

    public function valid(): bool
    {
        return $this->_currentNode !== NULL;
    }
}

class CircularLinkedList {
    private $_firstNode = NULL;
    private $_totalNode = 0;

    public function insertAtEnd(string $data = NULL) {
        $newNode = new ListNode();
        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
        } else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== $this->_firstNode) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $newNode->next = $this->_firstNode;
        $this->_totalNode++;
        return TRUE;
    }

    public function display() {
        echo "Total book titles: " . $this->_totalNode . "<br>";
        $currentNode = $this->_firstNode;
        while ($currentNode->next !== $this->_firstNode) {
            echo $currentNode->data . "<br>";
            $currentNode = $currentNode->next;
        }

        if ($currentNode) {
            echo $currentNode->data . "<br>";
        }
    }
}

// $BookTitles = new LinkedList();
// $BookTitles->insert("Introduction to Al-G-Rhythms");
// $BookTitles->insert("Introduction to PHP Data Structures and Algorithms");
// $BookTitles->insert("Programming Intelligence");
// $BookTitles->insertAtFirst("Mediawiki Administrative tutorial Guide");
// $BookTitles->insertBefore("Introduction to Calculus", "Programming Intelligence");
// $BookTitles->insertAfter("Introduction to Calculus", 'Programming Intelligence');
// $BookTitles->display();
// $BookTitles->deleteFirst();
// $BookTitles->deleteLast();
// $BookTitles->delete("Introduction to PHP Data Structures and Algorithms");
// $BookTitles->reverse();
// $BookTitles->display();
// echo "2nd item is: " . $BookTitles->getNthNode(2)->data;

// foreach ($BookTitles as $title) {
//     echo $title . "<br>";
// }

// for ($BookTitles->rewind(); $BookTitles->valid(); $BookTitles->next()) {
//     echo $BookTitles->current() . "<br>";
// }