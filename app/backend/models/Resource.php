<?php

class Resource
{
    private $id,
            $title,
            $link,
            $category;                      

    public function __construct($id, $title, $link, $category)
    {
        $this->setID($id);
        $this->setTitle($title);
        $this->setLink($link);
        $this->setCategory($category);
    }
    public function setID($id)
    {
        if(!empty($id))
            $this->id = $id;
        else
            throw new Exception('Please give a valid user id.');
    }
    public function setTitle($title)
    {
        if(!empty($title))
            $this->title = $title;
        else
            throw new Exception('Please give a valid Resource title.');
    }
    public function setLink($link)
    {
        if(!empty($link))
            $this->link = $link;
        else
            throw new Exception('Please give a valid link.');
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function getID()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getLink()
    {
        return $this->link;
    }
    public function getCategory()
    {
        return $this->category;
    }

}
