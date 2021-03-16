<?php
include("config.php");
if($_POST['submit']){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $insert = mysqli_query($mysql, "INSERT INTO `alterra` (`id`, `name`, `phone`)" . " VALUES (NULL, '$name', '$phone')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Контакты</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" media="all" />
    <script type="text/javascript" src="jquery.js"></script>
</head>

<body>
    <div id="create">
        <h2>Добавить контакт</h2>
        <hr />
        <form action="" method="post" name="form" id="form" enctype="multipart/form-data">
            <table cellspacing="1" cellpadding="4">
                <tr>
                    <td width="100">Имя:</td>
                    <td width="300"><input type="text" name="name" id="name" size="40" autocomplete="off" required value="<?php echo $_POST['name']; ?>" /></td>
                </tr>
                <tr>
                    <td width="100">Телефон:</td>
                    <td width="300"><input type="text" name="phone" id="phone" size="40" autocomplete="off" required value="<?php echo $_POST['phone']; ?>" /></td>
                </tr>
            </table>
            <br />
            <input type="submit" id="submit" value="Добавить" name="submit" />
        </form>
    </div>
    <div id="people">
        <h2>Список контактов</h2>
        <hr />
        <?php
        $getcurrent = mysqli_query($mysql, "SELECT * FROM `alterra` ORDER BY `id` DESC");
        while($r=mysqli_fetch_array($getcurrent)){
            extract($r);
            ?>
            <table id="list">
                <tr>
                    <td width="550" style="text-indent:40px;">
                        <?php echo $name?>
                        <br />
                        <?php echo $phone?>
                        <a href='delete.php?id=<?php echo $id?>'>*</a>
                    </td>
                </tr>
            </table>
        <?php }?>
        <hr />
    </div>
    <div class="error-box"></div>
</body>

</html>