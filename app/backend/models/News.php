<?php

class News
{
    private $id,
            $source_id,
            $title,
            $link,
            $description,
            $pub_date,
            $image_url,
            $category;            

    public function __construct($id, $source_id, $title, $link, $description, $pub_date, $image_url, $category)
    {
        $this->setID($id);
        $this->setSourceID($source_id);
        $this->setTitle($title);
        $this->setLink($link);
        $this->setDescription($description);
        $this->setCategory($category);
        $this->setPubDate($pub_date);
        $this->setImageUrl($image_url);
    }
    public function setID($id)
    {
        if(!empty($id))
            $this->id = $id;
        else
            throw new Exception('Please give a valid user id.');
    }
    public function setSourceID($source_id)
    {
        if(!empty($source_id))
            $this->source_id = $source_id;
        else
            throw new Exception('Please give a valid source id.');
    }
    public function setTitle($title)
    {
        if(!empty($title))
            $this->title = $title;
        else
            throw new Exception('Please give a valid news title.');
    }
    public function setLink($link)
    {
        if(!empty($link))
            $this->link = $link;
        else
            throw new Exception('Please give a valid link.');
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setImageUrl($image_url)
    {
        $this->image_url = $image_url;
    }
    public function setPubDate($pub_date)
    {
        $this->pub_date = $pub_date;
    }

    public function getID()
    {
        return $this->id;
    }
    public function getSourceID()
    {
        return $this->source_id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getLink()
    {
        return $this->link;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getImageUrl()
    {
        return $this->image_url;
    }
    public function getPubDate()
    {
        return $this->pub_date;
    }

    public function getNews()
    {
        return array(
            'id'    => $this->getID(),
            'source_id' => $this->getSourceID(),
            'title' => $this->getTitle(),
            'link'  => $this->getLink(),
            'description'   => $this->getDescription(),
            'pub_date'  => $this->getPubDate(),
            'image_url' => $this->getImageUrl(),
            'category'  => $this->getCategory()
        );
    }
}
