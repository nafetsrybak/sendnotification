<?php

require __DIR__ . '/../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

$path_to_credentials = __DIR__ . '/data/credentials.json';
$factory = (new Factory)->withServiceAccount($path_to_credentials);

$messaging = $factory->createMessaging();

$Notification = [
    'title' => 'Notification title', //To title
    'body' => 'Notification body text', //To body
    'image' => 'https://treegrow.herokuapp.com/img/image.jpg', //To image
];

//$userNotificationToken = 'fo0uJVJ8XSGcFd7oe31zsD:APA91bHb19oxoo5EnzTE8IBKAtP0pCQCoakMelCMCityiGRo5tCdQ3n4KI1QWjxjieX5feeWlwDsgV1gA8O2MGq2H0Y__bdxKeWJe7Hh1vAcVdxtJkuRHamKyBfl9AIT026uaSZc5tGf';
$userNotificationToken = 'drM6EbN9jzVUAAieG7-KWL:APA91bGik7_Dds8hmA7tf8qZOk_OzuID4x7tN8GKy-D010az5odzGgZi_aonl3EWsa3stB1mECv8qjz2j9Lvz69Ao5Z7Q4L3we77soyTk7A_F7rAGHeWlxgAA3i9rQ5BsPOvzrN7rspw';
$message = CloudMessage::withTarget('token', $userNotificationToken)
    ->withNotification($Notification)
    ->withData([
        'icon' => 'https://treegrow.herokuapp.com/img/android-chrome-512x512.png',
        'badge' => 'https://treegrow.herokuapp.com/img/badge.png',
    ])
    ->withWebPushConfig([
        'fcm_options' => [
            'link' => 'https://stefan.local:4200'
        ]
    ])
;

$messaging->send($message);
