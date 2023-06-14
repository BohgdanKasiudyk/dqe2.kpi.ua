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


<section class="container g-mb-50">
    <div class="container g-z-index-1 g-py-10">
        <h1 class="g-font-weight-300 g-letter-spacing-1 g-mb-15">Кафедри</h1>

        <div class="lead g-font-weight-400 g-line-height-2 g-letter-spacing-0_5">
            <p class="mb-0"></p>
        </div>
    </div>
    <!-- General Forms -->
    <form class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30 u-shadow-v1-3" method="post" action="/department/{{ $department->id }}/store">
        @csrf
        <h4 class="h6 g-font-weight-700 g-mb-20">Налаштування</h4>
        <!-- Text Input -->
        <div class="form-group row g-mb-25">
            <label class="col-sm-3 col-form-label g-mb-10" for="hf-email">Факультет</label>

            <div class="col-sm-9">
                <select name="department[faculty_id]" class="form-control form-control-md rounded-0 g-mb-25">
                    @foreach ($faculties as $faculty)
                    <option
                        value="{{ $faculty->id }}"
                        @if($faculty->id==$department->faculty_id) selected @endif
                    >{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- End Text Input -->
        <!-- Text Input -->
        <div class="form-group row g-mb-25">
            <label class="col-sm-3 col-form-label g-mb-10" for="hf-email">Назва кафедри</label>

            <div class="col-sm-9">
                <input name="department[name]" value="{{ $department->name }}" id="hf-email" class="form-control u-form-control rounded-0" type="еуче" placeholder="">
                <small class="form-text text-muted g-font-size-default g-mt-10"></small>
            </div>
        </div>
        <!-- End Text Input -->

        <!-- Input with Autocomplete -->
        <div class="form-group row g-mb-25">
            <label class="col-sm-3 col-form-label g-mb-10" for="autocomplete2">Коротка назва кафедри</label>

            <div class="col-sm-9">
                <input name="department[short]" value="{{ $department->short }}" id="autocomplete2" class="form-control form-control-md rounded-0" type="text" data-url="../../../assets/include/ajax/autocomplete-data-1.json">
                <small class="form-text text-muted g-font-size-default g-mt-10">

                </small>
            </div>
        </div>
        <!-- End Input with Autocomplete -->
        <!-- Input with Autocomplete -->
        <div class="form-group row g-mb-25">
            <label class="col-sm-3 col-form-label g-mb-10" for="autocomplete2">Зав. кафедри</label>

            <div class="col-sm-9">
                <input name="department[boss]" value="{{ $department->boss }}" id="autocomplete2" class="form-control form-control-md rounded-0" type="text" data-url="../../../assets/include/ajax/autocomplete-data-1.json">
                <small class="form-text text-muted g-font-size-default g-mt-10">

                </small>
            </div>
        </div>
        <button type="submit" class="btn btn-md u-btn-primary g-mr-10 g-mb-15 g-flex-right">Зберегти</button>
        <!-- End Input with Autocomplete -->
        <hr class="g-brd-gray-light-v4 g-mx-minus-30">

        <h4 class="h6 g-font-weight-700 g-mb-20">Контакна інформація</h4>

        <!-- Text Input with Right Appended Icon -->
        <div class="form-group row g-mb-25">
            <label class="col-sm-3 col-form-label g-mb-10">Адреса кафедри</label>
            <div class="col-sm-9">
                <div class="input-group g-brd-primary--focus">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-location-pin"></i></span>
                    </div>
                    <input name="department[address]" value="{{ $department->address }}" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" placeholder="">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-pencil"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Text Input with Right Appended Icon -->
        <!-- Text Input with Both Appended Icon -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label g-mb-10">Робоча кімната</label>
            <div class="col-sm-9">
                <div class="input-group g-brd-primary--focus">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-map"></i></span>
                    </div>
                    <input name="department[phone_two]" value="{{ $department->phone_two }}" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" placeholder="">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-pencil"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Text Input with Both Appended Icon -->
        <!-- Text Input with Left Appended Icon -->
        <div class="form-group row g-mb-25">
            <label class="col-sm-3 col-form-label g-mb-10">Контакний телефон</label>
            <div class="col-sm-9">
                <div class="input-group g-brd-primary--focus">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-phone"></i></span>
                    </div>
                    <input name="department[phone_one]" value="{{ $department->phone_one }}" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" placeholder="">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-pencil"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Text Input with Left Appended Icon -->

        <!-- Text Input with Both Appended Icon -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label g-mb-10">Електронна адреса</label>
            <div class="col-sm-9">
                <div class="input-group g-brd-primary--focus">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-envelope"></i></span>
                    </div>
                    <input name="department[email]" value="{{ $department->email }}" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" placeholder="">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-pencil"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-md u-btn-primary g-mr-10 g-mb-15 g-flex-right">Зберегти</button>
        <!-- End Text Input with Both Appended Icon -->
        <hr class="g-brd-gray-light-v4 g-mx-minus-30">

        <h4 class="h6 g-font-weight-700 g-mb-20">Континген та штат</h4>

        <!-- Text Input with Right Appended Icon -->
        <div class="form-group row g-mb-25">
            <label class="col-sm-3 col-form-label g-mb-10">Кількість студентів</label>
            <div class="col-sm-9">
                <div class="input-group g-brd-primary--focus">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-people"></i></span>
                    </div>
                    <input name="department[students]" value="{{ $department->students }}" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" placeholder="">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-pencil"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Text Input with Right Appended Icon -->

        <!-- Text Input with Left Appended Icon -->
        <div class="form-group row g-mb-25">
            <label class="col-sm-3 col-form-label g-mb-10">Кількість штатних</label>
            <div class="col-sm-9">
                <div class="input-group g-brd-primary--focus">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-people"></i></span>
                    </div>
                    <input name="department[staff]" value="{{ $department->staff }}" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" placeholder="">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-pencil"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Text Input with Left Appended Icon -->

        <!-- Text Input with Both Appended Icon -->
        <div class="form-group row">
            <label class="col-sm-3 col-form-label g-mb-10">Кількість НПП</label>
            <div class="col-sm-9">
                <div class="input-group g-brd-primary--focus">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-people"></i></span>
                    </div>
                    <input name="department[npp]" value="{{ $department->npp }}" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" placeholder="">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1"><i class="icon-pencil"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-md u-btn-primary g-mr-10 g-mb-15 g-flex-right">Зберегти</button>
        <!-- End Text Input with Both Appended Icon -->
    </form>
    <!-- End General Forms -->
</section>
@endsection
