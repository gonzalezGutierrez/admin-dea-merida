<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Reporte de ventas</h2>

        <div class="d-flex justify-content-end mb-4">
        </div>

        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Name</th>
                    <th scope="col">marca</th>
                    <th scope="col">quantity</th>
                    <th scope="col">total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data ?? '' as $item)
                <tr>
                    <td scope="row">{{ $item->name }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->quantity * $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>