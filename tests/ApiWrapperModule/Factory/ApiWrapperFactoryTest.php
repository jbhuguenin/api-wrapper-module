<?php
namespace ApiWrapperModule\Factory;

use ApiWrapperModule\Bootstrap;
use ApiWrapperModule\Service\ApiWrapper;
use ApiWrapperModule\Service\JobOffer;
use Zend\ServiceManager\ServiceManager;

/**
 * Created by PhpStorm.
 * User: jean-baptistehuguenin
 * Date: 29/06/2017
 * Time: 10:24
 */
class ApiWrapperFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateFromFactory()
    {
        $config = [
            'api-wrapper' => [
                'client' => ['http_errors' => false],
                'description' => [
                    'baseUri' => 'http://httpbin.org/',
                    'operations' => [
                        'testing' => [
                            'httpMethod' => 'GET',
                            'uri' => '/get{?foo}',
                            'responseModel' => 'getResponse',
                            'parameters' => [
                                'foo' => [
                                    'type' => 'string',
                                    'location' => 'uri'
                                ],
                                'bar' => [
                                    'type' => 'string',
                                    'location' => 'query'
                                ]
                            ]
                        ]
                    ],
                    'models' => [
                        'getResponse' => [
                            'type' => 'object',
                            'additionalProperties' => [
                                'location' => 'json'
                            ]
                        ]
                    ]
                ]

            ]
        ];

        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', $config);

        $factory = new ApiWrapperFactory($config['api-wrapper']);
        $result  = $factory->createService($serviceManager);

        $this->assertInstanceOf(ApiWrapper::class, $result);
    }
}