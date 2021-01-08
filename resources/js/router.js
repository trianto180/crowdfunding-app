import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

//DEFINE ROUTE
const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            alias: '/home',
            component: () => import(/*Webpackchunckname:"categories */ './views/Home.vue')
        },
        {
            path: '/donations',
            name: 'donations',
            component: () => import(/* wbpackChunckName: "categories" */ './views/Donations.vue')
        },
        {
            path: '/blogs',
            name: 'blogs',
            component: () => import(/* wbpackChunckName: "categories" */ './views/Blogs.vue')
        },
        {
            path: '/campaigns',
            name: 'campaigns',
            component: () => import('./views/Campaigns.vue')
        },
        {
            path: '/campaign/:id',
            name: 'campaign',
            component: () => import('./views/Campaign.vue')
        },
        {
            path: '/auth/social/:provider/callback',
            name: 'social',
            component: () => import('./views/Social.vue')
        },
        {
        path: '*',
        redirect: '/'
        }
    ]
});

export default router