<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Order Details</h1>
Customer Name:    <h3>{{$order->name}}</h3>
Customer email: <h3>{{$order->email}}</h3>
Customer phone: <h3>{{$order->phone}}</h3>
Customer address:   <h3>{{$order->address}}</h3>
Customer  Id:    <h3>{{$order->user_id}}</h3>
Customer Product Name:    <h3>{{$order->product_title}}</h3>
Customer Price: <h3>{{$order->price}}</h3>
Customer Quantity: <h3>{{$order->quantity}}</h3>
Customer payment: <h3>{{$order->payment_status}}</h3>
Customer Product Id:    <h3>{{$order->product_id}}</h3>
<br><br>
<img height="250" width="450" src="product/{{$order->image}}">
</body>
</html>
