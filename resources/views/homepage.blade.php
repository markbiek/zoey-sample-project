@extends('layouts.app')

@section('content')
<p>Click on an account to impersonate it</p>

<ul>
@foreach ($accounts as $account)
	<li>
		<a href="/?impersonate={{ $account->id }}">{{ $account->name }}</a>
		{{ $account->is_admin ? '(admin)' : ''}}
		{{ $account->overdue ? '(overdue)' : ''}}
	</li>
@endforeach
</ul>

@if (!empty($impersonating))
	<h2>Currently impersonating {{ $impersonating->name }}</h2>

	@if ($impersonating->overdue)
		<p>This account is currently <em>overdue</em>!</p>
	@endif

	<h2>Checkout</h2>
	<p>Go to <a href="/checkout?impersonate={{ $impersonating->id }}">checkout</a></p>

	<h2>Product Lists</h2>
	@foreach ($productLists as $list)
		<h3>{{ $list->name }}</h3>

		@if (!$impersonating->checkACL('product_list_id', $list->id))
			<p>This user does not have access to this product list.</p>
		@endif

		<ul>
			@foreach ($list->products as $product)
				<li>
					<a href="/product?id={{ $product->id }}&impersonate={{ $impersonating->id }}">
						{{ $product->name }}
					</a>
				</li>
			@endforeach
		</ul>
	@endforeach
@endif
@endsection