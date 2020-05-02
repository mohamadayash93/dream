<!-- Search field -->
<div class="card">
    <div class="card-body">
        <form id="filter-form" method="get" action="{{route($route.'.index')}}">
            <div class="input-group mb-3">
                <div class="form-group-feedback form-group-feedback-left">
                    <input name="query" type="text" class="form-control form-control-sm"
                           placeholder="{{trans('app.search')}}" value="{{request('query')}}">
                    <div class="form-control-feedback form-control-feedback-sm">
                        <i class="icon-search4 text-muted"></i>
                    </div>
                </div>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary btn-sm btn-lg">{{trans('app.go')}}</button>
                </div>
            </div>
            @php($value_var = "text_".getLocale())
            <div class="d-md-flex align-items-md-center flex-md-wrap text-center text-md-left">
                <ul class="list-inline list-inline-condensed mb-0">
                    @foreach($filters as $filter => $type)
                        <li class="list-inline-item dropdown">
                            <a href="#" class="btn btn-link text-default dropdown-toggle"
                               data-toggle="dropdown">
                                <i class="icon-stack2 mr-2"></i>
                                {{trans('attributes.'.$filter)}}
                            </a>

                            <div class="dropdown-menu">
                                @if($type == "select")
                                    @foreach(getSelectItems($route , $filter) as $item)
                                        <a href="{{url($route.'/index?'.$filter.'='.$item->id)}}"
                                           class="dropdown-item">{{$item->name}}</a>
                                    @endforeach
                                @elseif($type == "options")
                                    @php($value_var = "text_".getLocale())
                                    @foreach(getSelectOptions($route , $filter) as $item)
                                        <a href="{{route($route.'.index').'?'.$filter.'='.$item->code}}"
                                           class="dropdown-item">{{$item->$value_var}}</a>
                                    @endforeach
                                @endif
                            </div>
                        </li>
                    @endforeach

                    <li class="list-inline-item">
                        <a href="{{route($route.'.index')}}" class="btn btn-link text-default">
                            <i class="icon-reload-alt mr-2"></i>{{trans('app.reset')}}
                        </a>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>
<!-- /search field -->