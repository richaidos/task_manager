<template>
    <div class="col-lg-6 z-top">
        <div >
            <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Фильтр + поиск"
            aria-label="Search"
            @focus="onFokusResult"
            >

            <div v-if="statusSearch === true" class="search-results">
                <div class="row">
                    <div class="col-md-12">
                        <form class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="role_id"><small>Роль:</small></label>
                                <select class="form-control" name="role_id" id="role_id">
                                    <option value="0" selected>Не указан</option>
                                    <option value="1">Администратор</option>
                                    <option value="2">Модертатор</option>
                                    <option value="3">Тех. Поддержка</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="responsible"><small>Ответственный</small></label>
                                <input type="text" class="form-control" name="responsible" id="responsible" placeholder="Фамилия Имя">
                            </div>
                            <div class="form-group">
                                <label for="Producer"><small>Постановщик</small></label>
                                <input type="text" class="form-control" name="Producer" id="Producer" placeholder="Фамилия Имя">
                            </div>
                            <div class="form-group">
                                <label for="title"><small>Название</small></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="status"><small>Статус</small></label>
                                <input type="text" class="form-control" name="status" id="status" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="last_date"><small>Крайний срок</small></label>
                                <input type="date" class="form-control" name="last_date" id="last_date" placeholder="">
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Найти</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div
            v-if="statusSearch === true"
            @click="closeResult"
            class="shade"></div>
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
            closeResult(){
                this.statusSearch = false;
            },
            onFokusResult(){
                this.statusSearch = true;
            }
        }
    }
</script>

<style>

</style>
