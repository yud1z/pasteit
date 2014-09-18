<?php

require_once __DIR__ . '/TwitterOAuth/TwitterOAuth.php';
require_once __DIR__ . '/TwitterOAuth/Exception/TwitterException.php';


use TwitterOAuth\TwitterOAuth;

date_default_timezone_set('UTC');


/**
 * Array with the OAuth tokens provided by Twitter when you create application
 *
 * output_format - Optional - Values: text|json|array|object - Default: object
 */
$config = array(
  'consumer_key'        => '1CcAFfvZYYuAN8JwIcKZwA',
  'consumer_secret'     => '1HVS1a63PSBt9TQW9bBIdknoAKsoQk97g0t6KCHyA',
  'oauth_token'         => '961921092-bLOf6fnOBJiNPtw8kFspubhrkIlTGcz6Si6to44O',
  'oauth_token_secret'  => '9YGRPsbR8myT46oMHe8dWW8oyKmpJc8tDbOafh11QY',
  'output_format'       => 'array'
);

/**
 * Instantiate TwitterOAuth class with set tokens
 */
$tw = new TwitterOAuth($config);

/**
 * Returns a collection of the most recent Tweets posted by the user
 * https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
 */
$params = array(
  'screen_name' => 'dinopattidjalal',
  'count' => 1,
);

/**
 * Send a GET call with set parameters
 */
$response = $tw->get('statuses/user_timeline', $params);

if (!empty($response)) {

  unlink('/home/arthezoc/public_html/relawandino.com/tweet.xml');

  //  lets write to xml
  $doc = new DOMDocument( );
  $ele = $doc->createElement( 'Root' );
  $ele->nodeValue = htmlspecialchars($response[0]['text']);
  $doc->appendChild( $ele );
  $doc->save('/home/arthezoc/public_html/relawandino.com/tweet.xml');

  echo 'success for ' . $response[0]['created_at'];

}
else {
  echo 'failure';
}
//print_r($response);



/**
 * Creates a new list for the authenticated user
 * https://dev.twitter.com/docs/api/1.1/post/lists/create
 */
//$params = array(
//'name' => 'TwOAuth',
//'mode' => 'private',
//'description' => 'Test List',
//);

///**
//* Send a POST call with set parameters
//*/
//$response = $tw->post('lists/create', $params);

//var_dump($response);
