@extends('layouts.email')


@section('style')

@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h2>New Order</h2> 
                    <p>Name: {{ $customer['name'] }}</p>
                    <p>Contact: {{ $customer['contact'] }}</p>
                    <p>Quantity: {{ $customer['total_qty'] }}</p>
                    <p>Total: {{ $customer['total'] }}</p>
                    
                    <div>

                    @if ($products)
                    <br>
                    <h4>Products</h4>
						
                        <ul>
                        	@foreach ($products as $product)
		                        
                                    <li><?php echo $product['product_name'] .' - '.$product['total_qty'].' x '.$product['product_price'];?></li>
                                    
                            @endforeach
                        </ul>
						
						

					@endif
                    </div>
                    
					Thank you for using Online Store Ko. 
					
                </div>
            </div>
        </div>
    </div>
@endsection
