<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Задачи</h5>
            <h6 class="card-subtitle mb-2 text-muted">Список всех задач</h6>
            <div class="border-bottom" >
                <p><s><i class="fa fa-circle" aria-hidden="true"></i> Косякий при авторизации и регистрации</s></p>
            </div>
            <div class="border-bottom">
                <p><i class="fa fa-circle-o-notch" aria-hidden="true"></i> Экспорт статистики не работает</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'taskList'
        ],
        data(){
            return {
                statusSearch: false
            }
        },
        mounted() {

        },
        methods: {
            loadAllTasks(){
                /*
                axios.post('/cart/store', {
                            item_id: this.itemId,
                            count: this.count,
                            attributes:tempAttr,
                            user_id: this.authUser.id,
                            changed: this.changed
                        }).then((response) => {
                            if(response.data.status == "success"){
                                this.successNotification(response.data.msg);
                                this.changed = false;
                            }else if(response.data.status == "error"){
                                this.errorNotification();
                            }
                        }).catch((error) => {
                            console.log(error.response.data)
                            this.errorNotification();
                        });
*/
            }
        }
    }
</script>

