<?php

namespace ProspectOne\Zf3Mailgun\Model\Factory;

use GuzzleHttp\Client;
use Interop\Container\ContainerInterface;
use ProspectOne\Zf3Mailgun\Model\MailGunModel;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MailGunModelFactory
 * @package ProspectOne\Zf3Mailgun\Model\Factory
 */
class MailGunModelFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return MailGunModel
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get("Config");
        $uri =  $config['prospectone']['zf3mailgun']['application-url'];
        $apiKey = $config['prospectone']['zf3mailgun']['api-key'];
        $mailGunModel = new MailGunModel(new Client(), $uri, $apiKey);
        return $mailGunModel;
    }
}