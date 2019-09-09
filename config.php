<?php
$server = "http://localhost:62114";

$authUrl = "{$server}/connect/authorize";

$authToken = "{$server}/connect/token";

$userInfoUrl = "{$server}/connect/userinfo";

$clientId = "demo";

$clientSecret = "def2edf7-5d42-4edc-a84a-30136c340e13";

$scope = "openid profile email phone";

$responseType = "code id_token";

$redirectUrl = "http://appdev.org:8080/callback.php";

$logoutRedirectUrl = "http://appdev.org:8080/signout.php";