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
            <a href="" type="button" class="btn btn-system btn-sm">新增</a>
            <a href="" type="button" class="btn btn-info btn-sm">导出</a>
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
                                        <input type="checkbox" name="mobileos" value="FR">
                                        <span class="checkbox mn"></span>
                                    </label>
                                </td>
                                
                                @foreach($columns as $column)
                                    {{--<td class="w100">
                                        <img class="img-responsive mw40 ib mr10" title="user" src="assets/img/stock/products/thumb_1.jpg">
                                    </td>--}}
                                    <td class="">{{ ($name = $column->name) ? $item->$name : '' }}</td>
                                @endforeach
                                
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default br2 btn-sm fs12 dropdown-toggle" data-toggle="dropdown">
                                            Actions <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li><a href="#">Edit</a></li>
                                            <li><a href="#">Show</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Delete</a></li>
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
