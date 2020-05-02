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
        <div class="card">
            @include('partials.operations')
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-bordered table-striped">
                        <thead class="bg-grey">
                        <tr>
                            <th>{{trans('app.attribute')}}</th>
                            <th>{{trans('app.value')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributes as $attribute => $type)
                            <tr>
                                <td>{{trans('attributes.'.$attribute)}}</td>
                                @if($attribute == "image" || strpos($attribute,'image'))
                                    <td colspan="1">
                                        <a href="#" class="list-icons-item btn-view" data-toggle="modal"
                                           data-trigger="hover" data-path="{{$item->$attribute}}"
                                           data-target="#view-file-modal">
                                            <i class="icon-eye"></i>
                                        </a>
                                    </td>
                                @elseif($type == "location")
                                    <td colspan="1">
                                        @include('inputs.location')
                                    </td>
                                @elseif($attribute == "name")
                                   <td>{{ $item->$attribute }}</td>
                                    @else
                                    <td>{!! getItemAttributeValue($route , $item , $attribute) !!}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @foreach($relations as $relation => $type)
            @if($item->$relation()->count() > 0)
                @include('relations.index',["relation" => $relation , "type" => $type])
            @endif
        @endforeach

    </div>
    @include('modals.delete-modal')
    @include('modals.view-file-modal')
@overwrite
