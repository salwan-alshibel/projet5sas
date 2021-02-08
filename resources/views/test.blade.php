<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Page test
    <?php $dbh = new PDO("mysql:host=localhost;port=3306;dbname=projet5sas", "root", "");

foreach($dbh->query('SELECT * from users') as $row) {
    print_r($row);
}?>
</body>
</html>