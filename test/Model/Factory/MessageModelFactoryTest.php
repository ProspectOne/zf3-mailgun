<?php

namespace ProspectOne\Zf3Mailgun\Model\Factory;

use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use ProspectOne\Zf3Mailgun\Model\MessageModel;

/**
 * Class MessageModelFactory
 * @package Model\Factory
 */
class MessageModelFactoryTest extends TestCase
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
        $factory = new MessageModelFactory();
        /** @var ContainerInterface $container */
        $container = $this->getMockBuilder(ContainerInterface::class)->disableOriginalConstructor()->getMockForAbstractClass();
        $model = $factory($container, MessageModel::class, self::OPTIONS);
        $this->assertInstanceOf(MessageModel::class, $model);
    }
}