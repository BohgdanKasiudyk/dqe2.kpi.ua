<?php

/* @var $dataset App\Containers\Department\Models\DepartmentsDatasets */
/* @var $department App\Containers\Department\Models\Department*/


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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Набори даних для {{$department->name}} </h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <div class="d-flex flex-row-reverse">
                        <div class="py-2">
                            <a href="dataset/create" class="btn btn-success me-1 mb-3 rightButton">
                                <i class="fa fa-fw fa-plus me-1"></i> Додати набір даних
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
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
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-vcenter fs-sm">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th class="d-none d-sm-table-cell text-center">Назва</th>
                            <th>Значення</th>
                            <th class="d-none d-xl-table-cell">Коефіцієнт</th>
                            <th class="d-none d-xl-table-cell text-center">Максимальне значення</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dataset as $data)
                            <tr>
                                <td class="text-center">
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">
                                        <strong>{{ $data->id }}</strong>
                                    </a>
                                </td>
                                <td class="d-none d-sm-table-cell text-left">{{ $data->datasettype->name }}</td>
                                <td class="d-none d-xl-table-cell">
                                    {{ $data->value }}
                                </td>
                                <td class="d-none d-xl-table-cell text-center">
                                    {{$data->datasettype->coefficient }}
                                </td>
                                <td class="d-none d-xl-table-cell text-center">
                                    {{$data->datasettype->max_value }}
                                </td>
                                <td class="text-center fs-base">
                                    <a class="btn btn-sm btn-alt-secondary" href="dataset/{{ $data->id }}/edit">
                                        <i class="fa fa-pencil-alt text-info"></i>
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary" href="dataset/{{$data -> id}}/delete">
                                        <i class="fa fa-fw fa-times text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
