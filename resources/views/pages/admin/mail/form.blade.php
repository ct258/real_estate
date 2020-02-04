<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{route('send_mail')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <section class="widget">
                    <div class="container-fluid">
                        <table class="table">
                            <tr>
                                <td><label>Họ và Tên</label><input type="text" name="Name"
                                        class="form-control input-transparent"><br></td>
                            </tr>
                            <tr>
                                <td><label>Địa chỉ email</label><input type="text" name="Email"
                                        class="form-control input-transparent"><br></td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Nhận mail</button>

                    </div>
                </section>
            </div>
    </form>

</body>

</html>