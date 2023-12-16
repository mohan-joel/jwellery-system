@extends('user.layouts.app')
@section('content')


    <h4>Category: {{ $jwellery_type_name->jwellery_type_name  }}</h4>

            <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Net Wt</th>
                        <th>Gross Wt</th>
                        <th>Stone Wt</th>
                    </tr>
                </thead>
                <tbody>
                   @if(count($product) > 0)
                        @foreach($product as $prod)
                        <tr>
                            <td>{{ $a++ }}</td>
                            <td>{{ $prod->product->product_name }}</td>
                            <td>{{ $prod->net_wt }}</td>
                            <td>{{ $prod->gross_wt }}</td>
                            <td>{{ $prod->stone_wt }}</td>
                        </tr>
                        @endforeach
                   @else
                        <tr>
                            <td colspan="6" class="text-danger text-center">No Products of this Jwellery Type Found</td>
                        </tr>
                   @endif

                   <tr>
                        <th></th>
                        <th>Total</th>
                        <th>{{ $sum_netWt }}</th>
                        <th>{{ $sum_grossWt }}</th>
                        <th>{{ $sum_stoneWt }}</th>
                   </tr>
                </tbody>
            </table>



@endsection