require("./bootstrap");

window.Vue = require("vue");
// import Form from "./Form";
import { Form, HasError, AlertError } from 'vform'
import Swal from 'sweetalert2'

window.Form = Form;
window.Swal = Swal;


const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast
Vue.component("todo-component",require("./components/TodoComponent.vue").default);

const app = new Vue({
    el: "#app"
});
