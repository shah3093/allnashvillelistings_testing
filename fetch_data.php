<?php

require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;


$client = new \GuzzleHttp\Client();


//////// Scrapping Key from Page

$url = "https://www.allnashvillelistings.com/neighborhood-city/32714/Brentwood";
$response = $client->request('GET', $url);
$html =  (string) $response->getBody();

$crawler = new Crawler($html);
$hjid = $crawler->filter('.market-report-container')->attr('data-hjid');


///// Fetched Data via API

$query_param = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $bath = $query_param .= empty($_POST['bath']) ? "bath=".$_POST['bath'] : null;

    $beds = empty($_POST['beds']) ? $_POST['beds'] : null;

    if(!empty($beds)){
        if(!empty($bath)){
            $query_param .= "&beds=".$beds;
        }else{
            $query_param .= "beds=".$beds;
        }
    }
}


//$key = "5088638cc6b5a2bb8b48ae4e787a5892";
$url = "https://www.allnashvillelistings.com/sale-statics/city/".$hjid."?".$query_param;
$response = $client->get($url);
$fetched_datas =  json_decode($response->getBody(), true);




