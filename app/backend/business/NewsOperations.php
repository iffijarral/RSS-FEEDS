<?php

class NewsOperations
{
    private $_db;

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function getFeeds($category = '')
    {
        if($category)
            $sql = "SELECT * from rss_feed_data WHERE category LIKE '%".$category."%'";
        else
            $sql = "SELECT * from rss_feed_data";
        
        $results = $this->_db->Select($sql);
        
        $newsList = array();                

        foreach($results as $result)
        {
            $news = new News(
                $result['id'],
                $result['source_id'],
                $result['title'],
                $result['link'],
                $result['description'],
                $result['pub_date'],
                $result['image_url'],
                $result['category']
            );

            array_push($newsList, $news->getNews());
        }

        return $newsList;
    }
    
    public function create($fields, $sourceID, $sourceCategory)
    {
        $category = $sourceCategory;        
        $imageUrl = '';

        if (isset($fields->category)) {

            $tags = '';
            $index = 0;

            foreach($fields->category as $category) {
                            
                $tags .= $category;    

                if($index < sizeof($fields->category)-1) {
                    $tags .=',';
                }

                $index ++;
            }

            $category = $tags;

        }                  
        
        foreach ($fields->children("media", true) as $child) {

            $imageUrl = $child->attributes()->url;
            break;
        }

        $newsData = array(
            'source_id'     => $sourceID,
            'title'         => $fields->title,
            'link'          => $fields->link,
            'description'   => $fields->description,
            'category'      => $category,
            'image_url'     => $imageUrl            
        );       

        $statement = "INSERT INTO  rss_feed_data (source_id, title, link, description, image_url, category)

                    VALUES (:source_id, :title, :link, :description, :image_url, :category)";

        try {
            
            $lastInsertedID = $this->_db->insert($statement, $newsData);

        } catch(Throwable $e) {

            throw new Exception($e->getMessage());

        }
        

        if (!$lastInsertedID) {

            return false;

        }

        return $lastInsertedID;
        
    }

    public function deleteFeeds()
    {        
        try {
            if($this->_db->Remove("Delete from rss_feed_data" )) {

                return true;

            } else {

                return false;

            }

        } catch(Throwable $e) {

            throw new Exception($e->getMessage());

        }
    }
}
