@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="col-md-8 w-100 px-5">
    <form method="POST" action="{{route('store')}}">
      @csrf
      <div class="form-group mb-3">
        <label for="carat">Karat</label>
        <input type="number" class="form-control" id="carat" name="carat">
        @error('carat')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="gold_price">Harga Emas</label>
        <input type="number" class="form-control" id="gold_price" name="gold_price">
        @error('gold_price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="capital_price">Harga Modal</label>
        <input type="number" class="form-control" id="capital_price" name="capital_price">
        @error('capital_price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="selling_price">Harga Jual</label>
        <input type="number" class="form-control" id="selling_price" name="selling_price">
        @error('selling_price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@endsection