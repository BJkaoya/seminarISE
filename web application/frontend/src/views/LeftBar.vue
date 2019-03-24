<template>
    <div style="height: inherit; width: 250px;">
        <aside style="height: inherit;">
            <!--nav begin-->
            <i-menu style="height: 100%; overflow: auto" :active-name="activeName" :open-names="openNames">
                <menu-item name="home" to="/">homepage</menu-item>

            </i-menu>
            <!--nav end-->
        </aside>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                activeName: "home",
                openNames: []
            }
        },
        methods: {},
        created() {
        }
    }
</script>

<style scoped>

</style>