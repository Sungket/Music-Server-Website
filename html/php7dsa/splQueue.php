<?php

$agents = new SplQueue();
$agents->enqueue("Fred");
$agents->enqueue("John");
$agents->enqueue("Keith");
$agents->enqueue("Adiyan");
$agents->enqueue("Mikhael");
echo $agents->dequeue() . "<br>";
echo $agents->dequeue() . "<br>";
echo $agents->bottom() . "<br>";