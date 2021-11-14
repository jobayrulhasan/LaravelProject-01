<x-app-layout>
    <!-- This is for logout and profile -->
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- style link is here -->
    @include("Admin.admincss")
</head>

<body>
    <div class="container-scroller">
        <!-- Body link is here -->
        @include("Admin.navbar")
        <div class="my-3">
            <h3 style="color: green;" class="my-3">Edit your food to menu</h3>
            <form action="{{url('/edit',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for=""><strong>Title:</strong></label>
                    <input type="text" name="title" class="form-control" value="{{$data->title}}">
                </div>
                <div class="form-group">
                    <label for=""><strong>Price:</strong></label>
                    <input type="num" name="price" class="form-control" value="{{$data->price}}">
                </div>
                <div class="form-group">
                    <label for=""><strong>Description:</strong></label>
                    <textarea name="description" class="form-control my-1" value="{{$data->description}}" cols="30" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <label for=""><strong>Old image:</strong></label>
                    <img src="/foodImage/{{$data->image}}" style="width: 250px;height:200px" class="p-2 m-2">
                </div>
                <div class="form-group">
                    <label for=""><strong> Add new image:</strong></label>
                    <input type="file" name="image" class="form-control">
                </div>
                <input type="submit" value="Update" class="btn btn-success my-1">
            </form>
        </div>
    </div>

    <!-- js link is here -->
    @include("Admin.adminscript")
</body>

</html>