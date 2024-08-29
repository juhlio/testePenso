<?php

namespace App\Models;

class Task
{
    public $id;
    public $subject;
    public $description;
    public $due_date;

    public function __construct($attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->$key = $value;
        }
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'description' => $this->description,
            'due_date' => $this->due_date,
        ];
    }
}
