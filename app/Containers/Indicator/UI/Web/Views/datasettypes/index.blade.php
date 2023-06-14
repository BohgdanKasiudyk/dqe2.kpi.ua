<?php

/* @var $datasetstypes App\Containers\Indicator\Models\DatasetTypes */

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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Набори даних</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <div class="d-flex flex-row-reverse">
                        <div class="py-2">
                            <a href="/dataset/create" class="btn btn-success me-1 mb-3 rightButton">
                                <i class="fa fa-fw fa-plus me-1"></i> Створити набір даних
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="content content-boxed">
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-vcenter fs-sm">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th class="d-none d-sm-table-cell text-center">Набір даних</th>
                            <th>Індикатор</th>
                            <th>Максимальне значення</th>
                            <th class="d-none d-xl-table-cell">Коефіцієнт</th>
                            <th class="d-none d-xl-table-cell text-center">Випускові</th>
                            <th class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($datasetstypes as $datasettype)
                            <tr>
                                <td class="text-center">
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">
                                        <strong>{{ $datasettype->id }}</strong>
                                    </a>
                                </td>
                                <td class="d-none d-sm-table-cell text-left">{{ $datasettype->name }}</td>
                                <td class="fs-base">
                                    <span class="badge rounded-pill @if($datasettype->indicator->graduating>0) bg-success @else bg-info @endif">{{ $datasettype->indicator->name }}</span>

                                </td>
                                <td class="d-none d-xl-table-cell">
                                    {{ $datasettype->max_value }}
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    {{ $datasettype->coefficient }}
                                </td>
                                <td class="d-none d-xl-table-cell text-center">
                                    @if($datasettype->indicator->graduating>0) Так @else Ні @endif
                                </td>
                                <td class="text-center fs-base">
                                    <a class="btn btn-sm btn-alt-secondary" href="/dataset/{{ $datasettype->id }}/edit">
                                        <i class="fa fa-pencil-alt text-info"></i>
                                    </a>
                                    <a class="btn btn-sm btn-alt-secondary" href="/dataset/{{ $datasettype->id }}/delete">
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
