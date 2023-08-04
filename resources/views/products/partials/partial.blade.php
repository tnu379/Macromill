<thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <!-- Add other table headers for product details -->
    </tr>
</thead>
<tbody>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <!-- Add other table cells for product details -->
    </tr>
    @endforeach
</tbody>
