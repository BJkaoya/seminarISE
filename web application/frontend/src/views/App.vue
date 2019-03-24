<template>
    <div id="app">
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'App',
        created(){
            //this.$store.dispatch('user/checkLogin');
        }
    }
</script>

<style>
    html, body {
        font-size: 16px;
        height: 100%;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        overflow: hidden;
    }
</style>
