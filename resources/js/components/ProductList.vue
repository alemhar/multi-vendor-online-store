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
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <!-- td>id</td -->
                                    <!-- td>user_id</td -->
                                    <td>Name</td>
                                    <td>Model #</td>
                                    <td>Brand</td>
                                    <td>Price</td>
                                    <td>Description</td>
                                    <td>Option</td>
                                    
                                    <!-- td>Category </td -->
                                    <!-- td>in_stock</td -->
                                    <!-- td>created_at</td -->
                                    <!-- td>updated_at</td -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>
                                        <a href="#">Delete
                                        <i class="fa fa-close"></i>
                                        </a>
                                        <a href="#">Edit
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>
                                        <a href="#">Delete
                                        <i class="fa fa-close"></i>
                                        </a>
                                        <a href="#">Edit
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>
                                        <a href="#">Delete
                                        <i class="fa fa-close"></i>
                                        </a>
                                        <a href="#">Edit
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    

                                    </tr>
                                </tbody>
                            </table>
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
                form: new vform({
                    id:'',
                    store_name: '',
                    email: '',
                    first_name: '',
                    middle_name: '',
                    last_name: '',
                    user_address1: '',
                    user_address2: '',
                    user_city: '',
                    user_mobile: '',
                    user_tel: '',
                    public_id: '',
                    user_type: '',
                    user_logo: ''
                }),
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
            saveInfo(){

                //this.form.put('api/user/'+this.user_id)
                axios.put('api/user/'+this.user_id, { 
                    store_name: this.form.store_name,
                    first_name: this.form.first_name,
                    middle_name: this.form.middle_name,
                    last_name: this.form.last_name,
                    user_address1: this.form.user_address1,
                    user_address2: this.form.user_address2,
                    user_city: this.form.user_city,
                    user_mobile: this.form.user_mobile,
                    user_tel: this.form.user_tel,
                    public_id: this.form.public_id,
                    user_logo: this.form.user_logo,
                    user_logo_base64: this.user_logo_base64
                      
                })
                .then(() => {
                    /*
                    swal.fire(
                        'Updated!',
                        'Payee information has been updated.',
                        'success'
                    );
                    */

                    //this.$Progress.finish();
                    //VueListen.$emit('RefreshItemTable');
                    this.loadInfo();
                })
                .catch(() => {
                    //this.form.errors = response;
                    //this.$Progress.fail();
                });
            },
            loadInfo(){
                axios.get("api/user/"+this.user_id)
                .then((data)=>{
                  this.form = data.data;
                  this.public_address = window.location.hostname + '/main/' + this.form.public_id;
                  this.store_logo = this.form.user_logo ? 'img/logo/'+this.form.user_logo : 'img/your_logo_here.png';
                  
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
