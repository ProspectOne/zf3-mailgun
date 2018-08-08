<?php
/**
 * Created by PhpStorm.
 * User: ikova
 * Date: 08.08.2018
 * Time: 20:27
 */

namespace ProspectOne\Zf3Mailgun\Model\Factory;


use Interop\Container\ContainerInterface;
use ProspectOne\Zf3Mailgun\Model\MessageModel;
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
        $messageModel = new MessageModel(
            $options['to'],
            $options['from'],
            $options['title'],
            $options['text'],
            $options['html']
        );
        return $messageModel;
    }
}
