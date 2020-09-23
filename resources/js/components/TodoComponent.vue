<template>
  <div class="container">
    <div class="py-5 text-center">
      <h2 class="text-white">Vue Todo List App</h2>
    </div>
    <div class="w-50 m-auto">
      <form @submit.prevent="saveData">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-success" type="submit">Add Todo</button>
          </div>
          <input v-model="form.title" type="text" class="form-control" aria-describedby="basic-addon1"/>
        </div>
      </form>
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
      saveData(){
        let data = new FormData();
        data.append('title', this.form.title)
        // console.log(data)
        axios.post('/api/addTodo', data)
      }
    },
    mounted() {
      console.log("mounted!");
    },
  };
</script>
