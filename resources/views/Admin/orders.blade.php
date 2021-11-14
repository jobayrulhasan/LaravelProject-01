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
    <!-- Body link is here -->
    <div class="container-scroller">
        @include("Admin.navbar")
        <div class="container">
            <h2 style="color: green;">Customers order details</h2>
            <!-- Search form -->
            <div>
                <form class="form-inline d-flex  md-form form-sm active-purple-2 mt-2" action="{{url('/search')}}" method="get">
                    @csrf
                    <input class="form-control form-control-sm mr-3 w-30" type="text" name="search" placeholder="Search" aria-label="Search">
                    <input type="submit" value="search" class="btn btn-success">
                </form>
            </div>
            <div class="my-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Foodname</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderData as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->foodname}}</td>
                            <td>{{$item->price}}৳</td>
                            <td>{{$item->quantity}}P</td>
                            <td>{{$item->price * $item->quantity}}৳</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- js link is here -->
    @include("Admin.adminscript")
</body>

</html>