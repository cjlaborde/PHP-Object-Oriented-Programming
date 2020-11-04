<?php

use Todo\Models\Task;
use Todo\Storage\MySqlDatabaseTaskStorage;

require 'vendor/autoload.php';

// var_dump(Task::class);


$db = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', '');

$storage = new MySqlDatabaseTaskStorage($db);
// var_dump($storage); // object(Todo\Storage\MySqlDatabaseTaskStorage)[3]


/*
$task = $storage->get(3);
$task->setDescription('Drink more coffee');
$task->setDue(new DateTime('+1 year'));
$task->setComplete();

var_dump($storage->update($task));

*/
/*
object(Todo\Models\Task)[9]
  protected 'id' => string '3' (length=1)
  protected 'complete' => string '1' (length=1)
  protected 'description' => string 'Drink more coffee' (length=17)
  protected 'due' => string '2021-11-03 19:57:13' (length=19)
*/

// var_dump($task);
/*
object(Todo\Models\Task)[6]
  protected 'id' => string '3' (length=1)
  protected 'complete' => boolean true
  protected 'description' => string 'Drink more coffee' (length=17)
  protected 'due' => 
    object(DateTime)[5]
      public 'date' => string '2021-11-03 19:02:10.270739' (length=26)
      public 'timezone_type' => int 3
      public 'timezone' => string 'America/Puerto_Rico' (length=19)
*/






/*
$task = new Task;

$task->setDescription('Drink coffee');
$task->setDue(new DateTime('+10 minutes'));
*/
/*
$task->setDescription('Learn oop');
$task->setDue(new DateTime('+ 2 days'));
*/
// $storage->store($task);

// $taskId = $storage->store($task);

// var_dump($storage->get($taskId));
/*
object(Todo\Models\Task)[8]
  protected 'id' => string '5' (length=1)
  protected 'complete' => string '0' (length=1)
  protected 'description' => string 'Drink coffee' (length=12)
  protected 'due' => string '2020-11-03 18:50:08' (length=19)
*/

// var_dump($task);
/*
object(Todo\Models\Task)[5]
  protected 'id' => null
  protected 'complete' => boolean false
  protected 'description' => string 'Learn oop' (length=9)
  protected 'due' => 
    object(DateTime)[6]
      public 'date' => string '2020-11-05 17:43:59.428080' (length=26)
      public 'timezone_type' => int 3
      public 'timezone' => string 'America/Puerto_Rico' (length=19)
*/
/*
$tasks = $storage->all();
var_dump($tasks);
*/
/*
array (size=2)
  0 => 
    object(Todo\Models\Task)[6]
      protected 'id' => string '1' (length=1)
      protected 'complete' => string '0' (length=1)
      protected 'description' => string 'Learn OOP' (length=9)
      protected 'due' => string '2020-11-03 04:58:32' (length=19)
  1 => 
    object(Todo\Models\Task)[7]
      protected 'id' => string '2' (length=1)
      protected 'complete' => string '1' (length=1)
      protected 'description' => string 'Drink Coffee' (length=12)
      protected 'due' => string '2020-11-03 04:58:32' (length=19)
*/

/*
$task = new Task;

$tasks = $db->prepare("SELECT * FROM tasks");

$tasks->setFetchMode(PDO::FETCH_CLASS, Task::class);

$tasks->execute();
*/









/*
array (size=2)
  0 => 
    object(Todo\Models\Task)[6]
      protected 'id' => string '1' (length=1)
      protected 'complete' => string '0' (length=1)
      protected 'description' => string 'Learn OOP' (length=9)
      protected 'due' => string '2020-11-03 04:58:32' (length=19)
  1 => 
    object(Todo\Models\Task)[7]
      protected 'id' => string '2' (length=1)
      protected 'complete' => string '1' (length=1)
      protected 'description' => string 'Drink Coffee' (length=12)
      protected 'due' => string '2020-11-03 04:58:32' (length=19)
*/
/*
$task = new Task;

$db = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', '');

$tasks = $db->prepare("SELECT * FROM tasks");

# FETCH_CLASS is a constant example: const VAT_RATE = 20;
// $tasks->setFetchMode(PDO::FETCH_CLASS, 'Todo\Models\Task');
# Task::class is basically pulling the full namespace^ 
$tasks->setFetchMode(PDO::FETCH_CLASS, Task::class);

$tasks->execute();
*/
// foreach ($tasks->fetchAll() as $task) {
//     echo $task->getDescription(), '<br>';
// }
/*
Learn OOP
Drink Coffee
*/
/*
foreach ($tasks->fetchAll() as $task) {
    echo $task->getDue()->format('H:i'), '<br>';
}
*/


# pulling result as model rather than array
// var_dump($tasks->fetchAll());
/*
array (size=2)
  0 => 
    object(Todo\Models\Task)[6]
      protected 'id' => string '1' (length=1)
      protected 'complete' => string '0' (length=1)
      protected 'description' => string 'Learn OOP' (length=9)
      protected 'due' => string '2020-11-03 04:58:32' (length=19)
  1 => 
    object(Todo\Models\Task)[7]
      protected 'id' => string '2' (length=1)
      protected 'complete' => string '1' (length=1)
      protected 'description' => string 'Drink Coffee' (length=12)
      protected 'due' => string '2020-11-03 04:58:32' (length=19)
*/



# not in format we need, we want to make sure these come back as model 
/*
array (size=2)
  0 => 
    array (size=8)
      'id' => string '1' (length=1)
      0 => string '1' (length=1)
      'description' => string 'Learn OOP' (length=9)
      1 => string 'Learn OOP' (length=9)
      'due' => string '2020-11-03 04:58:32' (length=19)
      2 => string '2020-11-03 04:58:32' (length=19)
      'complete' => string '0' (length=1)
      3 => string '0' (length=1)
  1 => 
    array (size=8)
      'id' => string '2' (length=1)
      0 => string '2' (length=1)
      'description' => string 'Drink Coffee' (length=12)
      1 => string 'Drink Coffee' (length=12)
      'due' => string '2020-11-03 04:58:32' (length=19)
      2 => string '2020-11-03 04:58:32' (length=19)
      'complete' => string '1' (length=1)
      3 => string '1' (length=1)

*/


# check your database connection, you should not use this on production
/*
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', '');
} catch (PDOException $e) {
    die($e->getMessage());
    // SQLSTATE[HY000] [1045] Access denied for user 'rooot'@'localhost' (using password: NO)
}
*/


















// var_dump($task);
/*
object(Todo\Models\Task)[4]
  protected 'id' => null
  protected 'complete' => boolean false
  protected 'description' => null
  protected 'due' => null
*/

// $task->setDescription('Learn oop');
// $task->setDue(new DateTime('+ 2 days'));

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