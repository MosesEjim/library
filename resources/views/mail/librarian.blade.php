<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>-----Hello-------------------</p>
    <p>The book, {{$book->title}} is Overdue for return. Contact the reader with the details below</p>
    <p>Borrower's name {{$book->borrower->username}}</p>
    <p>Borrower's email {{$book->borrower->email}}</p>
</body>
</html>