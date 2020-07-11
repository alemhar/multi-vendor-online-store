<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3>Skills</h3> 
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>
                        

                    </div>
                    
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="w-5">#</th>
                                    <th class="w-50">Skill</th>
                                    <th class="w-30">Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>1</td>
                                <td>Carpentry</td>
                                <td>Intermediate</td>
                                </tr>
                                <tr>
                                <td>2</td>
                                <td>Masonry</td>
                                <td>Basic</td>
                                </tr>
                                <tr>
                                <td>3</td>
                                <td>Painting</td>
                                <td>Expert</td>
                                </tr>
                            </tbody>
                            </table>
                        
                        

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
