@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card shadow">
                <div class="card-header">Product Detail</div>

                <div class="card-body row justify-content-center">
                    <div class="col-6 col-sm-6 p-1">
                        <div class="row justify-content-center">
                            <img src="{{ $product->image }}" class="col-8" alt="">
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 p-1">
                        <form action="{{ route('confirmOrder') }}" method="post">
                            @csrf
                            <input type="text" hidden class="form-control" placeholder="productId" name="product_id" value="{{ $product->id }}" id="finalProductId">
                            <input type="text" hidden class="form-control" placeholder="quantity" name="quantity" id="finalQuantity">
                            <input type="text" hidden class="form-control" placeholder="totalPrice" id="finalTotalPrice" name="totalPrice" id="finalQuantity">
                            <input type="text" hidden class="form-control" placeholder="change" id="finalChange" name="change">

                            <p id="name"><strong>Name:</strong> {{ ucwords($product->name) }}</p>
                            <p data-price="{{ $product->price }}" id="price"><strong>Price</strong> ₱ {{ number_format($product->price, 2, '.', ',')  }}</p>
                            <p><strong>Set Quantity</strong></p>
                            <div class="container mt-5 d-flex justify-content-center">
                                <div class="d-flex flex-row">
                                <button class="btn btn-success" id="minusOne">
                                    <span class="bi bi-dash"></span>
                                </button>
                                <span class="mx-3 fs-4 fw-bold" id="quantity">0</span>
                                <button class="btn btn-success" id="addOne">
                                    <span class="bi bi-plus"></span>
                                </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Total Price: </strong></label>
                                <p id="totalPrice">₱ 0.00</p>
                            </div>
                            <p><strong> </strong></p>
                            <div class="form-group">
                                <label for=""><strong>Payment</strong></label>
                                <input type="number" class="form-control col-8" name="payment" id="payment" required>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Change</strong></label>
                                <p id="change">₱ 0.00</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Confirm Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var quantity = 0;
    var totalPrice = 0;
    updateSubmitButtonVisibility();

    $(document).on('click', '#addOne', function(e) {
        e.preventDefault();
        quantity += 1;
        $('#quantity').text(quantity);
        $('#finalQuantity').val(quantity);

        $('#finalTotalPrice').val(calculateTotalPrice());
        $('#totalPrice').text(calculateTotalPrice().toLocaleString('en-PH', {
            style: 'currency',
            currency: 'PHP'
        }));
    });

    $(document).on('click', '#minusOne', function(e) {
        e.preventDefault();
        quantity -= 1;
        
        $('#finalTotalPrice').val(calculateTotalPrice());
        $('#totalPrice').text(calculateTotalPrice().toLocaleString('en-PH', {
            style: 'currency',
            currency: 'PHP'
        }));

        if (quantity >= 0) {
            $('#quantity').text(quantity);
            $('#finalQuantity').val(quantity);
        } else {
            quantity = 0;
            $('#quantity').text(quantity);
            $('#finalQuantity').val(quantity);
        }
    });

    $(document).on('input', '#payment', function() {
        updateSubmitButtonVisibility();

        $('#change').text(calculateChange().toLocaleString('en-PH', {
            style: 'currency',
            currency: 'PHP' 
        }));

        $('#finalChange').val(calculateChange());
    });


    function updateSubmitButtonVisibility() {
        var paymentAmount = parseFloat($("#payment").val());

        if (!isNaN(paymentAmount) && paymentAmount > calculateTotalPrice()) {
            $("#submitButton").show();
        } else {
            $("#submitButton").hide();
        }
    }

    function calculateTotalPrice() {
        // return  (parseFloat($('#price').data('price')) * quantity) > 0 ? parseFloat($('#price').data('price')) * quantity : 0;
        return parseFloat($('#price').data('price')) * ((quantity > 0) ? quantity : 0);
    }

    function calculateChange() {
        return  (calculateTotalPrice() > parseFloat($('#payment').val())) ? 'Insufficient Payment!' : parseFloat($('#payment').val()) - calculateTotalPrice();
    }
</script>
@endsection
