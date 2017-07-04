<?php
namespace ApiWrapperModule\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use Zend\Config\Exception\RuntimeException;

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
        $configClient = (isset($config['client'])) ? $config['client'] : [];
        $client = new Client($configClient);

        if (! isset($config['description'])) {
            throw new RuntimeException('missing description configuration');
        }
        $description = new Description($config['description']);

        parent::__construct($client, $description);
    }
}