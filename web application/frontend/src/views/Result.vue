<!--recommended result, final page-->
<template>
    <div v-if="result.length" style="margin-left: 50px">
        <div v-for="(item, index) in result" :key="index">
            <p style="color: #4881ee; font-size: large; font-weight: bolder">Title:{{item.title}}</p>
            <p>URI:{{item.uri_can}}</p>
            <p>Author:{{item.author}}</p>
            <p>Publication year:{{item.year}}</p>
            <p>Publisher:{{item.publisher}}</p>
            <p>Type:{{item.type}}</p>
            <p style="font-size: medium; font-weight: bolder; color: #7693c7">Recommended based on the relations:</p>
            <p style="margin-left: 40px; font-size: small; font-family: Abadi "><span style="color: palevioletred; font-family: Arial">① The items are connected by:  </span>{{item.r1}}</p>
            <p style="margin-left: 40px; font-size: small; font-family: Abadi "><span style="color: palevioletred">② The items share the same:   </span>{{item.r2}}</p>
            <p style="margin-left: 40px; font-size: small; font-family: Abadi "><span style="color: palevioletred">③ The authors are connected by:   </span>{{item.r3}}</p>
            <p style="margin-left: 40px; font-size: small; font-family: Abadi "><span style="color: palevioletred">④ The authors share the same:   </span>{{item.r4}}</p>
            <p>rank:{{item.rank}}</p>
            <p><span style="color: white">.</span></p>
        </div>
        <div>
            <page :show-total="true" :current="+pages.page" @on-change="changePage"
                  @on-page-size-change="changePageSize"
                  :page-size="+pages.pageSize"
                  :total="+pages.total" show-elevator show-sizer :page-size-opts="pageSizeOpts"></page>
        </div>
    </div>
    <div v-else  style="text-align: center; color:#ccc;">no data</div>
</template>

<script>
    export default {
        data() {
            return {
                result: [],
                pageSizeOpts: [5, 10, 30, 50, 100],
                pages: {
                    page: this.$route.query.page || 1,
                    pageSize: 20,
                    total: 0
                }
            }
        },
        methods: {
            getResult() {
                //get  result
                this.$request('/item/result', {
                    uri: this.$route.query.uri,
                    page: this.pages.page,
                    pageSize: this.pages.pageSize,
                }).then(res => {
                    this.result = res.data;
                    this.pages = res.pages;
                })
            },
            changePage(page) {
                this.pages.page = page;
                let query = JSON.parse(JSON.stringify(this.$route.query));
                query['page'] = page;
                this.$router.push({
                    query
                });
                this.getResult()
            },
            changePageSize(pageSize) {
                this.pages.pageSize = pageSize;
                let query = JSON.parse(JSON.stringify(this.$route.query));
                query['page'] = 1;
                query['pageSize'] = pageSize;
                this.$router.push({
                    query
                });

                this.getResult();
            },
        },
        created() {
            this.getResult()
        }
    }
</script>

<style scoped>

</style>