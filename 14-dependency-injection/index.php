<?php

class TwitterClient
{
    // takes in an handle
    public function getTweets($handle)
    {
        // here we return some fake data
        return [
            'This is a tweet',
            'Another tweet',
        ];
    }
}

class Paginator
{
}

class TwitterManager
{
    protected $paginator;

    // When we grab TwitterClient may as well grab Pagination as wee
    public function __construct(TwitterClient $client, Paginator $paginator)
    {
        $this->client = $client;
        $this->paginator = $paginator;
    }

    public function getTweetsByUser($handle)
    {
        // in here we pass the list of items we are passing as first argument
        // then pass the number of items as second argument
        // Now we are returning a paginated result of the tweets
        // We using the twitter client to pull the results
        return $this->paginator->paginate($this->client->getTweets($handle), 10);
    }
}

$twitterClient = new TwitterClient;

$twitterManager = new TwitterManager($twitterClient);

var_dump($twitterManager->getTweetsByUser('john9000'));


/*
class TwitterClient
{
    // takes in an handle
    public function getTweets($handle)
    {
        // here we return some fake data
        return [
            'This is a tweet',
            'Another tweet',
        ];
    }
}

# Now our twitter manager depends on our twitter client.
class TwitterManager
{
    protected $client;

    # we can actually use typehinting to make sure what we pass in what we expect
    # We are injecting TwitterClient here
    public function __construct(TwitterClient $client)
    {
        $this->client = $client;
    }

    public function getTweetsByUser($handle)
    {
        # now since we injecting we can use TwitterClient method getTweets
        # what we may do as well here is either sort, format, paginate them or anything else
        # this is why we have 2 separate classes
        return $this->client->getTweets($handle);
    }
}

# bare in mind that this could be external package that you pull down and you might that
# you can use within your own twitter manager and create your own method
# essentially create an adapter or wrapper
$twitterClient = new TwitterClient;

$twitterManager = new TwitterManager($twitterClient);

var_dump($twitterManager->getTweetsByUser('john9000'));
*/
/*
array (size=2)
  0 => string 'This is a tweet' (length=15)
  1 => string 'Another tweet' (length=13)
*/












/*
class TwitterManager
{
    protected $handle;

    public function __construct($handle)
    {
        $this->handle = $handle;
    }

    public function getHandle()
    {
        return $this->handle;
    }
}

$twitterManager = new TwitterManager('john9000');

echo $twitterManager->getHandle(); // john9000
*/


/*
class TwitterManager
{

    public function __construct($handle)
    {
        // var_dump('hello');
        var_dump($handle); // john9000
    }
}

// $twitterManager = new TwitterManager; // hello
*/