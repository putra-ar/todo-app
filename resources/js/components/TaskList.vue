<template>
  <div class="row">
    <h1 class="m-2">Todo List</h1>
    <h4 class="m-2">New Task</h4>
    <form action="#" v-on:submit.prevent="createTask()">
      <div class="input-group">
        <input
          v-model="task.description"
          type="text"
          name="description"
          class="form-control bg-white"
          autofocus
        />
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary">New Task</button>
        </span>
      </div>
    </form>
    <h4 class="m-2">All Tasks</h4>
    <ul class="list-group">
      <li class="list-group-item" v-if="list.length === 0">Tidak ada task!</li>
      <li class="list-group-item" v-for="(task, index) in tasks" :key="task.id">
        <div class="row">
          <div class="col-auto me-auto">
            {{ task.description }}
          </div>
          <div class="col-auto">
            <button
              v-on:click="deleteTask(task.id, index)"
              class="btn btn-danger btn-sm align-self-end"
            >
              Delete
            </button>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'task-list',
  props: {
    list: [],
  },
  data() {
    return {
      tasks: this.list,
      task: {
        id: '',
        description: '',
      },
    };
  },
  mounted() {
    console.log(this.list);
  },

  methods: {
    fetchTaskList() {
      axios.get('/').then((res) => {
        this.list = res.data;
      });
    },

    createTask() {
      axios
        .post('/task/', this.task)
        .then((res) => {
          this.tasks.push(res.data);
          this.task.description = '';
          this.edit = false;
          //   this.fetchTaskList();
        })
        .catch((err) => console.error(err));
    },

    deleteTask(id, index) {
      axios
        .delete('/task/' + id)
        .then((res) => {
          this.tasks.splice(index, 1);
        })
        .catch((err) => console.error(err));
    },
  },
};
</script>
