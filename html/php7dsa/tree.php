<?php

class TreeNode {
    public $data = NULL;
    public $children = [];

    public function __construct(string $data = NULL)
    {
        $this->data = $data;
    }

    public function addChildren(TreeNode $node) 
    {
        $this->children[] = $node;
    }
}

class Tree {
    public $root = NULL;
    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }

    public function traverse (TreeNode $node, int $level = 0) {
        if ($node) {
            echo str_repeat("-", $level);
            echo $node->data . "<br>";

            foreach ($node->children as $childNode) {
                $this->traverse($childNode, $level + 1);
            }
        }
    }
}