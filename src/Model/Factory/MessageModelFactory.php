<?php

namespace ProspectOne\Zf3Mailgun\Model\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MessageModelFactory
 * @package ProspectOne\Zf3Mailgun\Model\Factory
 */
class MessageModelFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $messageModel = new $requestedName(
            $options['to'],
            $options['from'],
            $options['title'],
            $options['text'],
            $options['html']
        );
        return $messageModel;
    }
}
