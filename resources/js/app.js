
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//สร้าง tag ของตัวเอง ชื่อ example-component 
Vue.component('example-component', require('./components/ExampleComponent.vue').default); //export default in 'ExampleComponent'
Vue.component('user-info', require('./components/UserInfo.vue').default); //export default in 'ExampleComponent'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 //mvvm
    //m - model
    //v - view
    //vm -view-model
//เมื่อโมเดลเปลี่ยนค่า วิวจะอัพเดตทันที ไม่มีคอนโทรลเลอร์นะ

const app = new Vue({ //เปลี่ยนค่า app 1 ไม่ได้เพราะเป็น const
    el: '#app' ,    //el=elememt จะเอา html ส่วนไหนมาผูก
    data: {                     //model DB
        title:'Manage Users' ,   //feild
        showTitle:true   //npm run watch
    },

    methods:{
        toggleTitle : function(){
            this.showTitle = !this.showTitle
        }
    }

});
