<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Задачи</h5>
            <h6 class="card-subtitle mb-2 text-muted">Список всех задач</h6>
            <div class="border-bottom" v-for="task in tasks" :key="task.id">
                <p v-if="checkFinishedStatus(task.status)"><s><i class="fa fa-circle" aria-hidden="true"></i> {{task.title}}</s></p>
                <p v-else><i class="fa fa-circle" aria-hidden="true"></i> {{task.title}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'tasklist',
        ],
        data(){
            return {
                statusSearch: false,
                tasks: []
            }
        },
        mounted() {
            this.loadTasks();
            this.$root.$on('set-tasks-result', resultData => {
                this.setTasksResult(resultData)
            });
        },
        methods: {
            loadTasks(){
                axios.get('/api/tasks', {
                        }).then((response) => {
                            if(response.data.status == "success"){
                                this.statusSearch = false;
                                this.tasks = response.data.tasks.data;
                            }else if(response.data.status == "error"){
                                /*
                                this.errorNotification();
                                */
                            }
                        }).catch((error) => {
                            console.log(error.response.data)
                });
            },
            checkFinishedStatus(statuses){
                var st = false;
                statuses.forEach(function(key, value){
                    if(key.id === 3){
                        st = true;
                    }
                })
                return st;
            },
            setTasksResult(resultData){
                this.tasks = resultData;
            }
        }
    }
</script>

