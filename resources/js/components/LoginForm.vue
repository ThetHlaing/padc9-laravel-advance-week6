<template>
  <div>
    <form-group label="Email Address">
      <input type="email" class="form-control" v-model="email"/>
    </form-group>
    <form-group label="Password">
      <input type="password" class="form-control" v-model="password"/>
    </form-group>
    <button class="btn btn-primary" @click="login">Login</button>
  </div>
</template>
<script>
export default {
  data() {
    return {
      email : null,
      password : null
    };
  },
  methods :{
    login(){

      console.log(this.email,this.password);
    }
  }
 
};
</script>