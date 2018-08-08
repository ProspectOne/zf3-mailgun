<?php

namespace ProspectOne\Zf3Mailgun;

use ProspectOne\Zf3Mailgun\Model\Factory\MailGunModelFactory;
use ProspectOne\Zf3Mailgun\Model\Factory\MessageModelFactory;
use ProspectOne\Zf3Mailgun\Model\MailGunModel;
use ProspectOne\Zf3Mailgun\Model\MessageModel;

return [
    'service_manager' => [
        'factories' => [
            MessageModel::class => MessageModelFactory::class,
            MailGunModel::class => MailGunModelFactory::class,
        ],
    ],
    'prospectone' => [
        'zf3mailgun' => [
            'application-url' => 'https://api.mailgun.net/v3/YOUR_DOMAIN_NAME/messages',
            'api-key' => 'YOUR_API_KEY',
        ],
    ],
/*    'console' => [
        'router' => [
            'routes' => [
                'websocket-console' => [
                    'options'   => [
                        'route' => 'ratchet server start',
                        'defaults' => [
                            'controller'    => ServerController::class,
                            'action'        => 'startRatchetServer',
                        ],
                    ],
                ],
            ],
        ],
    ],*/
];
