<?
include("header.php");

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$getfield = '?screen_name='.$username;
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$data = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$jsondata = json_decode($data, TRUE);

//Create Feed
$TestFeed = new RSS2;

//Use wrapper functions for common channel elements
$TestFeed->setTitle('Twitter Feed - '.$username);
$TestFeed->setLink('http://www.twitter.com');
$TestFeed->setDescription($jsondata[0]['user']['name'] . ' - ' .$jsondata[0]['user']['description']);

foreach ($jsondata as $key => $value) 
{
	$feed = $TestFeed->createNewItem();
	$feed->setTitle($value['text']);
	$feed->setLink('http://twitter.com/'.$username.'/status/'.$value['id']);
	$feed->setDate($value['created_at']);
	$feed->setDescription($value['text']);
	
	$TestFeed->addItem($feed);
}

$TestFeed->printFeed();  



?>

