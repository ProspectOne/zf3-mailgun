<?php

namespace ProspectOne\Zf3Mailgun\Model;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\EachPromise;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Iterator;

/**
 * Class MailGunModel
 * @package ProspectOne\Zf3Mailgun
 */
class MailGunModel
{
    const ERROR_MESSAGE = 'error when sending request to the %1$s %2$s';
    /**
     * @var Client
     */
    private $client;

    /**
     * @var UriInterface
     */
    private $uri;

    /**
     * @var string
     */
    private $auth;

    /**
     * MailGunModel constructor.
     * @param Client $client
     * @param string $uri
     * @param string $auth
     */
    public function __construct(Client $client, $uri, $auth)
    {
        $this->client = $client;
        $this->uri = new Uri($uri);
        $this->auth = $auth;
    }

    /**
     * @return UriInterface
     */
    public function getUri() : UriInterface
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return MailGunModel
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return MailGunModel
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuth(): string
    {
        return $this->auth;
    }

    /**
     * @param string $auth
     * @return MailGunModel
     */
    public function setAuth(string $auth): MailGunModel
    {
        $this->auth = $auth;
        return $this;
    }

    /**
     * @param $messages
     * @return \Generator
     */
    public function generateMessages($messages)
    {
        /** @var MessageModel $message */
        foreach($messages as $message) {
            yield $this->getClient()->postAsync($this->getUri(), [
                "auth" => [$this->getAuth()],
                "form_params" => $message->toArray(),
            ]);
        }
    }

    /**
     * @param $messages
     * @param $concurrency
     */
    public function sendBatch(Iterator $messages, $concurrency)
    {
        $status = [];
        $promises = $this->generateMessages($messages);
        $eachPromise = new EachPromise($promises, [
            'concurency' => $concurrency,
            'fulfilled' => function (ResponseInterface $response, $index) use (&$status) {
                $status[$index] = 1;
            },
            'rejected' => function (RequestException $reason, $index) use (&$status) {
                $status[$index] = 0;
            }
        ]);
        $eachPromise->promise()->wait();
        return $status;
    }
}
