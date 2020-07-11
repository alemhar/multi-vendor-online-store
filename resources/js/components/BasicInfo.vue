<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3>Basic Info</h3> 
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                        

                    </div>
                    
                    <div class="card-body">
                        <form>
                            
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputMI">MI</label>
                                    <input type="text" class="form-control" id="inputMI" placeholder="">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputSurname">Surname</label>
                                    <input type="text" class="form-control" id="inputSurname" placeholder="Surname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputAddress2" placeholder="1234 Main St">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputBarangay">Barangay</label>
                                <input type="text" class="form-control" id="inputBarangay">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputMobile">Mobile #</label>
                                    <input type="text" class="form-control" id="inputMobile" placeholder="09123456789">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputLandline">Landline #</label>
                                    <input type="text" class="form-control" id="inputLandline" placeholder="123-4567">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="juan.delacruz@email.com">
                                </div>
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

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
