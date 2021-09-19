<?php
    /* 
        This file handles delete operation.
    */
    
try {

    $newsOperations = new NewsOperations();

    if($newsOperations->deleteFeeds()) {

        http_response_code(200);
        
        echo json_encode("Records deleted successfully.");

    } else {

        http_response_code(404);

        echo json_encode("Records couldn't be deleted.");

    }
        
} catch (\Throwable $th) {

    http_response_code(404);

    echo json_encode($th->getMessage());

}