<!---search result page, the second page-->
<template>
    <div>
        <div v-for="(item, index) in data" :key="index" style="margin-left: 50px">
            <router-link :to="{path:'/result', query:{uri:item.uri}}">
                <h4>{{index+1}}.{{item.title}}</h4>
            </router-link>
            <p>Uri:{{item.uri}}</p>
            <p>Author:{{item.author}}</p>
            <p>Publication year:{{item.year}}</p>
            <p>Publisher:{{item.publisher}}</p>
            <p>Type:{{item.type}}</p>
            <!--<p>publisher:{{item.publisher}}</p>
            <p>type:{{item.type}}</p>
              <p>score:{{item.score}}</p>
             <p>uri:{{item.uri}}</p></p>-->
        </div>
        <div>
            <page :show-total="true" :current="+pages.page" @on-change="changePage"
                  @on-page-size-change="changePageSize"
                  :page-size="+pages.pageSize"
                  :total="+pages.total" show-elevator show-sizer :page-size-opts="pageSizeOpts"></page>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keyword: this.$route.query.keyword,
                data: [],
                pageSizeOpts: [5, 10, 30, 50, 100],
                pages: {
                    page: this.$route.query.page || 1,
                    pageSize: 20,
                    total: 0
                }
            }
        },
        methods: {
            getResults() {
                this.keyword && this.$request('/item', {
                    page: this.pages.page,
                    pageSize: this.pages.pageSize,
                    keyword: this.keyword
                }).then(res => {
                    this.data = res.data;
                    this.pages = res.pages;
                });
            },
            changePage(page) {
                this.pages.page = page;
                let query = JSON.parse(JSON.stringify(this.$route.query));
                query['page'] = page;
                this.$router.push({
                    query
                });
                this.getResults()
            },
            changePageSize(pageSize) {
                this.pages.pageSize = pageSize;
                let query = JSON.parse(JSON.stringify(this.$route.query));
                query['page'] = 1;
                query['pageSize'] = pageSize;
                this.$router.push({
                    query
                });
                this.getResults();

            },
        },
        created() {
            this.getResults();
        }

    }
</script>

<style scoped>

</style>