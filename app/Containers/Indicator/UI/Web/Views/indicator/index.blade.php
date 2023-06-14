<?php

/* @var $indicators App\Containers\Indicator\Models\Indicator */

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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Індикатори </h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <div class="d-flex flex-row-reverse">
                        <div class="py-2">
                            <a href="/indicator/create" class="btn btn-success me-1 mb-3 rightButton">
                                <i class="fa fa-fw fa-plus me-1"></i> Створити Індикатор
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
                            <th class="d-none d-sm-table-cell text-center">Індикатори</th>
                            <th>Категорії політики</th>
                            <th class="d-none d-xl-table-cell">Коефіцієнт</th>
                            <th class="d-none d-xl-table-cell text-center">Випускові</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($indicators as $indicator)
                            <tr>
                                <td class="text-center">
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">
                                        <strong>{{ $indicator->id }}</strong>
                                    </a>
                                </td>
                                <td class="d-none d-sm-table-cell text-left">{{ $indicator->name }}</td>
                                <td class="fs-base">
                                    <span class="badge rounded-pill @if($indicator->graduating>0) bg-success @else bg-info @endif">{{ $indicator->category->name }}</span>

                                </td>
                                <td class="d-none d-xl-table-cell">
                                    {{ $indicator->coefficient }}
                                </td>
                                <td class="d-none d-xl-table-cell text-center">
                                    @if($indicator->graduating>0) Так @else Ні @endif
                                </td>
                                <td class="text-center fs-base">
                                    <a class="btn btn-sm btn-alt-secondary" href="/indicator/{{ $indicator->id }}/edit">
                                        <i class="fa fa-pencil-alt text-info"></i>
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary" href="/indicator/{{ $indicator->id }}/delete">
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
