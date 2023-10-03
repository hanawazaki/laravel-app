@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="col-md-8 w-100 px-5">
    <form method="POST" action="{{route('store')}}">
      @csrf
      <div class="form-group mb-3">
        <label for="carat">Karat</label>
        <input type="number" class="form-control" id="carat" name="carat">
      </div>
      <div class="form-group mb-3">
        <label for="gold_price">Harga Emas</label>
        <input type="number" class="form-control" id="gold_price" name="gold_price">
      </div>
      <div class="form-group mb-3">
        <label for="capital_price">Harga Modal</label>
        <input type="number" class="form-control" id="capital_price" name="capital_price">
      </div>
      <div class="form-group mb-3">
        <label for="selling_price">Harga Jual</label>
        <input type="number" class="form-control" id="selling_price" name="selling_price">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection