@push('css-files')
    {{--<link href="{{ adm_asset('skin/css/') }}" rel="stylesheet">--}}
@endpush

<div class="panel">
    <div class="panel-heading">
        <div class="pull-left">
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm">
                    <span class="fa fa-filter"></span> Filter
                </button>
            </div>
        </div>
        <div class="pull-right text-right">
            @if($tools)
                @foreach($tools as $tool)
                    {!! $tool !!}
                @endforeach
                    {{--<a href="" type="button" class="btn btn-system btn-sm"><span class="fa fa-plus"></span> 新增</a>
                    <a type="button" class="btn btn-sm btn-default btn-block">Adm Button</a>--}}
            @endif
        </div>
    </div>
    <div class="panel-body pn">
        <div class="table-responsive">
            <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                <thead>
                    <tr class="bg-light">
                        @if(count($columns))
                            
                            <th class="text-center">Select</th>
                            
                            @foreach($columns as $column)
                                <th class="">{{ $column->label ?? $column->name }}</th>
                            @endforeach
                        
                            <th class="text-right">Actions</th>
                            
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(count($items))
                        @foreach($items as $item)
                            <tr>
                                
                                <td class="text-center">
                                    <label class="option block mn">
                                        <input type="checkbox" name="mobileos" value="{{ $item->id }}">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                
                                @foreach($columns as $column)
                                    <td class="">{{ ($name = $column->name) ? $item->$name : '' }}</td>
                                @endforeach
                                
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default br2 btn-sm fs12 dropdown-toggle" data-toggle="dropdown">
                                            {{ trans('adm::adm.action') }} <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            @foreach($item->actions as $action)
                                                @if($action->divide)
                                                    @if($loop->first)
                                                        <li><a href="{{ $action->href() }}">{{ $action->name() }}</a></li>
                                                    @else
                                                        <li class="divider"></li>
                                                        <li><a href="{{ $action->href() }}">{{ $action->name() }}</a></li>
                                                    @endif
                                                @else
                                                    <li><a href="{{ $action->href() }}">{{ $action->name() }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-footer clearfix">
        <div class="pull-left">Showing 1 to 10 of 13 entries</div>
        <div class="pull-right">{{ $items->appends(request()->except('page'))->links() }}</div>
    </div>
</div>

@push('script-files')
    {{--<script src="{{ adm_asset('skin/js/') }}"></script>--}}
@endpush

@push('scripts')
    <script>
        jQuery(document).ready(function () {
        
        });
    </script>
@endpush
