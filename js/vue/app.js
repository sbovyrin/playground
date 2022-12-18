const Home = { template: '<div>Home</div>' }
const About = { template: '<div>About</div>' }

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes: [
        { name: 'home', path: '/', component: Home },
        { name: 'about', path: '/about', component: About }
    ]
})

const app = Vue.createApp({})

app.use(router)

app.mount('#app')
