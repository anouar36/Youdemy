<?php
namespace App\Classes;

class Course {
    private $id;
    private $title;
    private $description;
    private $content;
    private $tages;
    private $categories;

    
    public function __construct($id, $title, $description, $content, $tages, $categories) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->tages = $tages;
        $this->categories = $categories;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCategories() {
        return $this->categories;
    }

    public function getTages() {
        return $this->tages;
    }
}