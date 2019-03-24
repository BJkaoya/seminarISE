<template>
    <layout style="width: 1200px; margin: 0 auto;">
        <Affix>
            <i-header style="margin-bottom: 0; background-color: #a5b7de; height: 66px">

                <row>

                    <div style="position: absolute"><a href="#"><img src="./logo.png" alt="logo" style="width: 185px; height: 62px"></a>
                       </div>
                    <i-col :span="19" style="text-align: right;">
                        <i-select placeholder="Input keyword to show related items" filterable remote
                                  :remote-method="getKeyword" style="width: 500px;"
                                  @on-change="handleChange" clearable>
                            <Option v-for="(item, index) in results " :key="index" :value="item.title">{{item.title}}
                            </Option>
                        </i-select>
                        <i-button type="default" @click="goSearchResult" style="background-color: #febd69">Search</i-button>
                    </i-col>
                </row>


            </i-header>
            <MenuNav></MenuNav>
        </Affix>

        <layout>
            <div :style="{position:'relative',minHeight:clientHeight}">

                <div style="margin: 15px 60px; ">
                    <router-view :key="$route.query.keyword"></router-view>
                </div>


            </div>
        </layout>
        <BackTop></BackTop>
    </layout>
</template>

<script>
    export default {
        components: {
            MenuNav: resolve => require(["./MenuNav"], resolve)
        },
        data() {
            return {
                clientHeight: '0px',
                results: [],
                keyword: "",
            }
        },
        mounted() {
            let _ = this;
            this.$nextTick(function () {
                this.clientHeight = document.body.clientHeight - 150 + 'px';
            });
            onresize = function () {
                _.clientHeight = document.body.clientHeight - 150 + 'px';
                //console.log(_.clientHeight, document.body.clientHeight);
            }
        },
        methods: {
            getKeyword($query) {
                this.keyword = $query;
                this.$request('/item/keyword', {keyword: $query}).then(res => {
                    this.results = res;
                })
            },
            handleChange(val) {
                //改变后跳转

                val !== "" && this.$router.push({
                    path: "/search-result",
                    query: {
                        keyword: val
                    }
                })
            },
            goSearchResult() {
                this.keyword && this.$router.push({
                    path: '/search-result',
                    query: {
                        keyword: this.keyword
                    }
                })
            }
        },
        created() {

        }
    }
</script>

<style>
    .ivu-select-dropdown {
        z-index: 999!important;
    }

    .ivu-select-item {
        text-align: left;
    }

    .ivu-select-dropdown {
        right: 0
    }
</style>