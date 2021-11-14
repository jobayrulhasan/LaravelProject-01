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
                <h3 style="color: green;" class="my-3">Chef details add here</h3>
                <div class="my-3">
                    <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""><strong>Name:</strong></label>
                            <input type="text" name="name" class="form-control" placeholder="Add name">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Speciality:</strong></label>
                            <input type="text" name="speciality" class="form-control" placeholder="Add speciality">
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Image:</strong></label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <input type="submit" value="Save" class="btn btn-success my-1">
                    </form>
                </div>

                <!-- for delete data from database -->
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Chef name</th>
                                <th>Speciality</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chefData as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->speciality}}</td>
                                <td>
                                    <img src="/chefimage/{{$item->image}}" style="width: 250px;height:200px" class="p-2 m-2">
                                </td>
                                <td>
                                    <a href="{{url('/editChef',$item->id)}}" class="btn btn-warning p-1 m-1">Edit</a>
                                    <a href="{{url('/deleteChef',$item->id)}}" onclick="return confirm('Are you sure to delete this data')" class="btn btn-danger p-1 m-1">Delete</a>
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