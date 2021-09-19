<?php
require_once BACKEND_BASE .'models/Resource.php';

class ResourceOperations{
    private $_db;

    public function __construct()
    {
        $this->_db = Database::getInstance();
    }

    public function getResources()
    {
        $sql = "SELECT * from rss_sources";

        $results = $this->_db->Select($sql);

        $resourcesList = array();

        foreach($results as $result)
        {

            array_push(
                $resourcesList,
                new Resource(
                    $result['id'],
                    $result['name'],
                    $result['url'],
                    $result['category']                    
                )
            );
        }

        return $resourcesList;
    }

    public function create($fields)
    {
        $resourceData = array(            
            'name'          => $fields->name,
            'url'           => $fields->url,
            'category'      => $fields->category
        );
        $statement = "INSERT INTO rss_sources (name, url, category)
        VALUES (:name, :url, :category)";

        $lastInsertedID = $this->_db->insert($statement, $resourceData);
        if (!$lastInsertedID)
        {
            throw new Exception("Unable to save resource.");
        }
        return $lastInsertedID;
    }

}
