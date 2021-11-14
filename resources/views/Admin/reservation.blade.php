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
                        <th>Phone</th>
                        <th>No. of guest</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->guest}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->time}}</td>
                        <td>{{$item->message}}</td>
                        <td>
                            <a href="{{url('/reservationDelete',$item->id)}}" onclick="return confirm('Are you sure to delete this data')" class="btn btn-danger">Delete</a>
                        </td>
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