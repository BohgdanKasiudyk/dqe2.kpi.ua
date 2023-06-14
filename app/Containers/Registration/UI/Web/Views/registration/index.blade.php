<?php

/* @var $items App\Models\Departments */

?>
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent


@endsection

@section('content')
    <section class="g-min-height-100vh g-flex-centered g-bg-lightblue-radialgradient-circle">
        <div class="container g-py-50">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-9 col-lg-6">
                    <div class="u-shadow-v24 g-bg-white rounded g-py-40 g-px-30">
                        <header class="text-center mb-4">
                            <h2 class="h2 g-color-black g-font-weight-600">Створіть обліковий запис</h2>
                        </header>
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
                        <!-- Form -->
                        <form class="g-py-15" action="/registration/store" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 mb-4">
                                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Ім'я:</label>
                                    <input name="name" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="text" placeholder="John">
                                </div>

                                <div class="col-xs-12 col-sm-6 mb-4">
                                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Прізвище:</label>
                                    <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="text" placeholder="Doe">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                                <input name="email" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="email" placeholder="johndoe@gmail.com">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 mb-4">
                                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Пароль:</label>
                                    <input name="password" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="password" placeholder="Password">
                                </div>

                                <div class="col-xs-12 col-sm-6 mb-4">
                                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Підтвердьте пароль:</label>
                                    <input name="password_confirmation" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="row justify-content-between mb-5">
                                <div class="col-4 align-self-center text-right">
                                    <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" type="submit">Зареєструвати</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
