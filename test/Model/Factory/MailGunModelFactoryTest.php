<?php

namespace ProspectOne\Zf3Ratchet\Model\Factory;

use Interop\Container\ContainerInterface;
use PHPUnit\Framework\MockObject\MockObject;
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
        'prospectone' => [
            'zf3mailgun' => [
                'application-url' => "url",
                "api-key" => "api-key",
            ],
        ],
    ];

    /**
     * @test
     */
    public function invoke()
    {
        $factory = new MailGunModelFactory();
        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockBuilder(ContainerInterface::class)->disableOriginalConstructor()->getMockForAbstractClass();
        $container->expects($this->once())->method("get")->with($this->equalTo("Config"))->willReturn(self::OPTIONS);

        $model = $factory($container, MailGunModel::class, self::OPTIONS);
        $this->assertInstanceOf(MailGunModel::class, $model);
    }
}
