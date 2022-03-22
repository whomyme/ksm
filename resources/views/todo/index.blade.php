<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $name }}'s Todos</h1>
                <a href="todos/create" class="btn btn-outline-primary">Create New</a>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($todos as $todo)
                                    <tr>
                                        <td>{{ $todo->name }}</td>
                                        <td>{{ $todo->status }}</td>
                                        <td><button class="btn btn-primary">Done</button></td>
                                    </tr>
                                @endforeach --}}
                                @forelse ($todos as $key => $todo)
                                    <tr>
                                        <td>{{ $todos->firstItem() + $key }}</td>
                                        <td>{{ $todo->name }}</td>
                                        <td>{{ $todo->status }}</td>
                                        <td><button class="btn btn-primary">Done</button>
                                            <form action="todos/{{ $todo->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data Yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $todos->links() }}
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="row text-white">
                        <div class="col bg-primary">Ini Col 4</div>
                        <div class="col bg-success">Ini Col 4</div>
                        <div class="col bg-warning">Ini Col 4</div>
                        <div class="col bg-danger">Ini Col 4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
