<?php

namespace App\Modules\Proposals;

class Proposal
{
    protected $id;

    protected $name;

    protected $title;

    protected $description;

    public function __construct($id, $name, $title, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
