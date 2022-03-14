
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do</title>
</head>
<body>
<?php
// SEND SMS
$curl = curl_init();

curl_setopt_array($curl, [
   CURLOPT_URL => 'https://sms.arkesel.com/api/v2/sms/send',
    CURLOPT_HTTPHEADER => ['api-key:aG1veXpRVXRUb0hhSFJ2ZkRJck8'],
     CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_POSTFIELDS => http_build_query([
        'sender' => 'Oguaa Hall',
        'message' => 'Key status:turned in by Nhana Qwahame',
        'recipients' => ['233543787887']
    ]),
]);

$response = curl_exec($curl);

curl_close($curl);
echo $response;





?>
</body>
</html>


