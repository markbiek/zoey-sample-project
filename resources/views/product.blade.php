@extends('layouts.app')

@section('content')
@if (!$impersonating->hasProductACL($product))
	<p>This user does not have access to this product.</p>
@else
	<h2>{{ $product->name }}</h2>

	<p>{{ $product->sku }}</p>
	<p>{{ $product->price }}</p>
@endif
@endsection