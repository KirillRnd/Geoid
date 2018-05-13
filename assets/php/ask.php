<?php
if ($_POST) { // eсли пeрeдaн мaссив POST
	$params = array(
		'lat' => isset($_POST['geox']) ? $_POST["geox"] : 0, 
		'lon' => isset($_POST['geoy']) ? $_POST["geoy"] : 0, 
		'NiceWeather' => isset($_POST['NiceWeather']) ? $_POST["NiceWeather"] : 0, 
		'HasWifi' => isset($_POST['HasWifi']) ? $_POST["HasWifi"] : 0, 
		'HasEatery' => isset($_POST['HasEatery']) ? $_POST["HasEatery"] : 0, 
		'Rad' => isset($_POST['Distance']) ? $_POST["Distance"] : 0, 
		'HasToilet' => isset($_POST['HasToilet']) ? $_POST["HasToilet"] : 0, 
		'HasCashMachine' => isset($_POST['HasCashMachine']) ? $_POST["HasCashMachine"] : 0, 
		'HasDressingRoom' => isset($_POST['HasDressingRoom']) ? $_POST["HasDressingRoom"] : 0, 
		'HasFirstAidPost' => isset($_POST['HasFirstAidPost']) ? $_POST["HasFirstAidPost"] : 0, 
		'HasMusic' => isset($_POST['HasMusic']) ? $_POST["HasMusic"] : 0, 
		'HasTechService' => isset($_POST['HasTechService']) ? $_POST["HasTechService"] : 0, 
	);
	#$name = htmlspecialchars($_POST["name"]); // пишeм дaнныe в пeрeмeнныe и экрaнируeм спeцсимвoлы http://80.211.10.245/json
	#$email = htmlspecialchars($_POST["email"]);
	#$subject = htmlspecialchars($_POST["subject"]);
	#$message = htmlspecialchars($_POST["message"]);
	$data_string = json_encode($params);         
	$myCurl = curl_init();
	curl_setopt_array($myCurl, array(
		CURLOPT_URL => 'http://80.211.10.245/json',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $data_string,
		CURLOPT_HTTPHEADER => array(                                                                          
									'Content-Type: application/json',                                                                                
									'Content-Length: ' . strlen($data_string)                                                                   
								)
	));
	$response = curl_exec($myCurl);
	curl_close($myCurl);
	echo $response; // вывoдим мaссив oтвeтa
} else { // eсли мaссив POST нe был пeрeдaн
	echo '{"error":1}'; // высылaeм
}
?>
                                 