<?php
function processMessage($update) {
    if($update["queryResult"]["action"] == "sayHello"){
        sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=>"Hello from webhook",
            "payload" => array(
                "items"=>[
                    array(
                        "simpleResponse"=>
                    array(
                        "textToSpeech"=>"response from host"
                         )
                    )
                ],
                ),
           
        ));
    }
}
 
function sendMessage($parameters) {
    echo json_encode($parameters);
}
 
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["queryResult"]["action"])) {
    processMessage($update);
}else{
     sendMessage(array(
            "source" => $update["responseId"],
            "fulfillmentText"=>"Hello from webhook",
            "payload" => array(
                "items"=>[
                    array(
                        "simpleResponse"=>
                    array(
                        "textToSpeech"=>"Bad request"
                         )
                    )
                ],
                ),
           
        ));
}


?>
