@extends('layouts.email')


@section('style')

@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h2>New Order</h2> 

                    <div>

                    @if ($products)
                    <br>
                    <h4>Products</h4>
						
                        <ul>
                        	@foreach ($products as $product)
		                        
                                    <li><?php echo $product->product_name .' x '.$product->quantity;?></li>
                                    
                            @endforeach
                        </ul>
						
						

					@endif
                    </div>
                    
					
					
                </div>
            </div>
        </div>
    </div>
@endsection
