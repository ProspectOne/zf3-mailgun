<?php

namespace ProspectOne\Zf3Mailgun;

/**
 * Class Module
 * @package Zf3Mailgun
 */
class Module
{
    /**
     * @return string[]
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }


    /**
     * getConsoleUsage(Console $console) cantilever load scripts, descriptions of commands (For Console usage help)
     *
     * @return array
     */
    public function getConsoleUsage()
    {
        return [
        ];
    }
}
