<?php

$me_file = getcwd() . '/me.json';

if (file_exists($me_file)) {
    $me = json_decode(file_get_contents($me_file));
    $name = $me->name;
    $email = $me->email;
} else {
    $name = readline('Please enter your name: ');
    $email = readline('Please enter your e-mail address: ');

    file_put_contents($me_file, json_encode([
        "name" => $name,
        "email" => $email
    ]));
}

passthru('git config --local user.name ' . escapeshellarg($name));
passthru('git config --local user.email ' . escapeshellarg($email));

