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
</head>

<body>
    <div id="AddContactForm_box">
        <div id="AddContactForm_title">Добавить контакт</div>
        <hr />
        <form action="" method="post" name="form" id="form" enctype="multipart/form-data">
            <input type="text" name="name" id="name" placeholder="Имя" required value="<?php echo $_POST['name']; ?>" />
            <input type="phone" name="phone" id="phone" placeholder="Телефон" required value="<?php echo $_POST['phone']; ?>" />
            <input type="submit" id="submit" value="Добавить" name="submit" />
        </form>
    </div>
    <div id="ContactList_box">
        <div id="ContactList_title">Список контактов</div>
        <?php
        $getcurrent = mysqli_query($mysql, "SELECT * FROM `alterra` ORDER BY `id` DESC");
        while($r=mysqli_fetch_array($getcurrent)){
            extract($r);
            ?>
        <hr />
        <div id="ContactList_name">
            <?php echo $name?><a href='delete.php?id=<?php echo $id?>'> ˟</a>
        </div>
        <div id="ContactList_phone">
            <?php echo $phone?>
        </div>
        <?php }?>
    </div>
</body>

</html>