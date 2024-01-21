<?php
$redis = new Redis();
$redis->connect('redis', 6379);
$redis->auth('eYVX7EwVmmxKPCDmwMtyKVge8oLd2t81');

$max_calls_limit  = 5;
$time_period      = 3;
$total_user_calls = 0;

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $user_ip_address = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $user_ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $user_ip_address = $_SERVER['REMOTE_ADDR']; 
}

if (!$redis->exists($user_ip_address)) {
    $redis->set($user_ip_address, 1);
    $redis->expire($user_ip_address, $time_period);
    $total_user_calls = 1;
} else {
    $redis->INCR($user_ip_address);
    $total_user_calls = $redis->get($user_ip_address);
    if ($total_user_calls > $max_calls_limit) {
        echo "User " . $user_ip_address . " limit exceeded.";
        exit();
    }
}

echo "Welcome " . $user_ip_address . " total calls made " . $total_user_calls . " in " . $time_period . " seconds";