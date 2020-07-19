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
                                <button type="submit" @click="addNew" class="btn btn-primary float-right">New <i class="fas fa-plus"></i></button>
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
                                            <a href="#">
                                            <i class="fas fa-trash-alt"></i>
                                            </a>
                                            |
                                            <a href="#">
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        </div> <!-- modal -->

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
        data() {
            return {
                products:{},
                public_address: ''
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

            }
        },
        created() {
            this.user_id = document.querySelector('meta[name="user-id"]').getAttribute('content');
            //this.loadInfo();
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
