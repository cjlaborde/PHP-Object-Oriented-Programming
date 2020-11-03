<?php

use Todo\Models\Task;

require 'vendor/autoload.php';

$task = new Task;

// var_dump($task);
/*
object(Todo\Models\Task)[4]
  protected 'id' => null
  protected 'complete' => boolean false
  protected 'description' => null
  protected 'due' => null
*/

$task->setDescription('Learn oop');
$task->setDue(new DateTime('+ 2 days'));

// var_dump($task);
/*
object(Todo\Models\Task)[4]
  protected 'id' => null
  protected 'complete' => boolean false
  protected 'description' => string 'Learn oop' (length=9)
  protected 'due' => 
    object(DateTime)[3]
      public 'date' => string '2020-11-05 08:47:02.311524' (length=26)
      public 'timezone_type' => int 3
      public 'timezone' => string 'America/Puerto_Rico' (length=19)
*/