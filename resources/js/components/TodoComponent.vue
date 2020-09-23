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
    <div>
      <div class="card">
        <div v-for="todo in todos" :key="todo.id">{{todo.title}}</div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    
    data(){
      return{
        todos: '',
        form: new Form({
          title: ''
        })
      }
    },
    methods:{
      getTodos(){
        axios.get('/api/myTodo').then((res) => {
          this.todos = res.data.data
        }).catch((err) => {
          console.log(err)
        })
      },
      saveData(){
        let data = new FormData();
        data.append('title', this.form.title)
        // console.log(data)
        axios.post('/api/addTodo', data).then(function(res){
          console.log(res.data.message)
        })
      }
    },
    mounted() {
      this.getTodos()
    },
  };
</script>
