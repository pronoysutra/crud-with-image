<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Bootstrap Table</title>
</head>

<body>
    <div class="container mt-5">
        <a href="{{ route('create') }}"><button class="btn btn-primary">Add New</button></a>
        <a href=""><button class="btn btn-primary">Go Back</button></a>
    </div>

    <div class="container mt-5">
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>

                @php
                $key = 1;
                @endphp

                @foreach($user as $data)
                <tr>
                    <td>{{$key++ }}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->address}}</td>
                    <td> <img src="{{ asset('uploads/students/'.$data->image) }}" width="70px" height="70px"
                            alt="Image"></td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->birth_date}}</td>
                    <td>{{$data->gender}}</td>


                    <td><a href="{{ route('edit',$data->id) }}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{ route('delete',$data->id) }}"><button class="btn btn-primary">delete</button></a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>