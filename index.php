<?php
require 'vendor/autoload.php';
require_once('simple_html_dom.php');

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;


$client = new Client();
$userName = "check";
if(isset($_GET['uName']))
{
    $userName = $_GET['uName'];
}
//trigger exception in a "try" block
try {

    $response = $client->request("GET", "https://www.instagram.com/$userName/");
    //var_dump($response);
    //echo $response->getStatusCode();
    //echo $response->getBody();
    $body = $response->getBody();
    // Explicitly cast the body to a string
    $stringBody = (string) $body;
    // Create DOM from string
    $html = str_get_html($stringBody);
    $profileImageSrc = $html->find('meta',14)->content;
    //echo "<img src='$profileImageSrc'/>";
    echo $profileImageSrc;

  }
  
  //catch exception
  catch(Exception $e) {
    //echo $e->getMessage();
    echo "error";
  }



?>