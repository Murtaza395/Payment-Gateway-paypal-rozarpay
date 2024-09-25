<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Product:Tablet</h2>
    <h3>Price:200</h3>
    <form action="{{ route('razorpay') }}" method="post">
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY_ID') }}" data-amount="20000"
            data-buttontext="Pay with Razorpay"
            data-image="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/razorpay-icon.png"
            data-notes.customer_name="Murtaza Mughal" data-notes.customer_email="mughalmurtaza999@gmail.com"
            data-notes.product_name="Laptop" data-notes.quantity="1" data-prefill.name="Murtaza Mughal"></script>
    </form>
</body>
</html>