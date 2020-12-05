{{-- -------------------------------------------------------------------------------------------------------------------
    
    This component is consisted of four parts
    which respectively have:
    1. app/Services/NestableSvc
    2. widget/nestable (only use this part)
    3. widget/nestablerow
    4. widget/nestableitem
    
    === Usage ===
    1. provide a params array.
    
    For instance, class Services/MenuSvc provides the data $nestableData.
    
    @component('adm::widgets.nestable', [
        'params' => [
            'data' => $nestableData,
            'urlCreate' => 'adm.menus.create',
            'urlOrder' => 'adm.menus.order',
            'urlEdit' => 'adm.menus.edit',
            'urlDelete' => 'adm.menus.destroy',
            'urlRefresh' => 'adm.menus.index',
        ]
    ])
    @endcomponent
    
    Notice: the data must include thest three fields: 'id, name, icon'
    
    enjoy.
    
------------------------------------------------------------------------------------------------------------------- --}}

@push('cssfiles')
    <link href="{{ adm_asset('skin/css/nestable.css') }}" rel="stylesheet">
@endpush

@inject('nestable', 'Rainsens\Adm\Widgets\Nestable\Nestable')

@if(isset($params))
    <div class="row table-layout">
        <div class="col-xs-12 va-b prn">
            <menu id="nestable-menu" class="text-right mb10">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary btn-sm">
                        <input data-action="expand-all" type="radio" name="options" id="option1" autocomplete="off" checked>
                        <span class="fa fa-plus-square-o"></span> 展开
                    </label>
                    <label class="btn btn-primary btn-sm">
                        <input data-action="collapse-all" type="radio" name="options" id="option2" autocomplete="off">
                        <span class="fa fa-minus-square-o"></span> 收起
                    </label>
                    <label class="btn btn-success btn-sm ml5 data-create">
                        <span class="fa fa-plus"></span> 新增
                    </label>
                    <label class="btn btn-info btn-sm data-save">
                        <span class="fa fa-save"></span> 保存
                    </label>
                    <label class="btn btn-info btn-sm data-refresh">
                        <span class="fa fa-refresh"></span> 刷新
                    </label>
                </div>
            </menu>
        </div>
    </div>
    
    {{-- For test. <textarea id="nestable-output" class="form-control"></textarea>--}}
    
    <div class="row mt5">
        <div class="col-md-12">
            <div class="dd mb35" id="nestable">
                
                @php $nestable::$params = $params @endphp
                
                @component('adm::widgets.nestable.nestablerow', [
                    'data' => isset($nestable::$params['data']) ? $nestable::$params['data'] : []
                ])
                @endcomponent
                
            </div>
        </div>
    </div>
    
    @push('scriptfiles')
        <script src="{{ adm_asset('skin/js/jquery.nestable.js') }}"></script>
    @endpush

    @push('scripts')
        <script>
            jQuery(document).ready(function() {
            
                let items = [];
                let updateOutput = function(e) {
                    let list = e.length ? e : $(e.target),
                        output = list.data('output');
                    if (window.JSON) {
                        items = (list.nestable('serialize'));
                        
                        // For test.
                        //output.val(window.JSON.stringify(list.nestable('serialize')));
                    }
                };
            
                let nestable = $('#nestable');
                nestable.nestable({
                    group: 1
                }).on('change', updateOutput);
            
                // For test
                //updateOutput(nestable.data('output', $('#nestable-output')));
            
                $('#nestable-menu').on('change', function(e) {
                    let target = $(e.target),
                        action = target.data('action');
                    if (action === 'expand-all') {
                        $('.dd').nestable('expandAll');
                    }
                    if (action === 'collapse-all') {
                        $('.dd').nestable('collapseAll');
                    }
                });
            
                $('.data-save').click(function () {
                	
                	if (!items.length) {
                        return  false;
                    }
                	
                    axios.post('{{ route($params['urlOrder']) }}', {data: items})
                    .then(function (res) {
	
	                    admNotify('system', 'Saved Successfully')
                    	
                    }, function (err) {
                    
                    });
                });
            
                $('.data-create').click(function () {
                    location.href = '{{ isset($nestable::$params['urlCreate']) ? route($nestable::$params['urlCreate']) : '' }}';
                });
                $('.data-refresh').click(function () {
                    location.href = '{{ isset($nestable::$params['urlRefresh']) ? route($nestable::$params['urlRefresh']) : '' }}';
                });
            });
        </script>
    @endpush

@endif
