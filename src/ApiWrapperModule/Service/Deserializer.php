<?php
/**
 * Created by PhpStorm.
 * User: jean-baptistehuguenin
 * Date: 06/07/2017
 * Time: 10:16
 */

namespace ApiWrapperModule\Service;


use GuzzleHttp\Command\Guzzle\Parameter;
use Psr\Http\Message\ResponseInterface;

class Deserializer extends \GuzzleHttp\Command\Guzzle\Deserializer
{
    /**
     * @param Parameter $model
     * @param ResponseInterface $response
     * @return array|\GuzzleHttp\Command\Result|\GuzzleHttp\Command\ResultInterface|void
     */
    protected function visit(Parameter $model, ResponseInterface $response)
    {

        if ($model->getType() === 'class') {
            $result = $this->visitOuterClass($model, $response);
        } else {
            $result = parent::visit($model, $response);
        }

        return $result;
    }

    private function visitOuterClass(
        Parameter $model,
        ResponseInterface $response
    ) {
        if(!$className = $model->getData('className')) {
            throw new \InvalidArgumentException('Unknown className: ' . $className);
        }

        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Class does not exist: ' . $className);
        }

        $class = new $className();

        if (!$class instanceof \ArrayObject) {
            throw new \InvalidArgumentException('Class must implements \Arrayobject');
        }

        return $class->exchangeArray(\GuzzleHttp\json_decode($response->getBody(), true));
    }
}