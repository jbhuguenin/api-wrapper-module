<?php
/**
 * Created by PhpStorm.
 * User: jean-baptistehuguenin
 * Date: 04/07/2017
 * Time: 17:31
 */

namespace ApiWrapperModule\Service;

/**
 * Interface ApiWrapperInterface
 * @package ApiWrapperModule\Service
 */
interface ApiWrapperInterface
{
    public function getApiWrapper();

    public function setApiWrapper(ApiWrapper $apiWrapper);
}