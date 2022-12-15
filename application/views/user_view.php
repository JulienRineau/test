<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
</head>
<body>
<?php  

    foreach ($result as $object)
    {
        echo $object->username."<br>";
    }

    //echo $result;

?>

</body>
</html>



