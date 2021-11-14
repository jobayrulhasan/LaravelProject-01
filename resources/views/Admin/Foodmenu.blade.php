<x-app-layout>
    <!-- This is for logout and profile -->
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- style link is here -->
    @include("Admin.admincss")
</head>

<body>
    <div class="container-scroller">
        @include("Admin.navbar")
        <div>
            <div class="card-body">
                <h3 style="color: green;" class="my-3">Add your food to menu</h3>
                <div class="my-3">
                    <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""><strong>Title:</strong></label>
                            <input type="text" name="title" class="form-control" placeholder="Add a title">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Price:</strong></label>
                            <input type="num" name="price" class="form-control" placeholder="Add price">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Image:</strong></label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Description:</strong></label>
                            <textarea name="description" class="form-control my-1" cols="30" rows="6" placeholder="Add description ..."></textarea>
                        </div>
                        <input type="submit" value="Save" class="btn btn-success my-1">
                    </form>
                </div>

                <!-- for delete data from database -->
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Food name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <img src="/foodImage/{{$item->image}}" style="width: 250px;height:200px" class="p-2 m-2">
                                </td>
                                <td>
                                    <a href="{{url('/editmenu',$item->id)}}" class="btn btn-danger p-1 m-1">Edit</a>
                                    <a href="{{url('/deletemenu',$item->id)}}" onclick="return confirm('Are you sure to delete this data')" class="btn btn-warning p-1 m-1">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Body link is here -->
    </div>

    <!-- js link is here -->
    @include("Admin.adminscript")
</body>

</html>