<?php

namespace ApiWrapper\Factory;

use ApiWrapperModule\Service\ApiWrapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Created by PhpStorm.
 * User: jean-baptistehuguenin
 * Date: 29/06/2017
 * Time: 09:38
 */
class ApiWrapperFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['api-wrapper'])) {
            throw new \RuntimeException(
                'No config was found for JobOffer. Did you copy the `job_offer.local.php` file to your autoload folder?'
            );
        }

        $config = $config['api-wrapper'];

        return new ApiWrapper($config);
    }
}