<?php 
return [
    'driver' => 'smtp',
    'host' => 'smtp.googlemail.com',
    'port' => 587,
    'from' => ['address' => 'purwarupatech@gmail.com', 'name' => "CS Stockistmoc"],
    'encryption' => 'tls',
    'username' => 'purwarupatech@gmail.com',
    'password' => 'jfitorxlsgdglpei',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'stream' => [
        'ssl' => [
            'allow_self_signed' => true,
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ],
];

 ?>