<?php
/**
 * Created by PhpStorm.
 * User: jean-baptistehuguenin
 * Date: 30/06/2017
 * Time: 16:24
 */

return [
    'service_manager' => [
        'factories' => [
            'ApiWrapperModule\Service\ApiWrapper' => 'ApiWrapperModule\Factory\ApiWrapperFactory',
        ]
    ]
];