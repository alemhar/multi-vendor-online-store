<template>
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
                                <button type="submit" @click="saveInfo" class="btn btn-primary float-right">Save</button>
                                <button type="submit" @click="loadInfo" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form row">
                            
                            
                            
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 card bg-light mb-3 pb-4" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Light card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 card bg-light mb-3 pb-4" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Light card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 card bg-light mb-3 pb-4" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Light card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 card bg-light mb-3 pb-4" style="max-width: 18rem;">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h5 class="card-title">Light card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
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

                
            },
            loadInfo(){
                
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
