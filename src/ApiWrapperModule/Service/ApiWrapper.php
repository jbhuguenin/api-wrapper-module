<?php
namespace ApiWrapperModule\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

/**
 * Created by PhpStorm.
 * User: jean-baptistehuguenin
 * Date: 29/06/2017
 * Time: 09:28
 */
class ApiWrapper extends GuzzleClient
{

    /**
     * JobOffer constructor.
     * @param \GuzzleHttp\ClientInterface $config
     */
    public function __construct($config)
    {

        $client = new Client();
        $description = new Description($config);

        parent::__construct($client, $description);
    }
}