TwitterRSS
=========

Use this simple script to turn any user's tweets, into an RSS feed.

1) Set credentials (O-AUTH) in header.php
2) Point your feed reader at your hosted website

### Example

If you want to follow the user "AwesomeTweeter", this is what the URL would look like in the feed reader:

~~~
http://example.com/TwitterRSS/index.php?user=AwesomeTweeter
~~~

You can also follow the user's favourites (I like using favourites as a "read later" list):

~~~
http://example.com/TwitterRSS/favourite.php?user=AwesomeTweeter
~~~

##### Thanks
Thanks to mibe who maintains [FeedWriter](https://github.com/mibe/FeedWriter) for the PHP library which creates the RSS feed.

Thanks to  who maitains [TwitterAPIExchange](https://github.com/j7mbo/twitter-api-php) which uses the Twitter API so it can be added to an RSS feed.


