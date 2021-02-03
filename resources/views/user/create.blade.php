<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="javascript:;" method="post">
        @csrf
        <input type="text" name="name" id="name">
        <input type="password" name="passwd" id="passwd">
        <input type="submit" value="Add User" id="addUser">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $("#addUser").click(function() {
            var name = $('#name').val();
            var password = $('#passwd').val();
            $.ajax({
                url: '/user',
                method: 'POST',
                data: {
                    name: name,
                    password: password,
                },
                success: function(res) {
                    alert(res);
                }
            })
        });
    </script>
</body>

</html>