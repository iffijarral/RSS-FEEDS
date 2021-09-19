<?php    
    /*
        This file handles data fetch operation.
        Without any parameter it fetches all the feeds.
        When there is a category parameter, it fetches
        data only related to given category.
    */ 
        
try {

    $newsOperations = new NewsOperations();    

    if(isset($category))

        $news = $newsOperations->getFeeds(urldecode($category));
        
    else

        $news = $newsOperations->getFeeds();
        
    http_response_code(200);        
        
    echo json_encode($news);
        
} catch (\Throwable $th) {

    http_response_code(404);

    echo json_encode($th->getMessage());

}