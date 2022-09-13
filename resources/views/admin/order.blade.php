<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css')

<style type="text/css">
    .title_deg
    {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 40px;
    }
    .table_deg
    {
        border: 2px solid white;
        width: 100%;
        margin: auto;

        text-align: center;
    }
    .th_deg
    {
        background-color:skyblue;
    }
    .img_size
    {
        width: 200px;
        height: 100px;
    }
</style>



</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
@include('admin.header')

<div class="main-panel">
        <div class="content-wrapper">


            <h1 class="title_deg">ALL Orders</h1>

            <table class="table_deg">

                <tr class="th_deg">
                  <th style="Padding:10px;">Name</th>
                  <th style="Padding:10px;">Email</th>
                  <th style="Padding:10px;">Address</th>
                  <th style="Padding:10px;">Phone</th>
                  <th style="Padding:10px;">Product title</th>
                  <th style="Padding:10px;">Quantity</th>
                  <th style="Padding:10px;">Price</th>
                  <th style="Padding:10px;">Payment Status</th>
                  <th style="Padding:10px;">Delivery Status</th>
                  <th style="Padding:10px;">Image</th>
                  <th style="Padding:10px;">Delivered</th>
                  <th style="Padding:10px;">Print PDF</th>

                </tr>

                @foreach($order as $order)

                <tr>
                  <td>{{$order->name}}</td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->phone}}</td>
                  <td>{{$order->product_title}}</td>
                  <td>{{$order->quantity}}</td>
                  <td>{{$order->price}}</td>
                  <td>{{$order->payment_status}}</td>
                  <td>{{$order->delivery_status}}</td>
                  <td>
                    <img class="img_size" src="/product/{{$order->image}}">
                  </td>
                  <td>


                    @if($order->delivery_status=='Processing')
                    <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered !!!')" class="btn btn-primary">Delivered</a>
                    @else
                    <p style="color: green;">Delivered</p>
                    @endif

                  </td>
                    <td>
                        <a href="{{url('print_pdf',$order->id)}}"class="btn btn-secondary">Print PDF</a>
                    </td>

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
