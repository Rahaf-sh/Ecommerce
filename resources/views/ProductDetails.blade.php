@extends("layouts.app")
@section('content')
<div>
  <product-details product-data="{{ $product }}"></product-details>
</div>
@endsection