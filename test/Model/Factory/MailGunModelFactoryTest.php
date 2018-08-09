<?php

namespace ProspectOne\Zf3Ratchet\Model\Factory;

use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use ProspectOne\Zf3Mailgun\Model\Factory\MailGunModelFactory;
use ProspectOne\Zf3Mailgun\Model\MailGunModel;

/**
 * Class MailGunModelFactoryTest
 * @package ProspectOne\Zf3Ratchet\Model\Factory
 */
class MailGunModelFactoryTest extends TestCase
{
    const OPTIONS = [
        "to" => "to",
        "from" => "from",
        "title" => "title",
        "text" => "text",
        "html" => "html",
    ];

    /**
     * @test
     */
    public function invoke()
    {
        $factory = new MailGunModelFactory();
        /** @var ContainerInterface $container */
        $container = $this->getMockBuilder(ContainerInterface::class)->disableOriginalConstructor()->getMockForAbstractClass();
        $model = $factory($container, MailGunModel::class, self::OPTIONS);
        $this->assertInstanceOf(MailGunModel::class, $model);
    }
}
