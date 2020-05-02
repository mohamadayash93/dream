<div class="list-icons list-icons-extended">
    <a href="{{route($route.'.show',[$item->id])}}{{getRouteParameters()}}"
       class="list-icons-item" data-popup="tooltip"
       title="{{trans('app.view')}}">
        <i class="icon-eye"></i>
    </a>
    <a href="{{route($route.'.edit',[$item->id])}}{{getRouteParameters()}}"
       class="list-icons-item" data-popup="tooltip"
       title="{{trans('app.edit')}}">
        <i class="icon-database-edit2"></i>
    </a>
    <a href="#" data-id="{{$item->id}}" class="list-icons-item btn-delete"
       data-modal="{{$route}}"
       data-name="{{$item->name}}"
       data-popup="tooltip"
       title="{{trans('app.delete')}}" data-toggle="modal" data-trigger="hover"
       data-target="#delete-modal">
        <i class="icon-database-remove"></i>
    </a>

    @foreach($actions as $action)
        <a href="{{route($route.'.'.$action,[$item->id])}}{{getRouteParameters()}}"
           class="list-icons-item" data-popup="tooltip"
           title="{{trans('app.'.$action)}}">
            <i class="icon-{{getActionIcon($action)}}"></i>
        </a>
    @endforeach
</div>