<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration Mail</title>
</head>
<body>
  <h1>Hi {{ $mailData['name'] }}</h1>
  <p>You account has been created sucessfully. 
    Please note the credentials:</p>
  <p>
    Email: {{ $mailData['email'] }}
    <br>
    Password: {{ $mailData['password'] }}</p>
  <br>
  <h3><a href="">Click here to login.</a></h3>
</body>
</html>