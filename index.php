<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Secure Login</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      .container {
        height: 300px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #000;
        border-radius: 10px;
        padding: 5px;
      }
    </style>
</head>
<body>
<div class='m-2'>
<div class='container'>
<h2 class='text-center mt-2'>Admin Login</h2>
<?php include 'config.php' ?>
<?php include 'check.php'; ?>
<p class='text-center mt-4'><?php echo $status; ?></p>
<form action='' method='POST'>
  <input class='form-control mt-3' type='text' name='username'/>
  <input class='form-control mt-2' type='password' name='password'/>
  <input class='form-control mt-3 btn btn-outline-info' type='submit' name='login' value='Login'/>
</form>
</div>
</div>
</body>
</html>