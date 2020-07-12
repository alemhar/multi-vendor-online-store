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
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                        

                    </div>
                    
                    <div class="card-body">
                        <form @submit.prevent="saveInfo">
                            
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputStoreName">Store Name</label>
                                    <input v-model="form.store_name"  type="text" name="store_name" class="form-control" id="inputStoreName" placeholder="Store Name" :class="{ 'is-invalid': form.errors.has('username') }">
                                    <has-error :form="form" field="store_name"></has-error>
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
                                    <input v-model="form.first_name" name="first_name" type="text" class="form-control" id="inputName" placeholder="Name" :class="{ 'is-invalid': form.errors.has('first_name') }">
                                    <has-error :form="form" field="first_name"></has-error>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputMI">MI</label>
                                    <input v-model="form.middle_name" name="middle_name"  type="text" class="form-control" id="inputMI" placeholder="" :class="{ 'is-invalid': form.errors.has('middle_name') }">
                                    <has-error :form="form" field="middle_name"></has-error>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputSurname">Surname</label>
                                    <input v-model="form.last_name" name="last_name" type="text" class="form-control" id="inputSurname" placeholder="Surname" :class="{ 'is-invalid': form.errors.has('last_name') }">
                                    <has-error :form="form" field="last_name"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress1">Address</label>
                                <input v-model="form.user_address1" name="user_address1" type="text" class="form-control" id="inputAddress1" placeholder="Apartment, studio, or floor" :class="{ 'is-invalid': form.errors.has('user_address1') }">
                                    <has-error :form="form" field="user_address1"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.user_address2" name="user_address2" type="text" class="form-control" id="inputAddress2" placeholder="1234 Main St" :class="{ 'is-invalid': form.errors.has('user_address2') }">
                                    <has-error :form="form" field="user_address2"></has-error>
                            </div>
                            <div class="form-row">
                                <!-- div class="form-group col-md-6">
                                <label for="inputBarangay">Barangay</label>
                                <input type="text" class="form-control" id="inputBarangay">
                                </div -->
                                <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input v-model="form.user_city" name="user_city" type="text" class="form-control" id="inputCity" :class="{ 'is-invalid': form.errors.has('user_city') }">
                                    <has-error :form="form" field="user_city"></has-error>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputMobile">Mobile #</label>
                                    <input v-model="form.user_mobile" name="user_mobile" type="text" class="form-control" id="inputMobile" placeholder="09123456789" :class="{ 'is-invalid': form.errors.has('user_mobile') }">
                                    <has-error :form="form" field="user_mobile"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputLandline">Landline #</label>
                                    <input v-model="form.user_tel" name="user_tel" type="text" class="form-control" id="inputLandline" placeholder="(082) 123-4567" :class="{ 'is-invalid': form.errors.has('user_tel') }">
                                    <has-error :form="form" field="user_tel"></has-error>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail">Email</label>
                                    <input v-model="form.email" name="email" type="email" class="form-control" id="inputEmail" placeholder="juan.delacruz@email.com" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="user_type">Account Type</label>
                                    <input v-model="form.user_type" name="user_type" type="text" class="form-control" id="user_type" :class="{ 'is-invalid': form.errors.has('user_type') }" readonly>
                                    <has-error :form="form" field="user_type"></has-error>
                                </div>

                                <!-- div class="form-group col-md-7">
                                    <label for="inputMobile">Public URL</label>
                                    <input v-model="form.public_id" name="public_id" id="public_id" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('public_id') }">
                                    <has-error :form="form" field="public_id"></has-error>
                                </div -->
                                 
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary float-right">Save</button>

                                </div>
                            </div>
                            </form>
                        

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
</style>

<script>
    export default {
        data() {
            return {

                form: new Form({
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
                }),
                user_info: {},
                user_id:'',
                public_address: ''
                
                
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
                this.form.put('api/user/'+this.user_id)
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
                })
                .catch(() => {
                    //this.$Progress.fail();
                });
            },
            loadInfo(id){
                axios.get("api/user/"+this.user_id)
                .then((data)=>{
                  this.form = data.data;
                  this.public_address = window.location.hostname + '/main/' + this.form.public_id; 
                  console.log(this.form.public_id);
                })
                .catch(()=>{
                  //
                });
                //console.log(this.user_info);
            }
        },
        created() {
            this.user_id = document.querySelector('meta[name="user-id"]').getAttribute('content');
            this.loadInfo();
            
            //console.log('Component created.');
            

        },    
        mounted() {
            //console.log('Component mounted.');
        }
    }

    $(document).ready(function(){
        //$('[data-toggle="tooltip"]').tooltip('manual');
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
