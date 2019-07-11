<template>
    <div class="col-lg-6 z-top">
        <div class="z-top">
            <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Фильтр + поиск"
            aria-label="Search"
            @focus="onFokusResult"
            v-model="filterParams.title"
            >

            <div v-if="statusSearch === true" class="search-results">
                <div class="row">
                    <div class="col-md-12">
                        <form id="filter_search" class="needs-validation" novalidate @submit.prevent="doFilter()">
                            <div class="form-group">
                                <label for="role_id"><small>Роль:</small></label>
                                <select v-model="filterParams.role_id" class="form-control" name="role_id" id="role_id">
                                    <option value="0" selected>Не указан</option>
                                    <option v-for="role in roles" :key="role.id" :value="role.id">{{role.name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="responsible"><small>Ответственный</small></label>
                                <input v-model="filterParams.responsible" type="text" class="form-control" name="responsible" id="responsible" placeholder="Фамилия Имя">
                            </div>
                            <div class="form-group">
                                <label for="producer"><small>Постановщик</small></label>
                                <input v-model="filterParams.producer" type="text" class="form-control" name="producer" id="producer" placeholder="Фамилия Имя">
                            </div>
                            <div class="form-group">
                                <label for="title"><small>Название</small></label>
                                <input v-model="filterParams.title" type="text" class="form-control" name="title" id="title" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="status"><small>Статус</small></label>
                                <input v-model="filterParams.status" type="text" class="form-control" name="status" id="status" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="last_date"><small>Крайний срок</small></label>
                                <input v-model="filterParams.last_date" type="date" class="form-control" name="last_date" id="last_date" placeholder="">
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Найти</button>
                            <button class="btn btn-secondary" @click="resetData" type="button"><i class="fa fa-times" aria-hidden="true"></i> Сбросить</button>
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
                statusSearch: false,
                roles: [],
                resultData: [],
                filterParams: {
                    role_id: "0",
                    responsible: null,
                    producer: null,
                    title: null,
                    status: null,
                    last_date: null
                }
            }
        },
        mounted() {
            axios.get('/api/roles', {
            }).then((response) => {
                if(response.data.status == "success"){
                    this.statusSearch = false;
                    this.roles = response.data.roles.data;
                }
            }).catch((error) => {
                console.log(error.response.data)
            });
        },
        methods: {
            closeResult(){
                this.statusSearch = false;
            },
            onFokusResult(){
                this.statusSearch = true;
            },
            resetData(){
                this.filterParams = {
                        role_id: "0",
                        responsible: null,
                        producer: null,
                        title: null,
                        status: null,
                        last_date: null
                }
                this.doFilter();
            },
            doFilter(){
                axios.get('/api/tasks', {
                    params: {
                        res: this.filterParams
                    }
                }).then((response) => {
                    console.log(response);
                    if(response.data.status == "success"){
                        this.statusSearch = false;
                        this.resultData = response.data.tasks.data;

                        this.$root.$emit('set-tasks-result', this.resultData);

                    }else if(response.data.status == "error"){
                        console.log('error')
                    }
                }).catch((error) => {
                    console.log(error.response.data)
                });
            }
        }
    }
</script>
