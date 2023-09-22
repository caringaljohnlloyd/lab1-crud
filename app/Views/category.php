<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
    <table>
        <tr>
            <?php foreach($cat as $pro): ?>
                <li> <a href ="/main<?= $pro['ID'] ?>"><?=$pro['ProductCategory']?></a></li>
        </tr>
        <?php endforeach;?>
    </table>
    <button> <a href="insertCategory/">INSERT</a></button>
</body>

</html>