<?php
return [
    'adminEmail' => 'a.sharaf@digitreeinc.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 259200, // 72 hours
    'user.verificationTokenExpire' => 259200, // 72 hours
    'mlConfig'=>[
        'default_language'=>'en',
        'languages'=>[
            'en'=>'English',
            'ar'=>'Arabic',
        ],
        'subdomains' => [
            'en' => 'http://local.tss.com', 
            'ar' => 'http://ar.tss.com',
        ]
    ],
];
