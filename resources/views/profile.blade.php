@extends('layouts.app')

@section('navbar')
    @include('partials.navbar')
@overwrite

@section('sidebar')
    @include('sidebar.index')
@overwrite

@section('content')
    <div class="content">
        <form id="create-form" method="post" action="{{route('users.update',Auth::id())}}"
              enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">{{trans('app.attribute')}}</legend>
                        @foreach($attributes as $attribute => $type)
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">{{trans('attributes.'.$attribute)}}</label>
                                <div class="col-lg-9">
                                    @if(in_array($type , ["select" , "options" , "textarea" , "image" , "location" , "boolean"]))
                                        @include('inputs.'.$type)
                                    @else
                                        @include('inputs.text')
                                    @endif
                                    @if(!in_array($type , ["image" , "location"]) && $errors->has($attribute))
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first($attribute) }}</strong>
                                                </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </fieldset>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" form="create-form" class="btn btn-primary">{{trans('app.save')}} <i
                                class="icon-paperplane ml-2"></i></button>
                </div>
            </div>
        </form>
    </div>
@overwrite