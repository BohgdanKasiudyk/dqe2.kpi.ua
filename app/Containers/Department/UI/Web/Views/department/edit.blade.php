<?php

/* @var $department App\Models\Departments */
/* @var $faculties App\Models\Facultys */

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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">{{$department->name}}</h1>
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


        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Please check the form below for errors
            </div>
        @endif
        <form class="row g-3 align-items-center" method="post" action="/department/{{ $department->id }}/update">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <a class="btn btn-alt-primary" href="/department">
                        <i class="fa fa-arrow-left me-1"></i> Назад
                    </a>
                    <div class="block-options">
                        <div class="form-check form-switch">
                            <input name="department[visible]" type="hidden" value="0">
                            <input name="department[visible]" class="form-check-input" type="checkbox" value="1" id="dm-post-edit-active" @if($department->visible>0) checked="checked" @endif>
                            <label class="form-check-label" for="dm-post-edit-active">Видимість</label>
                        </div>
                    </div>
                </div>
                <div class="block-content py-4">
                    <h2 class="content-heading">Налаштування</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Факультет
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>
                                <select name="department[faculty_id]" class="form-select">
                                    @foreach ($faculties as $faculty)
                                        <option
                                            value="{{ $faculty->id }}"
                                            @if($faculty->id==$department->faculty_id) selected @endif
                                        >{{ $faculty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Назва кафедри
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>
                                <input name="department[name]" value="{{ $department->name }}" class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Коротка назва кафедри
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>
                                <input name="department[short]" value="{{ $department->short }}"  class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Кафедра випускова
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input name="department[vupusk]" type="hidden" value="0">
                                    <input name="department[vupusk]" class="form-check-input" type="checkbox" value="1" id="dm-post-edit-active" @if($department->vupusk>0) checked="checked" @endif>
                                    <label class="form-check-label" for="dm-post-edit-active"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Зав. кафедри
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>
                                <input name="department[boss]" value="{{ $department->boss }}"  class="form-control" type="text" placeholder="">
                                <button type="submit" class="btn btn-primary my-3">Зберегти</button>
                            </div>
                        </div>
                    </div>
                    <h2 class="content-heading">Контакна інформація</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Адреса кафедри
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="department[address]" value="{{ $department->address }}"  class="form-control" type="text" placeholder="">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Робоча кімната
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="department[phone_two]" value="{{ $department->phone_two }}"  class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Контакний телефон
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="department[phone_one]" value="{{ $department->phone_one }}"  class="form-control" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Електронна адреса
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="department[email]" value="{{ $department->email }}"  class="form-control" type="text" placeholder="">
                                <button type="submit" class="btn btn-primary my-3">Зберегти</button>
                            </div>
                        </div>
                    </div>
                    <h2 class="content-heading">Континген та штат</h2>
                    <div class="row">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Кількість студентів
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="department[students]" value="{{ $department->students }}"  class="form-control" type="text" placeholder="">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Кількість штатних
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="department[staff]" value="{{ $department->staff }}"  class="form-control" type="text" placeholder="">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Кількість НПП
                            </p>
                        </div>
                        <div class="col-lg-8 space-y-2">
                            <div class="col-12">
                                <label class="visually-hidden" for="example-if-email">Email</label>

                                <input name="department[npp]" value="{{ $department->npp }}"  class="form-control" type="text" placeholder="">
                                <button type="submit" class="btn btn-primary my-3">Зберегти</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
