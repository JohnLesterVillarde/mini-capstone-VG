<?php
require __DIR__ . '/vendor/autoload.php';

$options = array(
    'cluster' => 'ap1',
    'useTLS' => true
);
$pusher = new Pusher\Pusher(
    '7319cd748838c92b0aee',
    '36510d3146f213bea9f2',
    '1776063',
    $options
);

$data['message'] = 'New user has been sucessfully added';
$pusher->trigger('my-channel', 'my-event', $data);
