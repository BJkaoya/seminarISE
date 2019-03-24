<template>

</template>

<script>
    export default {
        data() {
            return {
                uri: this.$route.query.uri,
                data: [],
                pages: {
                    page: 1,
                    pageSize: 20,
                    total: 0
                }
            }
        },
        methods: {
            getResults() {
                this.uri && this.$request('/bv', {
                    page: this.pages.page,
                    pageSize: this.pages.pageSize,
                    keyword: this.uri
                }).then(res => {
                    this.data = res.data;
                    this.pages = res.pages;
                });
            }
        },
        created() {
            this.getResults();
        }
    }
</script>

<style scoped>

</style>