<?php
function postCookie(){
	$ch = curl_init();
  $postdata ="cookie=".$_COOKIE['HERALD_USER_SESSION_ID'];
  curl_setopt($ch, CURLOPT_URL, 'http://herald.seu.edu.cn/useraccount/getloginuserinfo.php');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
  $responseword = curl_exec($ch);
  curl_close($ch);
	return $responseword;
}

function currentUser(){
	if(!empty($_COOKIE['HERALD_USER_SESSION_ID'])){
		$loginuserinfojson = postCookie();
		if(!empty($loginuserinfojson)){
			$loginuserinfo = json_decode($loginuserinfojson, true);
			if($loginuserinfo['code'] == 200){
				$resultinfo =  json_decode($loginuserinfo['data'], true);
				$result = $resultinfo['cardnum'];
				$username = $resultinfo['truename'];
				return array($result, $username);
			}elseif($loginuserinfo['code'] == 404){
				return false;
			}
		}else{
			return false;
		}
	}else{
		return false;
	}
}