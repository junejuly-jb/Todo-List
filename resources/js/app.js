require("./bootstrap");

window.Vue = require("vue");
import Form from "./Form";
window.Form = Form;

Vue.component("todo-component",require("./components/TodoComponent.vue").default);

const app = new Vue({
    el: "#app"
});
