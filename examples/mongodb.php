<?php
/*
 * MongoDB connection, insert, and iteration examples
 */
try
{
    $m = new MongoClient(); // connect
}
catch ( MongoConnectionException $e )
{
    echo '<p>Couldn\'t connect to mongodb, is the "mongo" process running?</p>';
    exit();
}

function fetchAllExample($m)
{
    $db = $m->selectDB("test1");
    $collection = new MongoCollection($db, "personas");//select collection
    $cursor = $collection->find();//gets the cursor
    //$cursor = $collection->find(array('edad' => 24)); - filter example
    foreach ($cursor as $doc){
        yield $doc;
    }
}

function insertExample($m)
{
    $c = $m->demo->test;
    $c->insert( array( 'test' => 'yes' ) );
}