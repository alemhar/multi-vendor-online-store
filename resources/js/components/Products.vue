<template>
    <div>
    <!-- nav class="navbar navbar-expand-sm navbar-dark bg-info mb-2">
        <div class="container">
        <a href="#" class="navbar-brand">Products</a>
        </div>
    </nav -->
    <div class="mt-3">
  
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #2980b9;color: black;">
                        <div class="row">
                            <div class="col-8" style="padding-left: 30px;">
                                    <div class="row">
                                      
                                            
                                      <div class="float-left">
                                        
                                        <img src="/img/osk_logo_sqr.png" alt="" class="img-fluid" style="height: 90px;padding: 2px;border: solid;border-color: aliceblue;background: white;border-radius: 15px 0px 0px 15px;">
                                      </div>
                                      <div class="float-left">
                                        
                                        <img :src="'/img/logo/'+this.seller.user_logo" alt="" class="img-fluid" style="height: 90px;padding: 2px;border: solid;border-color: aliceblue;    background: white;border-radius: 0px 15px 15px 0px;">
                                      </div>
                                    </div>
                                    <div class="row">
                                        <h4>{{ store_name }}</h4>
                                    </div>
                                    <div class="row">
                                        <p> 
                                        <span v-if="seller.user_tel">Tel: {{ this.seller.user_tel }}</span><br> 
                                        <span v-if="seller.user_mobile">Mobile: {{ this.seller.user_mobile }}</span><br> 
                                        <span v-if="seller.email">Email: {{ this.seller.email }}</span>
                                        </p> 
                                    </div>
                                    
                                
                            </div>
                            <div class="col-4">
                                <!-- button type="submit" @click="saveInfo" class="btn btn-primary float-right"><i class="fas fa-shopping-cart"></i></button -->
                                <!-- button type="submit" @click="loadInfo" style="margin-right: 10px;" class="btn btn-outline-primary float-right">Contact Seller</button -->
                                <nav class="nav">
                                    <div class="nav__cart">
                                        <button @click="showCart = !showCart">
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                        <span class="total-quantity" @click="showCart = !showCart">{{ totalQuantity }}</span>
                                        <div v-if="showCart && cart.length > 0" class="cart-dropdown">
                                            <ul class="cart-dropdown__list">
                                            <li
                                                v-for="product in cart"
                                                :key="product.id"
                                            >
                                                {{ product.product_name }} ({{ product.product_qty }}) <b><span @click="updateCart(product.product_id,product.product_name,product.product_model_no,product.product_price,'subtract')" class="btn btn-danger">-</span> <span  @click="updateCart(product.product_id,product.product_name,product.product_model_no,product.product_price)" class="btn btn-success">+</span></b>
                                            </li>
                                            </ul>
                                            <div class="row" style="justify-content: center;padding-bottom: 10px;"> Qty: {{ totalQuantity}} Total:&nbsp;<span>&#8369;</span>&nbsp;{{ totalAmount }} </div>
                                            <div class="row" style="justify-content: center;padding-bottom: 10px;">
                                                <input type="text" v-model="check_out_name" placeholder="Full Name" class="mb-2 check-out-info">
                                                <p class="text-danger" v-show="hasError && check_out_name.length == 0">Please enter name.</p>
                                                <input type="text" v-model="check_out_contact_no" placeholder="Contact Number" class="mb-2 check-out-info">
                                                <p class="text-danger" v-show="hasError && check_out_contact_no.length == 0">Please enter contact no.</p>
                                            </div>
                                            <div class="row" style="justify-content: center;padding-bottom: 10px;">
                                            <button type="button" class="btn btn-primary" style="color: #fff;background-color: #227dc7;border-color: #2176bd;" @click="checkOut">Check Out</button>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fab fa-facebook-square"></i>
                            <i class="fab fa-twitter-square"></i>
                            <i class="fab fa-instagram-square"></i>
                            <i class="fab fa-linkedin"></i>
                          
                        </div>
                    </div>
                    <div class="card-body" style="margin-top: 50px;">
                        <div class="form">
                            <div class="row mb-3 bg-default">
                                <div class="col-md-3 mb-5" v-for="product in products.data" :key="product.id">
                                    <div class="card">
                                            <img class="card-img-top img-fluid" :src="product.product_photo ? '/img/products/'+product.product_photo : '/img/products/'+product_photo" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ product.product_name }} <br><b><span>&#8369;</span>{{ product.product_price }}</b></h5>
                                        </div>
                                        <div class="card-footer" style="text-align: end;">
                                            <button type="button" class="btn btn-outline-dark">Photos<!-- i class="fas fa-eye"></i --></button>
                                            <!-- button type="button" class="btn btn-outline-dark">Buy<i class="fas fa-cash-register"></i></button -->
                                            <button type="button" class="btn btn-outline-dark" @click="updateCart(product.id,product.product_name,product.product_model_no,product.product_price)">Add to Cart<!-- i class="fas fa-cart-plus"></i --></button>
                                        </div>
                                        <div v-if="product.product_description" class="card-text product-description" style="">{{ product.product_description }}</div>
                                    </div>
                                </div>
                                <!-- div class="col-md-8" style="background-color: lightgray;">
                                        
                                </div -->
                            </div>

                            
                        </div> <!-- form -->
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
</template>
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted gray;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: gray;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

