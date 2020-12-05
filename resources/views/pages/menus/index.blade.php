@extends('adm::layouts.body')

@section('content')
    
    <div class="col-md-12">
        <div class="col-md-6 pl5">
            <div class="panel panel-default panel-border top">
                <div class="panel-body">
                    <div class="tray tray-center">
                        
                        @component('adm::widgets.nestable.nestable', [
                            'params' => [
                                'data' => $nestableMenus,
                                'urlCreate' => 'adm.menus.create',
                                'urlOrder' => 'adm.menus.order',
                                'urlEdit' => 'adm.menus.edit',
                                'urlDelete' => 'adm.menus.destroy',
                                'urlRefresh' => 'adm.menus.index',
                            ]
                        ])
                        @endcomponent
                
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            
            @component('adm::forms.form', [ 'title' => '新增', 'method' => 'POST', 'action' => route('adm.menus.store'), 'style' => 'system'])
                @component('adm::forms.dropdown', [ 'label' => '父级菜单', 'name' => 'parent_id', 'placeholder' => '选择父级菜单', 'data' => $select2Menus ])@endcomponent
                @component('adm::forms.text', ['label' => '菜单标题', 'name' => 'name', 'placeholder' => '输入菜单标题', 'required' => true])@endcomponent
                @component('adm::forms.text', [
                    'label' => '菜单图标', 'name' => 'icon', 'placeholder' => '输入菜单图标', 'required' => true,
                    'help' => '<a href="http://fontawesome.io/icons" target="_blank">http://fontawesome.io/icons</a>'
                ])@endcomponent
                @component('adm::forms.path', ['label' => '访问路径', 'name' => 'url', 'placeholder' => '输入访问路径'])@endcomponent
                @component('adm::forms.number', ['label' => '显示顺序', 'name' => 'order', 'start' => 1])@endcomponent
            @endcomponent
            
        </div>
    </div>
    
@endsection
