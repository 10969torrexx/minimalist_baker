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
                        <input type="text" class="form-control" placeholder="productId" name="book_id" value="" id="finalProductId">
                        <input type="text" class="form-control" placeholder="quantity" name="quantity" id="finalQuantity">
                        <input type="text" class="form-control" placeholder="totalPrice" id="finalTotalPrice" name="totalPrice" id="finalQuantity">
                        <input type="text" class="form-control" placeholder="change" id="finalChange" name="change">

                        <p id="name"><strong>Name :</strong></p>
                        <p data-price="" id="price"><strong>Price</strong></p>
                        <p id="quantity"></p>
                        <p id="totalPrice"></p>
                        <p><strong>Set Quantity</strong></p>
                        <div class="container mt-5 d-flex justify-content-center">
                            <div class="d-flex flex-row">
                              <button class="btn btn-secondary" id="subtract-btn">
                                <span class="bi bi-dash"></span>
                              </button>
                              <span class="mx-3 fs-4 fw-bold" id="counter">0</span>
                              <button class="btn btn-primary" id="plus-btn">
                                <span class="bi bi-plus"></span>
                              </button>
                            </div>
                          </div>
                        <div class="form-group">
                            <label for=""><strong>Payment</strong></label>
                            <input type="number" class="form-control" name="payment" id="payment" required>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Change</strong></label>
                            <p id="change">₱ 0.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
