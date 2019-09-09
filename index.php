<?php
require_once "config.php";
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <div class="mt-4">
    <div class="card">
        <div class="card-header">
        虾刊登授权DEMO
        </div>
        <div class="card-body">
            <form method="get" action="<?php echo $server;?>/connect/authorize">
                <input type="hidden" name="client_id" value="<?php echo $clientId;?>">
                <input type="hidden" name="scope" value="<?php echo $scope;?>">
                <input type="hidden" name="response_type" value="<?php echo $responseType;?>">
                <input type="hidden" name="response_mode" value="form_post">
                <input type="hidden" name="redirect_uri" value="<?php echo $redirectUrl;?>">
                <input type="hidden" name="nonce" value="<?php echo time();?>">
                <input type="hidden" name="state" value="abc">

                <button type="submit" class="btn btn-primary">虾刊登授权</button>
            </form>
        </div>
    </div>
    </div>
</div>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>