<div class="card-header header-elements-inline">
    <h5 class="card-title">{{trans('title.'.$title)}}</h5>
    <div class="header-elements">
        <div class="list-icons">
            @if(isset($operations))
                @foreach($operations as $operation)
                    @switch($operation)
                        @case("create")
                        @if($route != "forms")
                            <a href="{{route($route.'.create').'?'.$params}}"
                               class="btn btn-success btn-sm btn-lg">
                                <i class="icon-stack-plus"></i>
                                <span>{{trans('app.create')}}</span>
                            </a>
                        @endif
                        @break
                        @case("edit")
                        <a href="{{route($route.'.edit' , $item->id)}}"
                           class="btn btn-info btn-sm btn-lg">
                            <i class="icon-database-edit2"></i>
                            <span>{{trans('app.edit')}}</span>
                        </a>
                        @break
                        @case("delete")
                        <a href="#" data-id="{{$item->id}}"
                           class="btn btn-danger btn-delete btn-sm btn-lg"
                           data-modal="{{$route}}" data-name="{{$item->name}}"
                           data-toggle="modal" data-target="#delete-modal">
                            <i class="icon-database-remove"></i>
                            <span>{{trans('app.delete')}}</span>
                        </a>
                        @break
                        @case("print")
                        <a href="{{route($route.'.print' , $item->id)}}"
                           class="btn btn-info btn-sm btn-lg">
                            <i class="icon-printer"></i>
                            <span>{{trans('app.print')}}</span>
                        </a>
                        @break
                    @endswitch
                @endforeach
            @endif
        </div>
    </div>
</div>