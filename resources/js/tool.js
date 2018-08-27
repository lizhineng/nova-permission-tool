Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'permission-tool',
            path: '/permission-tool',
            component: require('./components/Tool'),
        },
    ])
})