.profile-photo-container {
  position: relative;
  
}

.profile-photo {
  opacity: 1;
  display: block;
  transition: .5s ease;
  backface-visibility: hidden;
}

.profile-middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 40%;
  left: 16%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.profile-middle:hover {
  opacity: 0.7;
  
}

.profile-photo-container:hover .profile-photo {
  opacity: 0.3;
}

.profile-photo-container:hover .profile-photo {
  opacity: 1;
}

.profile-update-text {
    background-color: #cfcfcf;
    color: #000000;
    font-size: 14px;
    padding: 16px 32px;
    cursor: pointer;
}

.product-description{
    font-size: 1.2em;
    font-size: 1.4em;
    color: black;
    font-family: sans-serif;
}

.nav {
  /* -webkit-box-align: center; */
  /* align-items: center; */
  color: black;
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: justify;
  justify-content: space-between;
  padding: 1rem;
  float: right;
}
.nav__header {
  font-size: 2.5rem;
}
.nav__cart {
  position: relative;
}
.nav__cart button {
  background: none;
  border: 0;
  color: black;
  cursor: pointer;
}
.nav__cart i {
  font-size: 2rem;
}
.nav__cart .total-quantity {
  -webkit-box-align: center;
          align-items: center;
  background: lightblue;
  border-radius: 50%;
  display: -webkit-box;
  display: flex;
  font-weight: bold;
  height: 2rem;
  -webkit-box-pack: center;
          justify-content: center;
  padding: 0.5rem;
  position: absolute;
  right: -10px;
  top: -10px;
  width: 2rem;
}
.nav__cart .cart-dropdown {
  background: white;
  border: 1px solid lightgray;
  border-radius: 10px;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
  color: #333;
  font-size: 1.1rem;
  overflow: auto;
  padding: 0 1rem;
  position: absolute;
  right: 0;
  width: 300px;
  z-index: 99;
}
.nav__cart .cart-dropdown .cart-dropdown__list {
  list-style: none;
}
.nav__cart .cart-dropdown .cart-dropdown__list li {
  margin: 1rem 0;
}

.cart-dropdown__list {
    border: 1px solid lightgray;
    margin-top: 15px;
    border-radius: 10px;
    background: lightgray;
}

.check-out-info {
    border-radius: 5px;
    border: 1px solid lightgray;
    width: 80%;
}
.products {
  display: -webkit-box;
  display: flex;
  flex-wrap: wrap;
  -webkit-box-pack: center;
          justify-content: center;
}
.products .product {
  border: 1px solid lightgray;
  border-radius: 10px;
  margin: 2rem;
  padding: 1rem;
}
.products .product__header {
  font-size: 2rem;
  text-align: center;
}
.products .product__image {
  display: block;
  margin: 1rem auto;
}
.products .product__description {
  font-size: 1.3rem;
  margin-top: 1rem;
}

