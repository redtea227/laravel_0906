<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="./myJs.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="text-center">
        <h3>新增資料</h3>
    </div>

    <div class="text-center">
        <a href="{{ route('students.index') }}">回首頁</a>
    </div>
    <br>
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <table class="table table-bordered table-border table-hover w-75 mx-auto text-center">
            <tr class="table-info">
                <th>ID</th>
                <th>姓名</th>
                <th>國文</th>
                <th>英文</th>
                <th>數學</th>
                <th>電話</th>

            </tr>
            <tr>
                <td class="align-middle">id</td>
                <td><input type="text" name="name" class="text-center form-control"></td>
                <td><input type="text" name="chinese" class="text-center form-control"></td>
                <td><input type="text" name="english" class="text-center form-control"></td>
                <td><input type="text" name="math" class="text-center form-control"></td>
                <td><input type="text" name="phone" class="text-center form-control"></td>
            </tr>

        </table>
        <div class="text-center mt-3">
            <input type="submit" value="submit" name="submit" class="btn btn-success">
        </div>
    </form>

</body>

</html>
