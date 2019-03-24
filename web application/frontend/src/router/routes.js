//import register from './register'
//import pharmacy from  './pharmacy'

export default [
    {
        path: '/',
        component: (resolve) => {
            require(['@/views/Index'], resolve);
        },
        children: [
            {
                path: '/',
                component: (resolve) => {
                    require(['@/views/Main'], resolve);
                },
            },
            {
                path: '/search-result',
                component: (resolve) => {
                    require(['@/views/SearchResult'], resolve);
                },
            },
            {
                path: '/result',
                component: (resolve) => {
                    require(['@/views/Result'], resolve);
                },
            },
            {
                path: '/recommended',
                component: (resolve) => {
                    require(['@/views/Recommended'], resolve);
                },
            }
        ]
    },
    {
        path: '/404',
        component: (resolve) => {
            require(['@/views/404'], resolve);
        }
    },
    {
        path: '*',
        redirect: '/404'
    }
]
