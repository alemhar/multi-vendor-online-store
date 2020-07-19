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
                                <!--button type="submit" @click="saveInfo" class="btn btn-primary float-right">Save</button>
                                <button type="submit" @click="loadInfo" class="btn btn-default float-right">Cancel</button -->
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
                                    <tr v-for="product in products" :key="product.id">
                                        <td>{{product.name}}</td>
                                        <td>{{product.Model}}</td>
                                        <td>{{product.Brand}}</td>
                                        <td>{{product.Price}}</td>
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
                                    <!-- tr>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
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
                                    <tr>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@mdo</td>
                                    <td>
                                        <a href="#">
                                        <i class="fas fa-trash-alt"></i>
                                        </a>
                                        |
                                        <a href="#">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    

                                    </tr -->
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="card-footer">
                            <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
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
        data() {
            return {
                products:{},
                user_info: {},
                user_id:'',
                public_address: '',
                store_logo: '',
                user_logo_base64: ''
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
                axios.get("api/product/")
                .then((data)=>{
                    
                  this.products = data;
                  this.public_address = window.location.hostname + '/main/' + this.form.public_id;
                  
                  //console.log( this.form.user_logo ? this.form.user_logo : 'img/your_logo_here.png');

                })
                .catch(()=>{
                    
                });
                //console.log(this.user_info);
            }
        },
        created() {
            this.user_id = document.querySelector('meta[name="user-id"]').getAttribute('content');
            this.loadInfo();
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
