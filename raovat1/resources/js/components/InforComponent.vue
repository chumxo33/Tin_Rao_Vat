<template>
<div class="card container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="">Your Profile</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="http://localhost:8000/infor" method="">
                        <input type="hidden" :value="user.id" name="id">
                        <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Name*</label> 
                        <div class="col-8">
                            <input id="name" name="name"  placeholder="" :value="user.name"  class="form-control here" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="username" class="col-4 col-form-label">Username*</label> 
                        <div class="col-8">
                            <input id="username" name="username" placeholder="username" :value="user.username" class="form-control here" type="text">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">email*</label> 
                        <div class="col-8">
                            <input id="email" name="email" placeholder="email" :value="user.email" class="form-control here" type="email">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Role*</label> 
                        <div class="col-8">
                            <input id="email"  placeholder="" class="form-control here" :value="user.role_id" type="" disabled>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">block*</label> 
                        <div class="col-8">
                            <input id="email"  placeholder="" class="form-control here" :value="user.block" type="" disabled>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="newpass" class="col-4 col-form-label" >New Password</label> 
                        <div class="col-8">
                            <input id="newpass" name="password" placeholder="New Password" class="form-control here" type="password">
                        </div>
                        </div> 
                        <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button  type="submit" class="btn btn-primary">Update My Profile</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data(){
        return {
            user: [ ]
        }
    },
    mounted(){
        this.getUser()
    },
    methods:{
        getUser(){
            axios.get('http://localhost:8000/infor/get')
            .then( response => {
                this.user = response.data
            })
        }
    },
}
</script>
<style scoped>

</style>