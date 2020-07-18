export const routes = [
    {
        path: '/account',
        component: require('./components/BasicInfo.vue').default 
    },
    {
        path: '/products',
        component: require('./components/Products.vue').default 
    },
    {
        path: '/productlist',
        component: require('./components/ProductList.vue').default 
    }
];

