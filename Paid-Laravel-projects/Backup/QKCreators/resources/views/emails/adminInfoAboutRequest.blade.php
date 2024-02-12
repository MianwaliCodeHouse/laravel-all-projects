<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Inform About Client Request</title>
</head>
<body>
  <h1>New Request from {{ $mailData['name'] }}</h1>
  <p>You recieved a new Request</p>
  <p><big><b>Client Name: </b>         {{ $mailData['name'] }}    </big></p>
  <p><big><b>Request Title: </b>       {{ $mailData['requestTitle'] }}    </big></p>
  <p><big><b>Request Requirements: </b> {{ $mailData['requestRequirements'] }}   </big></p>
</body>
</html>