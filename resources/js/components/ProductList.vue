<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3>Product List</h3> 
                            </div>
                            <div class="col-6">
                                <button type="submit" @click="newProduct" class="btn btn-primary float-right">New <i class="fas fa-plus"></i></button>
                                <!-- button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#ProductModal">New <i class="fas fa-plus"></i></button --> 
                                <!-- button type="submit" @click="loadInfo" class="btn btn-default float-right">Cancel</button -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table class="table table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                    <!-- td>id</td -->
                                    <!-- td>user_id</td -->
                                    <td>Name</td>
                                    <td>Model #</td>
                                    <td>Brand</td>
                                    <td>Price</td>
                                    <td>Option</td>
                                    <!-- td>Category </td -->
                                    <!-- td>in_stock</td -->
                                    <!-- td>created_at</td -->
                                    <!-- td>updated_at</td -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in products.data" :key="product.id">
                                        <td>{{product.product_name}}</td>
                                        <td>{{product.product_model_no}}</td>
                                        <td>{{product.brand}}</td>
                                        <td>{{product.product_price}}</td>
                                        <td>
                                            <a href="#" @click="deleteProduct(product.id)">
                                            <i class="fas fa-trash-alt"></i>
                                            </a>
                                            |
                                            <a href="#" @click="editProduct(product.id)">
                                            <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="card-footer">
                            <!-- pagination :data="products" @pagination-change-page="getResults"></pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Button trigger modal -->
        

        <!-- Modal -->
        <!-- div class="modal fade" id="ProductModal" tabindex="-1" role="dialog" aria-labelledby="ProductModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div --> <!-- modal -->

      <!-- Product Modal
      *
      *
      *
      *
      *
      *
      *
      *
      *
      *
      *
      *
      -->


      <div class="modal fade"   id="product-form" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!productEditMode" id="addNewLabel">Add Product</h5>
              <h5 class="modal-title" v-show="productEditMode" id="addNewLabel">Update Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- form onsubmit="return false;" -->
            <div class="modal-body">
              
              
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text inputGroup-sizing-default">Name</span>
                </div>
                
                
                <input v-model="product_name" type="text" name="product_name"
                  
                  class="form-control" aria-describedby="inputGroup-sizing-default" onfocus="this.select()">
                   
                <!-- has-error :form="form_item" field="product_name"></has-error -->
              </div>
              <div class="input-group mb-2">
                <!-- p v-show="no_item" class="empty-field-message">** Please enter product.</p -->
              </div>  

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text inputGroup-sizing-default">Model #</span>
                </div>

                <input v-model="product_model_no" type="text" name="product_model_no"
                  class="form-control" aria-describedby="inputGroup-sizing-default" onfocus="this.select()">
                  
                
              </div>
              <div class="input-group mb-2">
                <!-- p v-show="no_quantity" class="empty-field-message">** Please enter brand.</p --> 
              </div>  

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text inputGroup-sizing-default">Brand</span>
                </div>

                <input v-model="brand" type="text" name="brand"
                  class="form-control" aria-describedby="inputGroup-sizing-default" onfocus="this.select()">
                  
                
              </div>
              <div class="input-group mb-2">
                <!-- p v-show="no_quantity" class="empty-field-message">** Please enter brand.</p --> 
              </div>  

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text inputGroup-sizing-default">Price</span>
                </div>
                  <input v-model="product_price" name="product_price" id="product_price"
                  class="form-control" aria-describedby="inputGroup-sizing-default" onfocus="this.select()">
              </div>

              <div class="input-group mb-2">
                <!-- p v-show="no_price" class="empty-field-message">** Please enter price.</p --> 
              </div>  
              
                

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text inputGroup-sizing-default">Description</span>
                </div>
                  <textarea rows="3" v-model="product_description" name="product_description" id="product_description"
                  class="form-control" aria-describedby="inputGroup-sizing-default" onfocus="this.select()"></textarea >
              </div>

              <div class="input-group mb-2">
                <!-- p v-show="no_price" class="empty-field-message">** Please enter price.</p --> 
              </div>  


              <div class="form-row">
                  <label for="user_type">Product Photo</label>
              </div>
              
              <div class="form-row profile-photo-container">
                  <input type="file" @change="productPhotoChange" ref="file" style="display: none">
                  <img class="profile-photo" id="product-photo" :src="current_product_photo" alt="" style="height: 300px;">
                  <div class="profile-middle">
                      <div class="profile-update-text" @click="$refs.file.click()">Update</div>
                  
                  </div>
              </div>
              
              <!-- div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text inputGroup-sizing-default">Tax Type</span>
                </div>

              

                <select v-model="form_item.tax_type" @change="computeTaxChange" class="form-control col-12" aria-describedby="inputGroup-sizing-default">
                  <option value="VAT">VAT</option>
                  <option value="NON VAT">NON VAT</option>
                  <option value="VAT EXEMPT">VAT EXEMPT</option>
                  <option value="ZERO RATED">ZERO RATED</option>
                </select>
              </div -->


            </div>
            <div class="modal-footer">
              <button type="button" @click="cancelProduct" class="btn btn-danger">Cancel</button>
              <button type="button"  v-show="!productEditMode"  @click="saveProduct" class="btn btn-success">Save</button>
              <button type="button" v-show="productEditMode" @click="updateProduct()" class="btn btn-success">Update</button>
            </div>

            <!-- /form -->
          </div>
        </div>
      </div>
      <!-- Product Modal -->

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
  left: 40%;
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
                current_product_photo: 'img/products/226x180.svg'

            }
        },
        methods: {
            copyToClipboard(myInput){
                //let copyText = document.getElementById(myInput);
                //copyText.select();
                //copyText.setSelectionRange(0, 99999); /*For mobile devices*/
                //document.execCommand("copy");

            },
            loadProducts(){
                axios.get("api/product/")
                .then((response)=>{

                    this.products = response.data;
                    //this.public_address = window.location.hostname + '/main/' + this.form.public_id;
                  
                  //console.log( this.form.user_logo ? this.form.user_logo : 'img/your_logo_here.png');
                    
                })
                .catch(()=>{
                    
                });
                //console.log(this.user_info);
            },
            getResults(){

            },
            cancelProduct(){
                //this.showProductForm = true;
                $('#product-form').modal('hide');
                this.product_name = '';
                this.product_model_no = '';
                this.product_price = '';
                this.product_description = '';
                this.brand = '';
                this.product_photo = '226x180.svg';
            },
            saveProduct(){
                axios.post('api/product', {
                    user_id: this.user_id,
                    product_name: this.product_name,
                    product_model_no: this.product_model_no,
                    product_price: this.product_price,
                    product_photo: this.product_photo,
                    product_description: this.product_description,
                    brand: this.brand
                })
                .then((response)=>{

                    
                    this.loadProducts();
                    this.product_name = '';
                    this.product_model_no = '';
                    this.product_price = '';
                    this.product_description = '';
                    this.brand = '';

                 //console.log(response);
                    
                })
                .catch(()=>{
                    
                });

                this.showProductForm = false;
                $('#product-form').modal('hide');
            },
            updateProduct(){

                axios.put('api/product/'+ this.id, {
                    user_id: this.user_id,
                    product_name: this.product_name,
                    product_model_no: this.product_model_no,
                    product_price: this.product_price,
                    product_photo: this.product_photo,
                    product_description: this.product_description,
                    brand: this.brand,
                    product_photo_base64: this.product_photo_base64
                })
                .then((response)=>{

                    
                    this.loadProducts();
                    this.product_name = '';
                    this.product_model_no = '';
                    this.product_price = '';
                    this.product_description = '';
                    this.brand = '';

                 //console.log(response);
                    
                })
                .catch(()=>{
                    
                });

                this.showProductForm = false;
                $('#product-form').modal('hide');
            },

            newProduct(){
                this.showProductForm = true;
                this.productEditMode = false;
                this.product_photo = '226x180.svg';
                $('#product-form').modal('show');
            },
            editProduct(id){
                alert(id);
                axios.get("api/product/"+id)
                .then((response)=>{
                    //console.log(response);
                    this.product_name = response.data.product_name;
                    this.product_model_no = response.data.product_model_no;
                    this.product_price = response.data.product_price;
                    this.product_description = response.data.product_description;
                    this.brand = response.data.brand;
                    this.product_photo = response.data.product_photo;
                    this.id = response.data.id;
                    //this.current_product_photo = 'img/products/'+this.product_photo;
                    this.current_product_photo = this.product_photo  ? 'img/products/'+this.product_photo  : 'img/products/226x180.svg';
                    //console.log(this.current_product_photo);
                })
                .catch(()=>{
                    
                });
                this.showProductForm = true;
                this.productEditMode = true;

                $('#product-form').modal('show');
            },
            deleteProduct(id) {
                 axios.delete("api/product/"+id)
                .then((response)=>{
                    this.loadProducts();
                    
                })
                .catch(()=>{
                    
                });
            },
            productPhotoChange(e){
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
                    this.product_photo_base64 = file_reader.result;
                    this.current_product_photo = file_reader.result;
                }
                file_reader.readAsDataURL(file);
            }
        },
        created() {
            this.user_id = document.querySelector('meta[name="user-id"]').getAttribute('content');
            this.loadProducts();
            
            //$('[data-toggle="tooltip"]').tooltip();
            //console.log('Component created.');
            
            /* Scrollbar fix
               If you have a modal on your page that exceeds the browser height, then you can't scroll in it when closing an second modal. To fix this add: */
            $(document).on('hidden.bs.modal', '.modal', function () {
                $('.modal:visible').length && $(document.body).addClass('modal-open');
            });
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
