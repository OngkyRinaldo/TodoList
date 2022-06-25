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

                                <h4 class="text-center my-3 pb-3">Edit your TODO </h4>

                                <form action="/update" method="post"
                                    class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                    @csrf
                                    @method('patch')
                                    <div class="form-outline">
                                        <input type="text" name="title" class="form-control" value="{{$todo->title}}" />
                                        <input style="display:none" type="number" name="id" value="{{$todo->id}}">
                                    </div>
                                    <input type="submit" value="Update" class="btn btn-primary"
                                        onclick="return confirm('Are you sure you edit this Todo???')" />
                                </form>
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