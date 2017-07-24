<?php


include_once "faker.php";

// create ws server
$ws = new swoole_websocket_server("0.0.0.0", 9501);

$ws->user = [];

// listening connecting ws server
$ws->on('open', function ($ws, $request) {

	// set user
	$ws->user = [
		'fd'	   => $request->fd,
		'username' => Faker::username(),
		'avatar'   => Faker::avatar()
	];

	$data['user'] = $ws->user;
	$data['package'] = [
		'type' => 'login',
		'time' => date('Y-m-d H:i:s'),
		'data' => 'login'
	];

	$res = json_encode($data);

	foreach ($ws->connections as $fd) {
		$ws->push($fd, $res);
	}
});

// on message
$ws->on('message', function ($ws, $frame) {

	$data['user'] = $ws->user;
	$data['package'] = [
		'type' => 'message',
		'time' => date('Y-m-d H:i:s'),
		'data' => $frame->data
	];

	$res = json_encode($data);

    foreach ($ws->connections as $fd) {
		$ws->push($fd, $res);
	}

});

// close
$ws->on('close', function ($ws, $fd) {

	$data['user'] = $ws->user;
	$data['package'] = [
		'type' => 'logout',
		'time' => date('Y-m-d H:i:s'),
		'data' => 'logout'
	];

	$res = json_encode($data);

    foreach ($ws->connections as $fd) {
		$ws->push($fd, $res);
	}
});

$ws->start();


?>