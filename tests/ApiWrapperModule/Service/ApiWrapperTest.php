<?php
namespace ApiWrapperModule\Service;

use ApiWrapperModule\Factory\ApiWrapperFactory;
use ApiWrapperModule\Bootstrap;
use ApiWrapperModule\Service\JobOffer;
use GuzzleHttp\Command\Result;
use Zend\ServiceManager\ServiceManager;

/**
 * Created by PhpStorm.
 * User: jean-baptistehuguenin
 * Date: 29/06/2017
 * Time: 10:24
 */
class ApiWrapperTest extends \PHPUnit_Framework_TestCase
{
    public function testHandleResponse()
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
        $apiWrapper  = $factory->createService($serviceManager);

        $result = $apiWrapper->testing();
        $this->assertInstanceOf(Result::class, $result);
    }
}