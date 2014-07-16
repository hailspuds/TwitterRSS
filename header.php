<?
require_once('TwitterAPIExchange.php');

include 'Feeds/Item.php';
include 'Feeds/Feed.php';
include 'Feeds/RSS2.php';
use \FeedWriter\RSS2;
date_default_timezone_set('UTC');

$username = $_GET['user'];

$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);
	
?>