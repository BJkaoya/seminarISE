import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes'
import store from "../store";


Vue.use(Router);

const RouterConfig = {
    routes,
    mode:"hash",
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            return {
                selector: to.hash
            }
        }
    }
};

export const router = new Router(RouterConfig);



//删除路由信息 可以通过 route.matched 删除
