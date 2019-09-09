<?php
require_once "config.php";
require_once "HttpClient.php";
?>
<pre>
<?php

var_dump($_REQUEST);

var_dump($_SERVER);


// 授权成功
if (isset($_REQUEST['code'])) {
    $_SESSION['id_token'] = $_REQUEST['id_token'];

    $client = new HttpClient();

    // 获取访问令牌
    $data = [
        'grant_type' => 'authorization_code',
        'code' => $_REQUEST['code'],
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'redirect_uri' => $redirectUrl
    ];

    var_dump($data);

    $dataStr = http_build_query($data);

    $response = $client->post($authToken, $dataStr, ['content_type', 'application/x-www-form-urlencoded']);
    var_dump($response);

    if ($response !== null) {
        $accessToken = $response->access_token;

        // 获取客户信息
        $header = [
            'Authorization' => "Bearer {$accessToken}"
        ];
        $rep = $client->get($userInfoUrl . '?schema=oicd', $header);
        var_dump($rep);
    }
}
