import ListingPage from '../components/ListingPage.vue';


export default new VueRouter({
    mode: 'history', routes: [
        // { path: '/',component: HomePage },
        // doesn't exist yet!
        { path: '/listing/:listing', component: ListingPage }
        ]
});
