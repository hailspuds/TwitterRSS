<?
include("header.php");

$url = "https://api.twitter.com/1.1/favorites/list.json";
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
$TestFeed->setTitle('Favourites - '.$username);
$TestFeed->setLink('http://www.twitter.com');
$TestFeed->setDescription('A feed of favourites for '.$username);

foreach ($jsondata as $key => $value) 
{
	$feed = $TestFeed->createNewItem();
	$feed->setTitle($value['user']['name'] . ' (@'.$value['user']['screen_name'].') - ' . $value['text']);
	$feed->setLink('http://twitter.com/'.$value['user']['screen_name'].'/status/'.$value['id']);
	$feed->setDate($value['created_at']);
	$feed->setDescription($value['user']['name'] . ' (@'.$value['user']['screen_name'].') <br><br> ' . $value['text']);
	
	$TestFeed->addItem($feed);
}

$TestFeed->printFeed();  



?>

