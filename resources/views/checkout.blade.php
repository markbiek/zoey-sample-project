@extends('layouts.app')

@section('content')
<h2>Checkout</h2>

@if ($impersonating->overdue)
	<p>This account is currently <em>overdue</em> and cannot access the checkout!</p>
@else
	<p>This account is current and able to checkout!</p>
@endif
@endsection('content')