<template>
    <div class="col-lg-6 z-top">
        <div >
            <input class=" form-control mr-sm-2" type="search" placeholder="Фильтр + поиск" aria-label="Search">

            <div class="search-results">
                <div class="row">
                    <div class="col-md-12">
                        <form class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="role_id">Роль:</label>
                                <select class="form-control" name="role_id" id="role_id">
                                    <option value="0" selected>Не указан</option>
                                    <option value="1">Администратор</option>
                                    <option value="2">Модертатор</option>
                                    <option value="3">Тех. Поддержка</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="responsible">Ответственный</label>
                                <input type="text" class="form-control" name="responsible" id="responsible" placeholder="Фамилия Имя">
                            </div>
                            <div class="form-group">
                                <label for="Producer">Постановщик</label>
                                <input type="text" class="form-control" name="Producer" id="Producer" placeholder="Фамилия Имя">
                            </div>
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="status">Статус</label>
                                <input type="text" class="form-control" name="status" id="status" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="last_date">Крайний срок</label>
                                <input type="date" class="form-control" name="last_date" id="last_date" placeholder="">
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Найти</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="shade"></div>

    </div>
</template>
