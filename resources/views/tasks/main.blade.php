@extends('layout.app', ['title' => 'Tasks'])

@section('content')
<div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="d-inline-flex">
                            <h4>Мои задачи</h4>
                        </div>
                        <span><i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                    </div>

                    <search-view></search-view>

                    <div class="col-lg-3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-cog" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-secondary"><i class="fa fa-bolt" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-info">Добавить</button>
                        </div>
                    </div>
                </div>
                <hr>
                <statistics-view></statistics-view>
            </div>
        </div>
        <div class="main-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($tasks as $task)
                            {{$task->title}}
                        @endforeach
                        <tasks-view></tasks-view>
                    </div>
                </div>
            </div>
        </div>

@endsection
