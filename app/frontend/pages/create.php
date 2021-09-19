<?php
    /* 
        This file handles feeds save operation.
        It fetches resource links from database table
        and the fetches and save the feeds for all the links one by one.         
    */
    
try {

    $resourceOperations = new ResourceOperations();
    
    $newsOperations = new NewsOperations();

    $resources = $resourceOperations->getResources();    

    $numberOfFeedsSaved = 0;

    foreach($resources as $resource) {

        if (@simplexml_load_file($resource->getLink())) {
            
            $feeds = simplexml_load_file($resource->getLink()); 

            if (!empty($feeds)) {

                foreach ($feeds->children() as $rows) {

                    foreach ($rows as $row) {
                        
                        if($row->title) { // If the feed has title, means it is not empty and is a valid feed.
                            
                            if($newsOperations->create($row, $resource->getID(), $resource->getCategory())) // save it into database.                                  
                                $numberOfFeedsSaved +=1; // increment it only when feed saved. It'll not be saved if it already exists. 
                        }
                    }
                }

            }

        } 
    } 
        
    http_response_code(200);
    
    if($numberOfFeedsSaved > 0) 
        echo json_encode("$numberOfFeedsSaved Feed(s) saved successfully.");
    else
        echo json_encode("No feed saved.");

} catch (\Throwable $th) {

    http_response_code(404);
        
    echo json_encode($th->getMessage());
    
}