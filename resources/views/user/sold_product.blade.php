@extends('user.layouts.app')
@section('content')

<div class="container">
    <h3 class="text-center">List of Sold Products</h3>
    <div class="row">
        <table class="table table-bordered bg-info text-white">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Jwellery Type</th>
                    <th>Product Name</th>
                    <th>Net Weight(in gm)</th>
                    <th>Gross Weight (in gm)</th>
                    <th>Stone Weight (in gm)</th>
                    <th>Price (in Rs)</th>
                </tr>
            </thead>
            <tbody>
                @if(count($soldProduct) > 0)
                    @foreach($soldProduct as $soldProd)
                        <tr>
                            <td>{{ substr($soldProd->created_at,0,10) }}</td>
                            <td>{{ $soldProd->jwelleryType->jwellery_type_name }}</td>
                            <td>{{ $soldProd->product->product_name }}</td>
                            <td>{{ $soldProd->net_wt }}</td>
                            <td>{{ $soldProd->gross_wt }}</td>
                            <td>{{ $soldProd->stone_wt }}</td>
                            <td>{{ $soldProd->price }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center text-danger">No Products Sold Yet</td>
                    </tr>
                @endif
            </tbody>
        </table>

        {{ $soldProduct->links()}}
    </div>
</div>

@endsection