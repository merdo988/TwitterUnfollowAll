<?php
require 'connection.php';

$followers = $connection->get("followers/ids");
$friends = $connection->get("friends/ids");
$friendsc=count($friends->ids);
$followersc=count($followers->ids);
echo "You have $followersc followers";
echo "<br>";
echo "You followed $friendsc person";
echo "<br>";
$i=0;
$deleted=0;
while($i<$friendsc){
	$a=0;
	$j=0;
	while($j<$followersc){

		if($friends->ids[$i]==$followers->ids[$j]){
			$a=1;


		}
		$j++;

	}
	if($a==0){
		$user=$connection->post("friendships/destroy",["user_id" => $friends->ids[$i]]);
$deleted++;
	}
	$i++;
}
echo "$deleted nonfollowers deleted";


?>