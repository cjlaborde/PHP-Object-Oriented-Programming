<?php

class Task
{
}

interface TaskStorageInterface
{
    public function get($id);
    public function store(Task $task);
}

class FileTaskStorage implements TaskStorageInterface
{
    public function get($id)
    {
        // file implementation

    }

    public function store(Task $task)
    {
        // file implementation

    }
}

class MySqlDatabaseTaskStorage implements TaskStorageInterface
{
    public function get($id)
    {
        // mysql implementation

    }

    public function store(Task $task)
    {
        // mysql implementation

    }

    private function buildQuery()
    {
    }
}

$storage = new MySqlDatabaseTaskStorage;
//  Class MySqlDatabaseTaskStorage contains 2 abstract methods and must therefore be declared 
// abstract or implement the remaining methods (TaskStorageInterface::get, TaskStorageInterface::store)