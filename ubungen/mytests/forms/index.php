<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?
            if(isset($_COOKIE['TestCookie'])) {
                    echo "Your cookie is".$_COOKIE['TestCookie'];
            }
            $value = 1234;
            setcookie("TestCookie", $value, time()+3600, "/~rasmus/", "example.com", 1);
        ?>
        <form class="" action="index.php" method="post">
                <input type="text" name="test" value="nicht">
        </form>


    </body>
</html>
