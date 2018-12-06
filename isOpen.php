<?php
  require_once 'HTTP/Request2.php';

  $request = new HTTP_Request2('http://192.168.212.101/open_close/', HTTP_Request2::METHOD_GET);
  try {
    $response = $request->send();
    if (200 == $response->getStatus()) {
      $json = $response->getBody();
      $obj = json_decode($json);
      $open = $obj->{'open'};
      if($open) {
        echo "open";
      } else {
        echo "closed";
      }
    } else {
       //echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' . $response->getReasonPhrase();
       echo("failed");
    }
  } catch (HTTP_Request2_Exception $e) {
    //echo 'Error: ' . $e->getMessage();
    echo("failed");
  }
?>
