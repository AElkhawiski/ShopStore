<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
        }
        .center
        {
            width: 50%;
            text-align: center;
            margin: 30px auto auto;
            border:3px solid white;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.header')
    <div class="main-panel">
        <div class="content-wrapper">


            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>
                <form action="{{ url('/add_category') }}" method="post">
                    @csrf
                    <input class="input_color" type="text" name="category"  placeholder="Write a new category">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>
            <table class="center">
                <tr>
                    <td>category Name</td>
                    <td>Actions</td>
                </tr>
                @foreach($data as $data)
                    <tr>
                        <td>{{$data->category_name}}</td>
                        <td> <a onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a> </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
    <!-- container-scroller -->
    @include('admin.script')
    <!-- End custom js for this page -->

</body>
</html>
