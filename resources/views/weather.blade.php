<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
        <div>
            Temp = <?php echo $weather->get_temp();?>
            City = <?php echo $weather->get_city();?>
            <form action="user">
                <button>Обратно</button>
            </form>
        </div>
</body>
</html>
