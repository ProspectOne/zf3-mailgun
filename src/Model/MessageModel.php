<?php

namespace ProspectOne\Zf3Mailgun\Model;

/**
 * Class MessageModel
 * @package ProspectOne\Zf3Mailgun\Model
 */
class MessageModel
{
    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $html;

    /**
     * MessageModel constructor.
     * @param string $to
     * @param string $from
     * @param string $title
     * @param string $text
     * @param string $html
     */
    public function __construct($to, $from, $title, $text, $html)
    {
        $this->to = $to;
        $this->from = $from;
        $this->title = $title;
        $this->text = $text;
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return MessageModel
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return MessageModel
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return MessageModel
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return MessageModel
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param string $html
     * @return MessageModel
     */
    public function setHtml($html)
    {
        $this->html = $html;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            "to" => $this->getTo(),
            "from" => $this->getFrom(),
            "subject" => $this->getTitle(),
            "text" => $this->getText(),
            "html" => $this->getHtml(),
        ];
    }
}
