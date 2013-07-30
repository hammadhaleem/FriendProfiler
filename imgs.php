<?php
$collageSpec = array();
$collageSpec['height'] = 146;
$collageSpec['width'] = 146;
$collageSpec['images'] = array(
	array(
		'url' => 'http://a1.twimg.com/profile_images/67054692/tiny_me_bigger.jpg',
		'x' => 0,
		'y' => 0,
		'width' => 73,
		'height' => 73,
	),
	array(
		'url' => 'http://a3.twimg.com/profile_images/112917031/twitterpic2_bigger.png',
		'x' => 73,
		'y' => 0,
		'width' => 73,
		'height' => 73,
		'rotate' => -90,
	),
	array(
		'url' => 'http://a3.twimg.com/profile_images/407558447/twitterProfilePhoto_bigger.jpg',
		'x' => 73,
		'y' => 73,
		'width' => 73,
		'height' => 73,
		'rotate' => 180,
	),
	array(
		'url' => 'http://a3.twimg.com/profile_images/60720833/ben_bigger.png',
		'x' => 0,
		'y' => 73,
		'width' => 73,
		'height' => 73,
		'rotate' => 90,
	),
);

$json = json_encode($collageSpec);

$ch = curl_init('http://collageapi.congolabs.com/create_collage.json');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

header('Content-Type: image/jpeg');
curl_exec($ch);

curl_close($ch);



?>