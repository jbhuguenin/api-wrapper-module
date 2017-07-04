<?php
/**
 * Created by PhpStorm.
 * User: jean-baptistehuguenin
 * Date: 04/07/2017
 * Time: 17:36
 */

namespace ApiWrapperModule\Service;


trait ApiWrapperAwareTrait
{
    protected $apiWrapper;

    /**
     * @return mixed
     */
    public function getApiWrapper()
    {
        return $this->apiWrapper;
    }

    /**
     * @param ApiWrapper $apiWrapper
     * @return $this
     */
    public function setApiWrapper(ApiWrapper $apiWrapper)
    {
        $this->apiWrapper = $apiWrapper;
        return $this;
    }
}