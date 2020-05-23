<?php

if (!isset($argv[1])) {
    echo "Please enter a potential password to check..";
    exit();
}

$potential_password = $argv[1];
$potential_password_hashed = sha1($potential_password);
$potential_password_hashed_prefix = substr($potential_password_hashed, 0, 5);
$potential_password_hashed_suffix = strtoupper(substr($potential_password_hashed, -10));

echo "Checking password..\n";

$ch = curl_init("https://api.pwnedpasswords.com/range/{$potential_password_hashed_prefix}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$resp = curl_exec($ch);

$values = explode("\n", $resp);

foreach ($values as $value) {
    $exploded_value = explode(":", $value);
    $potential_hash = trim($exploded_value[0]);
    $times_leaked = trim($exploded_value[1]);

    $potential_hash_suffix = strtoupper(substr($potential_hash, -10));

    if ($potential_hash_suffix == $potential_password_hashed_suffix) {
        echo "Your password's hash ({$potential_hash}) was found ({$times_leaked}) time(s)";
        die();
    }
}

echo "Your password has never been leaked before. YOU ARE GUCCI!";
exit();
