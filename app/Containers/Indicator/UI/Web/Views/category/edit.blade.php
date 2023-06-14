<?php

/* @var $category App\Containers\Indicator\Models\Category */



?>
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent


@endsection

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Змінити категорію</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <h3 class="alert-heading fs-4 my-2">Успішно збережено</h3>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p class="mb-0">{{ $message }}</p>
            </div>
        @endif


        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif



        <form class="row g-3 align-items-center" method="post" action="update">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <h3 class="alert-heading fs-4 my-2">Помилка</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <a class="btn btn-alt-primary" href="/category">
                        <i class="fa fa-arrow-left me-1"></i> Назад
                    </a>
                </div>
                <div class="block-content py-4">
                    <h2 class="content-heading">Налаштування</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Назва
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="category[name]" value="{{$category->name}}"  class="form-control" type="text" placeholder="">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Коефіцієнт
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="category[coefficient]" value="{{$category->coefficient}}"  class="form-control" type="text" placeholder="">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Для випускових кафедр
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input name="category[graduating]" type="hidden" value="0">
                                    <input name="category[graduating]" class="form-check-input" type="checkbox" value="1" id="dm-post-edit-active" @if($category->graduating>0) checked="checked" @endif>
                                    <label class="form-check-label" for="dm-post-edit-active"></label>
                                </div>
                                <button type="submit" class="btn btn-primary my-3">Зберегти</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
