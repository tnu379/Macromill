<thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th></th>
        <!-- Add other table headers for product details -->
    </tr>
</thead>
<tbody>
    @foreach ($products as $product)
        <tr class='col-table'>
            <td>{{ $product->name }} <img class='img-table' src="{{ asset('image/avatar.png') }}" alt=""></td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td ><i onclick=showEdit(this) class="fas fa-plus"></i></td>
            <!-- Add other table cells for product details -->
        </tr>
    @endforeach
</tbody>
