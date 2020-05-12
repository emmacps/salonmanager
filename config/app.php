<?php

return [
    'database' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'salon',
        'username' => 'root',
        'password' => ''
    ],
    'mail' => [
        'transport' => 'smtp',
        'encrption' => 'tls',
        'port' => 587,
        'host' => 'smtp.gmail.com',
        'username' => 'cercyakowuah16@gmail.com',
        'password' => 'abenabroni1',
        'from' => 'no-reply@salonmanager.com',
        'sender_name' => 'Salon Manager'
    ],
    'recaptcha' => [
        'key' => 'your_app_key',
        'secret' => 'your_app_secret',
    ]
];

/* 
	HOW TO ENABLE LESS SECURE APPS IN GMAIL

	1. Log in to your gmail account
	2. Click on your profile picture or Name Initial on your top right of the screen and click on Manage your Google Account.
	3. On the new page that comes up, click on security.
	4. Scroll down to the section called Less secure app access.
	5. Click on turn on access and then toggle the switch for Allow less secure apps.

	THAT's IT!!!


*/