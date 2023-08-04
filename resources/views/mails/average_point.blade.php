<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Average point of students</title>
</head>
<body>
<h1>Announce student's GPA</h1>
<h3>Your GPA: {{ $student->average_point  }}</h3>
<h2>Since your GPA was below 5, you were forced to drop out</h2>
</body>
</html>
