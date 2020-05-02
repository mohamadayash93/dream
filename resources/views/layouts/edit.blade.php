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
        <form id="edit-form" method="post" action="{{route($route.'.update',$item->id)}}"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
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
                                    <td class="form-group form-group-feedback">
                                        @switch($type)
                                            @case("select")
                                            @include('inputs.select' , ['item' => $item])
                                            @break
                                            @case("options")
                                            @include('inputs.options' , ['item' => $item])
                                            @break
                                            @case("textarea")
                                            @include('inputs.textarea' , ['item' => $item])
                                            @break
                                            @case("location")
                                            @include('inputs.location' , ['item' => $item])
                                            @break
                                            @case("boolean")
                                            @include('inputs.boolean' , ['item' => $item])
                                            @break
                                            @case("image")
                                            <a href="#" class="list-icons-item btn-view" data-toggle="modal"
                                               data-trigger="hover" data-path="{{$item->$attribute}}"
                                               data-target="#view-file-modal">
                                                <i class="icon-eye"></i>
                                            </a>
                                            @include('inputs.image' , ['item' => $item])
                                            @break

                                            @default
                                            @include('inputs.text' , ['item' => $item])
                                            @break
                                        @endswitch
                                        @if(!in_array($type , ["image" , "location"]) && $errors->has($attribute))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first($attribute) }}</strong>
                                                </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" form="edit-form" class="btn bg-primary"><i
                                class="icon-checkmark2 font-size-base mr-1"></i> {{trans('app.save')}}</button>
                </div>
            </div>

        </form>
    </div>
    @include('modals.view-file-modal')
@overwrite