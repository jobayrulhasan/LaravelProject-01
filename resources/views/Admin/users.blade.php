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
    <div class="container-scroller my-3">
        <!-- Body link is here -->


        @include("Admin.navbar")
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        @if($data->userType=="0")
                        <td><a href="{{url('/deleteuser',$data->id)}}" onclick="return confirm('Are you sure to delete this data')" class="btn btn-danger">Delete</a></td>
                        @else
                        <td><a>Not Applicable</a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- js link is here -->
    @include("Admin.adminscript")
</body>

</html>