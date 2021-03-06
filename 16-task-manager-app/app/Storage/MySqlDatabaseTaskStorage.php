<?php

namespace Todo\Storage;

use PDO;
use Todo\Models\Task;
use Todo\Storage\Contracts\TaskStorageInterface;

class MySqlDatabaseTaskStorage implements TaskStorageInterface
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function store(Task $task)
    {
        // var_dump($task);

        $statement = $this->db->prepare("
            INSERT INTO tasks (description, due, complete)
            VALUES (:description, :due, :complete)
        ");

        $statement->execute($this->buildColumns($task));

        // $statement->execute([
        //     'description' => $task->getDescription(),
        //     'due' => $task->getDue()->format('Y-m-d H:i:s'),
        //     # if true value insert 1 else false insert 0 using ternary operator
        //     'complete' => $task->getComplete() ? 1 : 0,
        // ]);

        # when we store a task we return the last inserted id
        return $this->get($this->db->lastInsertId());
    }

    public function update(Task $task)
    {
        $statement = $this->db->prepare("
            UPDATE tasks
            SET 
                description = :description,
                due = :due,
                complete = :complete
            WHERE id = :id
        ");

        # Here we want to pass id as we did before.
        $statement->execute($this->buildColumns($task, [
            'id' => $task->getId(),
        ]));
        // $statement->execute([
        //     # we are updating when this id matches
        //     'id' => $task->getId(),
        //     'description' => $task->getDescription(),
        //     'due' => $task->getDue()->format('Y-m-d H:i:s'),
        //     'complete' => $task->getComplete() ? 1 : 0,
        // ]);

        # when we update task we return this get
        return $this->get($task->getId());
    }

    public function get($id)
    {
        // :id = placeholder
        $statement = $this->db->prepare("
            SELECT id, description,due, complete
            FROM tasks
            WHERE id = :id
        ");

        $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);

        $statement->execute([
            'id' => $id,
        ]);

        return $statement->fetch();
    }

    public function all()
    {
        $statement = $this->db->prepare("
        SELECT id, description, due, complete
        FROM tasks 
        ");

        $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);

        $statement->execute();

        return $statement->fetchAll();
    }

    protected function buildColumns(Task $task, array $additional = [])
    {
        # will combine with anything passed from $additional = []
        return array_merge([
            'description' => $task->getDescription(),
            'due' => $task->getDue()->format('Y-m-d H:i:s'),
            'complete' => $task->getComplete() ? 1 : 0,
        ], $additional);
    }
}
