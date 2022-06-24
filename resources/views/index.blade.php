<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- end Bootstrap CSS -->

    <title>Todo List</title>
</head>

<body>
    <main>
        <section class="vh-100" style="background-color: #eee;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-7">
                        <div class="card rounded-3">
                            <div class="card-body p-4">

                                <h4 class="text-center my-3 pb-3">To Do App</h4>

                                <form action="/store" method="post"
                                    class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                    @csrf
                                    <div class="form-outline">
                                        <input type="text" name="title" class="form-control" />
                                    </div>
                                    <input type="submit" value="Create" class="btn btn-primary" />
                                </form>

                                <table class="table mb-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Todo item</th>
                                            <th scope="col">Status</th>
                                            <th scope="col ">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($todos as $todo)
                                        <tr>
                                            <th scope="row"> {{ $loop->index +1 }}</th>
                                            @if($todo->completed)
                                            <td style="text-decoration-line: line-through">{{ $todo->title }}</td>
                                            @else
                                            <td> {{$todo->title}}</td>
                                            @endif

                                            @if ($todo->completed)
                                            <td class="bg-success">Completed</td>
                                            @else
                                            <td class="bg-warning">In progress</td>
                                            @endif
                                            <td>
                                                {{-- <a href="{{asset('/' . $todo->id . '/edit')}}">Edit</a> --}}
                                                <button type="submit" class="btn btn-info">Edit</button>
                                                <a href="{{asset('/' . $todo->id . '/delete')}}"> <button type="submit"
                                                        class="btn btn-danger">Delete</button></a>

                                                <a href="{{asset('/' . $todo->id . '/completed')}}"> <button
                                                        type="submit" class="btn btn-success ms-1">Finished</button></a>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- script --}}

        {{-- js bootstrap --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        {{-- end js bootstrap --}}

        {{-- end script --}}
    </main>

</body>

</html>