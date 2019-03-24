<template>
    <row>
    <Menu style="background-color: rgb(237,237,237); height: 53px;align-items: center" mode="horizontal" :theme="theme1" active-name="1">
        <MenuItem style="" name="1" to="/">Homepage</MenuItem>
        <MenuItem style="" name="2" to="#intr">Introduction</MenuItem>
        <MenuItem style="" name="3" to="#inst">Instruction</MenuItem>
        <MenuItem style="" name="4" to="#data">Data Overview</MenuItem>
        <MenuItem style="" name="5" to="#stra">Recommendation Strategy</MenuItem>
    </Menu> </row>
</template>
<script>
    export default {
        data() {
            return {
                theme1: 'light'
            }
        }
    }
</script>