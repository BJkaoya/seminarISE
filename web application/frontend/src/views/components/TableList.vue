<template>
    <row>
        <i-col :span="24">
            <i-table :size="size" :stripe="stripe" highlight-row :columns="columns" :data="data" :loading="loading"
                     @on-selection-change="toSelect" ref="table" :border="border"></i-table>
        </i-col>
        <i-col :span="24" style="margin: 10px 0;">
            <row>
                <div style="display: flex; flex-direction: row; width: 100%;">
                    <div style="margin-right: 20px;">
                        <slot name="actionBat">

                        </slot>
                        <i-button type="success" icon="ios-download-outline" v-if="isExport" @click.native="toExport">
                            导出Excel数据
                        </i-button>
                    </div>
                    <div style="flex: 1;">
                        <page :size="pSize" :show-total="true" :current="+page.page" @on-change="changePage"
                              @on-page-size-change="changePageSize"
                              :page-size="+page.pageSize"
                              :total="+page.total" show-elevator show-sizer :page-size-opts="pageSizeOpts"></page>
                    </div>
                </div>
            </row>
        </i-col>

    </row>
</template>

<script>
    export default {
        name: "TableList",
        props: {
            isPager: {
                type: Boolean,
                default: true
            },
            pSize: String,
            size: String,//表格的大小
            stripe: Boolean,
            border: Boolean,
            loading: Boolean,
            isExport: Boolean,
            columns: {
                default: [],
                required: true
            },
            pageSizeOpts: {
                type: Array,
                default() {
                    return [5, 10, 30, 50, 100];
                }
            },
            data: {
                type: Array,
                default() {
                    return []
                }
            },
            page: {
                type: Object,
                default() {
                    return {
                        total: 0,
                        page: 1,
                        pageSize: 20
                    }
                }
            }
        },
        data() {
            return {
                //data:[],
            }
        },
        methods: {
            toSelect(data) {
                //多选的是时候数据
                this.$emit('toSelect', data);
            },
            changePage(page) {
                this.page.page = page;
                let query = JSON.parse(JSON.stringify(this.$route.query));
                query['page'] = page;
                this.$router.push({
                    query
                });
                this.handleGetData();
                this.$emit('toSelect', []);
            },
            changePageSize(pageSize) {
                this.page.pageSize = pageSize;
                let query = JSON.parse(JSON.stringify(this.$route.query));
                query['page'] = 1;
                query['pageSize'] = pageSize;
                this.$router.push({
                    query
                });
                this.handleGetData();
                this.$emit('toSelect', []);
            },
            handleGetData() {
                this.$emit('getData');
            },
            toExport() {
                this.$refs.table.exportCsv({
                    filename: ''
                });
            }
        },
        created() {
            this.page.page = this.$route.query.page || 1;
            this.page.pageSize = this.$route.query.pageSize || 10;
            this.handleGetData();
        }
    }
</script>

<style scoped>

</style>