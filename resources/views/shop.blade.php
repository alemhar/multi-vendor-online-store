@extends('layouts.guest')

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
                                <nav class="nav">
                                    <h2 class="nav__header">Products</h2>
                                    <div class="nav__cart">
                                    <button @click="showCart = !showCart">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                    <span class="total-quantity">totalQuantity</span>
                                    <div v-if="showCart" class="cart-dropdown">
                                        <ul class="cart-dropdown__list">
                                        <li
                                            v-for="product in cart"
                                            :key="product.id"
                                        >
                                            product.name product.quantity
                                        </li>
                                        </ul>
                                    </div>
                                    </div>
                                </nav>


                                <!-- button type="submit" @click="loadInfo" style="margin-right: 10px;" class="btn btn-outline-primary float-right">Contact Seller</button -->
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
<style>
.nav {
  align-items: center;
  background: salmon;
  color: white;
  display: flex;
  justify-content: space-between;
  padding: 2rem;
  
  &__header {
    font-size: 2.5rem;
  }
  
  &__cart {
    position: relative;
    
    button {
      background: none;
      border: 0;
      color: white;
      cursor: pointer;
    }
    
    i {
      font-size: 2rem;
    }
    
    .total-quantity {
      align-items: center;
      background: lightblue;
      border-radius: 50%;
      display: flex;
      font-weight: bold;
      height: 2rem;
      justify-content: center;
      padding: 0.5rem;
      position: absolute;
      right: -10px;
      top: -10px;
      width: 2rem;
    }
    
    .cart-dropdown {
      background: white;
      border: 1px solid lightgray;
      border-radius: 10px;
      box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
      color: #333;
      font-size: 1.3rem;
      overflow: auto;
      padding: 0 1rem;
      position: absolute;
      right: 0;
      width: 12rem;
      
      .cart-dropdown__list {
        list-style: none;
        
        li {
          margin: 1rem 0;
        }
      }
    }
  }
}

.products {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  
  .product {
    border: 1px solid lightgray;
    border-radius: 10px;
    margin: 2rem;
    padding: 1rem;
    
    &__header {
      font-size: 2rem;
      text-align: center;
    }
    
    &__image {
      display: block;
      margin: 1rem auto;
    }
    
    &__description {
      font-size: 1.3rem;
      margin-top: 1rem;
    }
  }
}

.cart {
  margin-top: 2rem;
  text-align: center;
  
  &__button {
    background: lightblue;
    border: 0;
    color: white;
    cursor: pointer;
    font-size: 1.5rem;
    font-weight: bold;
    height: 2.5rem;
    width: 2.5rem;
  }
  
  &__quantity {
    font-size: 1.5rem;
    margin: 0 1rem;
  }
}
</style>    
<script>
const app = new Vue({
  el: '#app',
  
  // https://vuejs.org/v2/guide/instance.html#Data-and-Methods
  data() {
    return {
      products: [
        {
          id: 1,
          name: 'Product 1',
          description: 'This is an incredibly awesome product',
          quantity: 0,
        },
        {
          id: 2,
          name: 'Product 2',
          description: 'This is an incredibly awesome product',
          quantity: 0,
        },
        {
          id: 3,
          name: 'Product 3',
          description: 'This is an incredibly awesome product',
          quantity: 0,
        }
      ],
      showCart: false
    };
  },
  
  // https://vuejs.org/v2/guide/computed.html
  computed: {
    cart() {
      return this.products.filter(product => product.quantity > 0);
    },
    totalQuantity() {
      return this.products.reduce(
        (total, product) => total + product.quantity,
        0
      );
    }
  },
    
    // https://vuejs.org/v2/guide/events.html#Methods-in-Inline-Handlers
    methods: {
      updateCart(product, updateType) {      
        for (let i = 0; i < this.products.length; i++) {
          if (this.products[i].id === product.id) {
            if (updateType === 'subtract') {
              if (this.products[i].quantity !== 0) {
                this.products[i].quantity--;
              }
            } else {
              this.products[i].quantity++;
            }
            
            break;
          }
        }
      }
    }
  });
</script>    
@endsection
