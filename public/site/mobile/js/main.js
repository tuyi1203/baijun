
requirejs.config({
    baseUrl: "/public/site/mobile/js/",
    urlArgs: 'bust=' + (new Date()).getTime(),
    waitSeconds: 0,
    paths: {
        'jquery': 'jquery',
        $: "jquery",
        script:'script',
        swiper:'swiper-3.4.2.jquery.min',
        form:'form',
        submit:'submit',
        app:'app',
        mmenu:"mmenu"
    },
    shim: {
        pagefull: {
            deps: ['jquery'],
            exports: 'pagefull'
        },
        script: {
        	deps:['jquery'],
        	exports:'script'
        },
        form: {
            deps:['jquery'],
            exports:'form'
        },
        submit: {
            deps:['jquery'],
            exports:'submit'
        },
        app: {
            deps:['jquery'],
            exports:'app'
        },
         mmenu:{
            deps:['jquery'],
            exports:'mmenu'
        }
    }
});