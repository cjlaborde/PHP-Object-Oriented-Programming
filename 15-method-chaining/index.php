<?php

$user->subscribeTo('monthly')->setToken('123')->subscribe();



/*
class SearchRequest
{
    protected $query;

    protected $limit;

    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    public function setLimit($limit = 100)
    {
        $this->limit = $limit;

        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getLimit()
    {
        return $this->limit;
    }
}

class SearchService
{
    # would allow us to search a database or external service
    # this will take in some kind of request
    public function search(SearchRequest $request)
    {
        var_dump($request);
        # we have search request and query limit
        /*
            object(SearchRequest)[3]
                protected 'query' => string 'oop' (length=3)
                protected 'limit' => int 50
        */
        /*
    }
}

$service = new SearchService;
$request = new SearchRequest;

/*
$request->setQuery('oop');
$request->setLimit(50);
*/
// $request->setQuery('oop')->setLimit(50);

// $service->search($request);



/*
# what this will be responsable for is building the properties for a search for which will then
# pass to a search service, which will give us back a list of results
$request = new SearchRequest;

# this will be simple class that have setters and getters

# what we want to search
// $request->setQuery('oop');
// $request->setLimit(100);
// $request->setPerPage(10);

# with method chaining
$request->setQuery('oop')->setLimit(100)->setPerPage(10);


*/