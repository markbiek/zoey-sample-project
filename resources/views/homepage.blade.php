@extends('layouts.app')

@section('content')

<div class="container mx-auto">
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
</div>

@if (!empty($impersonating))
	<div class="container mx-auto">
		<h2>Currently impersonating <span class="underline">{{ $impersonating->name }}</span></h2>

		@if ($impersonating->overdue)
			<p class="font-bold text-italic text-md">This account is overdue!</p>
		@endif
	</div>

	<div class="container mx-auto">
		<h2>Checkout</h2>
		<p>Go to <a href="/checkout?impersonate={{ $impersonating->id }}">checkout</a></p>
	</div>

	<div class="container mx-auto">
		<h2>Product Lists</h2>
		@foreach ($productLists as $list)
			<h3>{{ $list->name }}</h3>

			@if (!$impersonating->checkACL('product_list_id', $list->id))
				<p class="font-bold text-italic text-sm">This user does not have access to this product list.</p>
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
	</div>
@endif
@endsection