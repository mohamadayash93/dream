<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="datatable table table-bordered table-striped">
                @include('relations.'.$type.'._'.$action)
            </table>
        </div>
    </div>
</div>