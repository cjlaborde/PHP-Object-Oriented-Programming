<?php

namespace Todo;

use Todo\Models\Task;
use Todo\Storage\Contracts\TaskStorageInterface;

# this a class create just for dealing with tasks
# Its basically a Controller
class TaskManager
{
    protected $storage;
    # this is our concrete implementation so we type hint with interface instead
    // public function __construct(MySqlDatabaseTaskStorage $storage)
    # So we use the TaskStorageInterface instead
    // public function __construct(TaskStorageInterface $storage, Paginator $paginator)
    public function __construct(TaskStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function addTask(Task $task)
    {
        # When we check MySqlDatabaseTaskStorage.php  store method when we store a task it returns a lastInsertId
        #option 1
        // return $this->storage->store($task);
        # option 2
        /*
        $taskId = $this->storage->store($task);
        return  $this->getTask($taskId);
        */
        # option 3
        // return  $this->getTask($this->storage->store($task));

        return $this->storage->store($task);
    }

    public function updateTask(Task $task)
    {
        # pass the task you want to update
        return $this->storage->update($task);
    }

    public function getTask($id)
    {
        return $this->storage->get($id);
    }

    public function getTasks()
    {
        // return $this->paginator->paginate($this->storage);
        return $this->storage->all();
    }
}
