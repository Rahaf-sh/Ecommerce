@extends("layouts.app")
@section('content')
<div>
  <category-products category-data="{{ $products }}"></category-products>
</div>
@endsection