<?php

/* @var $items App\Containers\Department\Models\Department */

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
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Кафедри</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <div class="d-flex flex-row-reverse">
                        <div class="py-2">
                            <a href="/department/create" class="btn btn-success me-1 mb-3 rightButton">
                                <i class="fa fa-fw fa-plus me-1"></i> Створити кафедру
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
    <div class="content content-boxed">

        @foreach ($data as $item)
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="d-sm-flex">
                    <div class="ms-sm-2 me-sm-4 py-2 text-center">
                        <a class="item item-rounded bg-primary-blue-op text-dark fs-2 mb-2 mx-auto" >
                            <img src="https://kpi.ua/files/kpi-logo.png" alt="Image Description" style="height: 62px;">
                        </a>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-alt-secondary" href="/department/{{ $item->id }}/edit">
                                <i class="fa fa-pencil-alt text-info"></i>
                            </a>
                            <a class="btn btn-alt-secondary" href="/department/{{ $item->id }}/delete">
                                <i class="fa fa-times text-danger"></i>
                            </a>
                            <a class="btn btn-alt-secondary" href="/department/{{ $item->id }}/dataset">
                                <i class="fa fa-search text-info"></i>
                            </a>
                        </div>
                    </div>
                    <div class="py-2">
                        <a class="link-fx h4 mb-1 d-inline-block text-dark" >
                            {{ $item->name }} ({{ $item->short }})
                        </a>
                        <div class="fs-sm fw-semibold text-muted mb-2">
                            {{ $item->boss }}
                        </div>
                        <p class="text-muted mb-2">
                            {{ $item->username }}
                        </p>
                        <div>
                            <span class="badge bg-success">id: {{ $item->id }}</span>
                            <span class="badge bg-primary">{{ $item->faculty['name'] }}</span>
                            <span class="badge bg-primary">{{ $item->short }}</span>
                            @if($item->vupusk > 0)
                            <span class="badge bg-primary">Випускова</span>
                            @endif
                            <span ><a class="btn btn-sm btn-alt-secondary" href="/department/{{ $item->id }}/category">
                                <i class="fa fa-book text-info"></i>
                            </a></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
