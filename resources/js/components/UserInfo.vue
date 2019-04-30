<template>
    <div v-if="user">
        <div class="card-title">{{ user.name }}</div>
        <div class="card-title">{{ user.email }}</div>
        <div class="card-title">{{ user.role }}</div>
    </div>
  
</template>

<script>
export default {
    name: "UserInfo.vue",
    data:function(){
        return {
            user:null
        }
    },
    //camel case -> user-id -> userId
    props: ['userId'], 
    mounted: function(){
        axios.get('http://127.0.0.1:8000/api/users/' + this.userId)
        .then(response => {
            //console.log(response);
        this.user = response.data.data;
        })
        .catch (err => {
            console.error(err);
        })
    }
}
</script>
<style>

</style>


