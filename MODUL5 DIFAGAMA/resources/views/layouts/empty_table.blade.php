<p>There is no data...</p>
<a href="{{ (request()->is('history')) ? route('order_prod') : route('prod_add') }}" class="btn btn-secondary">{{ (request()->is('history')) ? 'Order Now' : 'Add Product' }}</a>