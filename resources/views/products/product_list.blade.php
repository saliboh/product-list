@foreach($products as $product)
    @component('components.product_row', ['product' => $product])
    @endcomponent
@endforeach