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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3>{{ store_name }}</h3> 
                                <p>Product Page</p>
                            </div>
                            <div class="col-6">
                                <!-- button type="submit" @click="saveInfo" class="btn btn-primary float-right"><i class="fas fa-shopping-cart"></i></button -->
                                <!-- button type="submit" @click="loadInfo" style="margin-right: 10px;" class="btn btn-outline-primary float-right">Contact Seller</button -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form">
                            <div class="row mb-3" v-for="product in products.data" :key="product.id">
                                <div class="col-md-4">
                                    <div class="card">
                                            <img class="card-img-top img-fluid" :src="product.product_photo ? '/img/products/'+product.product_photo : '/img/products/'+product_photo" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ product.product_name }}</h5>
                                        </div>
                                        <div class="card-footer">
                                            <a type="button" class="btn btn-outline-dark" href="#"><i class="fas fa-eye"></i></a>
                                            <a type="button" class="btn btn-outline-dark" href="#"><i class="fas fa-cash-register"></i></a>
                                            <a type="button" class="btn btn-outline-dark" href="#"><i class="fas fa-cart-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                        <p class="card-text">{{ product.product_description }}</p>
                                    
                                </div>
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

</style>

<script>
    export default {
        props: ['public_id','store_name'],
        data() {
            return {
                products:{},
                id: '',
                public_address: '',
                showProductForm: false,
                productEditMode: false,
                product_name: '',
                product_model_no: '',
                brand: '',
                product_price: '',
                user_id: '',
                product_description: '',
                product_photo: '226x180.svg',
                product_photo_base64: '',
                current_product_photo: '/img/products/226x180.svg'

            }
        },
        methods: {
            copyToClipboard(myInput){
                /* Get the text field */
                let copyText = document.getElementById(myInput);
                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /*For mobile devices*/
                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                //alert("Copied the text: " + copyText.value);
            },
            loadProducts(){
                axios.get("/public_list/"+this.public_id)
                .then((response)=>{

                    this.products = response.data;
                    //this.public_address = window.location.hostname + '/main/' + this.form.public_id;
                  
                  //console.log( this.form.user_logo ? this.form.user_logo : 'img/your_logo_here.png');
                    
                })
                .catch(()=>{
                    
                });
                //console.log(this.user_info);
            },
            profilePhotoChange(e){
                let file = e.target.files[0];
                let file_reader = new FileReader();


                let limit = 1024 * 1024 * 2;

                if(file['size'] > limit){
                    /*
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    })
                    */
                   alert('Picture Size Limit : 2MB or less.');
                    return false;
                }

                file_reader.onloadend = (file) =>   {
                    console.log('RESULT', file_reader.result)
                    this.user_logo_base64 = file_reader.result;
                    this.store_logo = file_reader.result;
                }

                file_reader.readAsDataURL(file);

            }
        },
        created() {
            //this.user_id = document.querySelector('meta[name="user-id"]').getAttribute('content');
            this.loadProducts();
            //$('[data-toggle="tooltip"]').tooltip();
            //console.log('Component created.');
            

        },    
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
