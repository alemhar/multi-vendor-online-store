<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3>Account Info</h3> 
                            </div>
                            <div class="col-6">
                                <button type="submit" @click="saveInfo" class="btn btn-primary float-right">Save</button>
                                <button type="submit" @click="loadInfo" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form">
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputStoreName">Store Name</label>
                                    <input v-model="form.store_name"  type="text" name="store_name" class="form-control" id="inputStoreName" placeholder="Store Name">
                                    <!-- :class="
                                    { 'is-invalid': form.errors.has('store_name') }">
                                    <has-error :form="form" field="store_name"></has-error -->
                                </div>
                                <div class="form-group col-md-7">
                                    <label for="inputURLAddress">URL Address</label>
                                    <div class="input-group">
                                    <input v-model="public_address" type="text" name="public_address" class="form-control" id="inputURLAddress" readonly>
                                    <div class="input-group-append">
                                        <span @click="copyToClipboard('inputURLAddress')" class="input-group-text" data-toggle="tooltip"  data-placement="top"  title="Copy">Copy</span>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputName">Name</label>
                                    <input v-model="form.first_name" name="first_name" type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputMI">MI</label>
                                    <input v-model="form.middle_name" name="middle_name"  type="text" class="form-control" id="inputMI">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputSurname">Surname</label>
                                    <input v-model="form.last_name" name="last_name" type="text" class="form-control" id="inputSurname" placeholder="Surname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress1">Address</label>
                                <input v-model="form.user_address1" name="user_address1" type="text" class="form-control" id="inputAddress1" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-group">
                                <input v-model="form.user_address2" name="user_address2" type="text" class="form-control" id="inputAddress2" placeholder="1234 Main St">
                            </div>
                            <div class="form-row">
                                <!-- div class="form-group col-md-6">
                                <label for="inputBarangay">Barangay</label>
                                <input type="text" class="form-control" id="inputBarangay">
                                </div -->
                                <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input v-model="form.user_city" name="user_city" type="text" class="form-control" id="inputCity">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputMobile">Mobile #</label>
                                    <input v-model="form.user_mobile" name="user_mobile" type="text" class="form-control" id="inputMobile" placeholder="09123456789">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputLandline">Landline #</label>
                                    <input v-model="form.user_tel" name="user_tel" type="text" class="form-control" id="inputLandline" placeholder="(082) 123-4567">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail">Email</label>
                                    <input v-model="form.email" name="email" type="email" class="form-control" id="inputEmail" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="user_type">Account Type</label>
                                    <input v-model="form.user_type" name="user_type" type="text" class="form-control" id="user_type" readonly>
                                </div>

                                <!-- div class="form-group col-md-7">
                                    <label for="inputMobile">Public URL</label>
                                    <input v-model="form.public_id" name="public_id" id="public_id" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('public_id') }">
                                    <has-error :form="form" field="public_id"></has-error>
                                </div -->
                                 
                            </div>
                            <!-- div class="form-row">
                                <input type="file" ref="file" style="display: none">
                                <button @click="$refs.file.click()">Upload Photo</button>
                            </div -->
                            <div class="form-row">
                                <label for="user_type">Store Logo</label>
                            </div>
                            
                            <div class="form-row profile-photo-container">
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
                            </div>
                            </div> <!-- form -->
                        

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
  left: 16% !important;
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
                  //this.public_address = window.location.hostname + '/shop/' + this.form.public_id;
                  this.public_address = 'https://onlinestoreko.com/shop/' + this.form.public_id;
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
