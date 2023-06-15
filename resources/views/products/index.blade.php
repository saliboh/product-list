<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
<div class="container">
    <h1>Product List</h1>
    <div class="form-group">
        <input type="text" class="form-control" id="search-input" placeholder="Search" />
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody id="product-list">
            @include('products.product_list')
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var searchTimer; // Timer variable

        $('#search-input').on('keyup', function() {
            clearTimeout(searchTimer); // Clear previous timer

            var searchQuery = $(this).val();

            searchTimer = setTimeout(function() {
                $.ajax({
                    url: '{{ route("products.index") }}',
                    type: 'GET',
                    data: {
                        search: searchQuery
                    },
                    success: function(response) {
                        $('#product-list').html(response);
                    }
                });
            }, 500); // Delay of 500 milliseconds
        });
    });
</script>
</body>

</html>