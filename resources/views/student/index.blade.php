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
        <h3>學生資料</h3>
    </div>

    <div class="text-center">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{route('students.index')}}">回首頁</a>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ route('students.create') }}">單筆新增</a>

    </div>
    <br>

    <table class="table table-striped table-hover w-75 mx-auto text-center  align-middle">
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>國文</th>
            <th>英文</th>
            <th>數學</th>
            <th>電話</th>
            <th>修改/刪除</th>

        </tr>
        <?php foreach ($data as $key => $value) :?>
        <tr>
            <td class="align-middle"><?= $value['id'] ?></td>
            <td class="align-middle"><?= $value['name'] ?></td>
            <td class="align-middle"><?= $value['chinese'] ?></td>
            <td class="align-middle"><?= $value['english'] ?></td>
            <td class="align-middle"><?= $value['math'] ?></td>
            <td class="align-middle"><?= $value['phone']['phone'] ?></td>
            <td>
                {{-- <form action="{{ route('students.destroy', ['student' => $value['id']]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('students.edit', ['student' => $value['id']]) }}" class="btn btn-info btn-sm"
                        role="button">修改</a>
                    <input type="submit" value="刪除" name="submit" class="btn btn-danger btn-sm">
                </form> --}}

                <form action="{{ route('students.destroy', ['student' => $value['id']]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{ route('students.edit', ['student' => $value['id']]) }}" class="btn btn-info btn-sm"
                        role="button">修改</a>

                    <input type="submit" value="刪除" name="submit" class="btn btn-danger btn-sm">
                </form>

            </td>
        </tr>
        <?php endforeach;?>

    </table>

</body>

</html>
