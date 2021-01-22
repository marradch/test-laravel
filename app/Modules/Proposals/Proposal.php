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

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
