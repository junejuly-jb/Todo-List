<template>
    <div class="container">
        <div class="py-5 text-center">
            <h2 class="text-white">Vue Todo List App</h2>
        </div>
        <div class="w-50 m-auto">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-success" type="submit">Add Todo</button>
                </div>
                <input v-model="form.title" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            form: new Form({
                title: ''
            })
        }
    },
    methods:{
        todoForm(){
            let data = new todoForm();
        }
    },
    mounted(){

    }    
}

</script>