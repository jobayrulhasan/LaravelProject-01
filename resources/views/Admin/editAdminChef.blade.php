<x-app-layout>
    <!-- This is for logout and profile -->
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- style link is here -->
    <base href="/public">
    @include("Admin.admincss")
</head>

<body>
    <div class="container-scroller">
        @include("Admin.navbar")
        <div>
            <div class="card-body">
                <h3 style="color: green;" class="my-3">Chef details add here</h3>
                <div class="my-3">
                    <form action="{{url('/updatechef',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""><strong>Name:</strong></label>
                            <input type="text" name="name" class="form-control" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Speciality:</strong></label>
                            <input type="text" name="speciality" class="form-control" value="{{$data->speciality}}">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Old image:</strong></label>
                            <img src="/chefimage/{{$data->image}}" style="width: 250px;height:200px" class="p-2 m-2">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>New image:</strong></label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <input type="submit" value="Update" class="btn btn-success my-1">
                    </form>
                </div>

                <!-- for delete data from database -->
            </div>
        </div>
        <!-- Body link is here -->
    </div>

    <!-- js link is here -->
    @include("Admin.adminscript")
</body>

</html>