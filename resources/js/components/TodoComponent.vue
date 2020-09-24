<template>
  <div class="container">
    <div class="py-5 text-center">
      <h2 class="text-white">Vue JS Todo List App</h2>
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
    <div class="w-50 m-auto">
      
      <div v-for="todo in todos" :key="todo.id" class="my-1 py-2 px-2">
        <span>
          <svg v-if="todo.status == 'completed'" v-on:click="toggleTodo(todo)" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#03A9F4" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="12" r="9" />
            <path d="M9 12l2 2l4 -4" />
          </svg>
          <svg v-if="todo.status == 'incomplete'" v-on:click="toggleTodo(todo)" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFC107" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="12" r="9" />
          </svg>
        </span>
        <span class="text-white" v-if="todo.status == 'completed'"><s>{{ todo.title }}</s></span>
        <span class="text-white" v-if="todo.status == 'incomplete'">{{ todo.title }}</span>
        <div class="float-right">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFC107" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
              <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
            </svg>
          </span>
          <span>
            <svg v-on:click="removeTodo(todo)" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F44336" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <line x1="4" y1="7" x2="20" y2="7" />
              <line x1="10" y1="11" x2="10" y2="17" />
              <line x1="14" y1="11" x2="14" y2="17" />
              <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
              <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
            </svg>
          </span>
        </div>
        <hr>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    
    data(){
      return{
        editMode: false,
        todos: '',
        form: new Form({
          title: ''
        })
      }
    },
    methods:{
      removeTodo(todo){
        console.log(todo)
        axios.delete('/api/deleteTodo/' + todo.id).then((res) => {
          console.log(res.data.message)
          this.getTodos()
        }).catch((err) => {
          console.log(err)
        })
      },
      toggleTodo(todo){
        
        axios.put('/api/toggleTodo/' + todo.id, todo).then((response) => {
          console.log(response.data)
          this.getTodos()
        }).catch((err) => {
          console.log(err)
        })

      },
      getTodos(){
        axios.get('/api/myTodo').then((res) => {
          this.todos = res.data.data
        }).catch((err) => {
          console.log(err)
        })
      },
      saveData(){
        let data = new FormData();

        if(this.form.title == ''){
          alert('Invalid')
        }

        else{
          data.append('title', this.form.title)
          axios.post('/api/addTodo', data).then((res) => {
            this.form.reset()
            this.getTodos()
            alert(res.data.message)
          }) 
        }
      }
    },
    mounted() {
      this.getTodos()
    },
  };
</script>
