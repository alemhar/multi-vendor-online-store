@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3>Product Page</h3> 
                            </div>
                            <div class="col-6">
                                <button type="submit" @click="saveInfo" class="btn btn-primary float-right"><i class="fas fa-shopping-cart"></i></button>
                                <button type="submit" @click="loadInfo" style="margin-right: 10px;" class="btn btn-outline-primary float-right">Contact Seller</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form">
                        @foreach ($products as $product)
                    
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="card">
                                        @if ($product->product_photo)
                                        
                                            <img class="card-img-top img-fluid" src="{{ asset('img/products/'. $product->product_photo)}}" alt="Card image cap">

                                            <!-- img src="{{ asset('path/to/asset.png') }}" -->
                                        @else
                                            <img  class="card-img-top img-fluid" src="{{ asset('img/products/226x180.svg') }}"  alt="Card image cap">
                                        @endif

                                        
                                        
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->product_name }}</h5>
                                            
                                        </div>
                                        <div class="card-footer">
                                            <a type="button" class="btn btn-outline-dark" href="#"><i class="fas fa-eye"></i></a>
                                            <a type="button" class="btn btn-outline-dark" href="#"><i class="fas fa-cash-register"></i></a>
                                            <a type="button" class="btn btn-outline-dark" href="#"><i class="fas fa-cart-plus"></i></a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="col-md-8">
                                        <p class="card-text">{{ $product->product_description }}</p>
                                    
                                </div>
                            </div>

                            
                        @endforeach    


                            <!-- div class="form-row profile-photo-container">
                                <input type="file" @change="profilePhotoChange" ref="file" style="display: none">
                                <img class="profile-photo" id="profile-photo" :src="store_logo" alt="" style="height: 300px;">
                                <div class="profile-middle">
                                    <div class="profile-update-text" @click="$refs.file.click()">Update</div>
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" @click="saveInfo" class="btn btn-primary float-right">Save</button>
                                    <button type="submit" @click="loadInfo" class="btn btn-default float-right">Cancel</button>
                                
                                </div>
                            </div -->
                        </div> <!-- form -->
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
