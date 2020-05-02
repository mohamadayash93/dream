@extends('layouts.app')

@section('navbar')
    @include('partials.navbar')
@overwrite

@section('sidebar')
    @include('sidebar.index')
@overwrite

@section('header')
    @include('partials.header')
@overwrite

@section('content')
    <div class="content">
        @include('partials.filters')
        <div class="card">
            @include('partials.operations')
            <div class="card-body">
                <div class="table-responsive">
                    @if($items->count() > 0)
                        <table class="datatable table table-striped">
                            <thead class="bg-grey">
                            <tr>
                                <th>#</th>
                                @foreach($attributes as $attribute => $type)
                                    <th>{{trans('attributes.'.$attribute)}}</th>
                                @endforeach
                                <th>{{trans('app.added')}}</th>
                                <th>{{trans('app.operations')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    @foreach($attributes as $attribute => $type)
                                        <td>{!! getItemAttributeValue($route , $item , $attribute) !!}</td>
                                    @endforeach
                                    <td>{{$item->created_at->diffForHumans()}}</td>
                                    <td class="text-left">
                                        @include('partials.actions')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info alert-styled-left">
                            <i class="fa fa-info-circle"></i>{!! trans('app.no items message') !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($items->total() > 8)
            <div class="card">
                <div class="card-body">
                    <div class=" d-flex justify-content-center">
                        {{$items->links()}}
                    </div>
                </div>
            </div>
        @endif

    </div>
    @include('modals.delete-modal')
@overwrite