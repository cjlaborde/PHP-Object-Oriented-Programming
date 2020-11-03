<?php

namespace Todo\Models;

use DateTime;

class Task
{
    protected $id;

    // false since when we create task we assume is not complete
    protected $complete = false;

    protected $description;

    protected $due;

    // you can add typehitting but since you may have numerical description we don't type hint it
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setComplete($complete = true)
    {
        $this->complete = $complete;
    }

    public function getComplete()
    {
        return (bool) $this->complete;
    }

    public function setDue(DateTime $due)
    {
        $this->due = $due;
    }

    public function getDue()
    {
        // return DateTime if this is a string
        if (!$this->due instanceof DateTime) {
            return new DateTime($this->due);
        }
        return $this->due;
    }

    public function getId()
    {
        return $this->id;
    }
}
