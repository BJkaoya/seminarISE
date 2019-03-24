import $ from 'jquery'
import {Message} from 'iview'
import {router} from '@/router'
import store from "../store";

$.ajaxSetup({
    xhrFields: {
        // withCredentials: true
    },
    //crossDomain: true,
    /*complete(d) {
        d.then((abc) => {
            console.log(abc)
        })
    },*/
    error: (xhr, textStatus, eThrow) => {
        //console.log(xhr,textStatus,eThrow);
        switch (xhr.status) {
            case 200:
                Message.error('请求数据格式出错');
                break;
            case 404:
                Message.error('请求不存在404');
                break;
            case 500:
                Message.error('服务发生错误！，请管理员维护');
                break;
            case 406:
                Message.error('数据服务器不接受！请联系管理员');
                break;
            case 401:
                setTimeout(() => {
                    if (router.app.$route.fullPath !== '/login') {
                        Message.error('登录过期，请登录！');
                        router.replace('/login');
                    }
                }, 30);
                break;
            default:
                Message.error('请求有误！')
        }
    }
});

//let base = '//admin.gdqihu.cn/api/index.php';
//console.log(process.env.NODE_ENV == 'development' )
//console.log(process.env.NODE_ENV)
//const __host = process.env.NODE_ENV === 'development' ? '/api' : '//school.dev.gdqihu.cn/api';
let base = '/api/index.php';

export const requestYiiCaptcha = params => {
    return base + '/login/default/captcha?v=' + Math.random()
};

const request = (url, params, method) => {
    if (!url) {
        console.log('缺少Url');
        return false;
    }
    params || (params = {});
    method || (method = 'get');

    return $.ajax(base + url, {
        data: params,
        dataType: 'json',
        type: method,
        /* xhrFields: {
             withCredentials: true
         },
         crossDomain: true,*/
    });
};
const tips = (res, callback) => {
    if (res.code === 200) {
        Message.success('提交成功')
    } else {
        Message.error('提交失败' + res.data.error)
    }
    typeof callback === 'function' && callback();
};
export {
    request,
    tips
};
