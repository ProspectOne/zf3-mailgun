<?php

namespace ProspectOne\Zf3Mailgun\Model;


use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class MailGunModelTest
 * @package ProspectOne\Zf3Mailgun\Model
 */
class MailGunModelTest extends TestCase
{
    const URI = "uri";
    const AUTH = "auth";
    /**
     * @test
     */
    public function generateMessages()
    {
        $guzzle = $this->getMockBuilder(Client::class)->disableOriginalConstructor()->getMock();
        $guzzle->expects($this->once())->method("__call")->willReturnCallback(function ($method, $args) {
            if ($method === "postAsync") {
                return [];
            }
        });
        $mailGunModel = new MailGunModel($guzzle, self::URI, self::AUTH);
        $message = $this->getMockBuilder(MessageModel::class)->disableOriginalConstructor()->getMock();
        $generator = $mailGunModel->generateMessages([$message]);
        foreach ($generator as $response) {}


        $guzzle = $this->getMockBuilder(Client::class)->disableOriginalConstructor()->getMock();
        $guzzle->expects($this->exactly(5))->method("__call")->willReturnCallback(function ($method, $args) {
            if ($method === "postAsync") {
                return [];
            }
        });
        $mailGunModel = new MailGunModel($guzzle, self::URI, self::AUTH);
        $message = $this->getMockBuilder(MessageModel::class)->disableOriginalConstructor()->getMock();
        $data = array_fill(0, 10, $message);
        $generator = $mailGunModel->generateMessages($data);
        $i = 0;
        foreach ($generator as $response) {
            $i++;
            if ($i === 5) {
                break;
            }
        }

        $guzzle = $this->getMockBuilder(Client::class)->disableOriginalConstructor()->getMock();
        $mailGunModel = new MailGunModel($guzzle, self::URI, self::AUTH);
        $message = $this->getMockBuilder(MessageModel::class)->disableOriginalConstructor()->getMock();
        $message->expects($this->once())->method("toArray")->willReturn([]);
        $generator = $mailGunModel->generateMessages([$message]);
        foreach ($generator as $response) {}
    }
}