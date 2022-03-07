export default [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/bills', component: require('./components/bill/Bills.vue').default },
    { path: '/product/tag', component: require('./components/bill/Tag.vue').default },
    { path: '/product/category', component: require('./components/bill/Category.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default }
];
