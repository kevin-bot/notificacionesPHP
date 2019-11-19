

<?php
	
	function enviar($to ='', $data =array()){

		$apiKey = "AAAA3z66z1Y:APA91bFSAenJdX-YA3364qDTDV773dgjYElYa5r1tl3k55mKMy0QSFMWCAE9qDSC9LffZ2OAINUDf3lM9L7uv3WOjoKv9EWupixUaCRXHUaexHCXT3iWIUpNmSqj-BoPUlpnMM0jVQeT";

		$fields = array(
			'ro' => $to,
			'data'=>$data			
		);

		$headers = array('Authorization: key='.$apiKey, 'Content-Type:application/json');

		$url= 'https://fmc.googleapis.con/fcm/send';

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

		echo json_encode($fields);
		echo "<br><br>RESPUESTA FCM: ";

		$result=curl_exec($ch);
		curl_close($ch);

		return json_decode($result,true);

	}

	//VAMOS A ENVIAR A UN TEMA
	$to = "/topics/fcm";
	$data =array(
		'title'=>'Mensaje',
		'body'=>'tienes un nuevo mensaje',		
	);

print_r(enviar($to, $data));
?>