.cart {
  margin-top: 2rem;
  text-align: center;
}
.cart__button {
  background: lightblue;
  border: 0;
  color: white;
  cursor: pointer;
  font-size: 1.5rem;
  font-weight: bold;
  height: 2.5rem;
  width: 2.5rem;
}
.cart__quantity {
  font-size: 1.5rem;
  margin: 0 1rem;
}

.fab{
  font-size: 3em;
  padding: 4px 7px 0px 6px;
  color: white;
}
</style>

<script>
    export default {
        props: ['public_id','store_name'],
        data() {
            return {
                products:{},
                cart: [],
                check_out_name: '',
                check_out_contact_no: '',
                showCart: false,
                id: '',
                product_name: '',
                product_model_no: '',
                brand: '',
                product_price: '',
                user_id: '',
                product_description: '',
                product_photo: '226x180.svg',
                product_photo_base64: '',
                current_product_photo: '/img/products/226x180.svg',
                hasError: false,
                seller:{}


            }
        },
        methods: {
            loadProducts(){
                axios.get("/public_list/"+this.public_id)
                .then((response)=>{

                    this.products = response.data;
                    this.user_id = this.products.data[0].user_id;
                    this.getSellerInfo();
                    //this.public_address = window.location.hostname + '/main/' + this.form.public_id;
                  
                  //console.log( this.form.user_logo ? this.form.user_logo : 'img/your_logo_here.png');
                    
                })
                .catch(()=>{
                    
                });
                //console.log(this.user_info);
            },
            getSellerInfo(){
                axios.get("/seller/"+this.public_id)
                .then((response)=>{
                    this.seller = response.data;
                })
                .catch(()=>{
                    
                });
                //console.log(this.user_info);
            },
            updateCart(id,product_name,product_model_no,product_price,type = 'add'){
                    for (let i = 0; i < this.cart.length; i++) {
                        if (this.cart[i].product_id === id) {
                            if (type === 'subtract') {
                                if (this.cart[i].product_qty !== 0) {
                                    this.cart[i].product_qty--;
                                    if(this.cart[i].product_qty == 0){
                                      this.cart.splice(i, 1);
                                    }
                                } 
                            } else {
                                this.cart[i].product_qty++;
                            }
                            return;
                        }
                    }

                    this.cart.push({ user_id: this.user_id, product_id: id,product_name: product_name,product_model_no: product_model_no,product_price: product_price, product_qty: 1});
            },
            checkOut(){
                if(this.check_out_name.length == 0 || this.check_out_contact_no.length == 0){
                    this.hasError = true;
                    return;
                }

                
                axios.post("/checkout",
                    {
                        user_id: this.user_id,
                        customer_id: '',
                        customer_name: this.check_out_name,
                        customer_contact_no: this.check_out_contact_no,
                        products: this.cart,
                        total_qty: this.totalQuantity,
                        total: this.totalAmount
                    }
                ).then((response)=>{
                    this.check_out_name = '';
                    this.check_out_contact_no = '';
                    this.showCart = false;
                    this.cart = [];

                    swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Your order has been sent!',
                      showConfirmButton: false,
                      timer: 1500
                    })
                    
                    
                })
                .catch(()=>{
                    
                });
            }
            

        },
        created() {
            //this.user_id = document.querySelector('meta[name="user-id"]').getAttribute('content');
            this.loadProducts();
            //$('[data-toggle="tooltip"]').tooltip();
            //console.log('Component created.');
            

        },
        computed:{
            totalQuantity() {
                return this.cart.reduce(
                    (total, cart) => total + cart.product_qty,
                    0
                );
            },
            totalAmount() {
                return this.cart.reduce(
                    (total, cart) => total + (cart.product_qty*cart.product_price),
                    0
                );
            }
        }
        ,    
        mounted() {
            //console.log('Component mounted.');
        }
    }

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();

        $('[data-toggle="tooltip"]').on('click', function() {
            $('[data-toggle="tooltip"]').tooltip('hide');
            $(this).attr('data-original-title', 'Copied to Clipboard!');
            $('[data-toggle="tooltip"]').tooltip('show');
        });
        $('[data-toggle="tooltip"]').mouseout(function(){
            $(this).attr('data-original-title', 'Copy');
        });
    });

    
</script>
