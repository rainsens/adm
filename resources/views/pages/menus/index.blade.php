@extends('layouts.app')

@section('content')
    
    @component('adm::partials.breadcrumb', ['current' => '菜单管理'])@endcomponent
    
    <section id="content" class="table-layout animated fadeIn">
        <div class="row">
            <div class="col-md-6 pl5">
                <div class="panel panel-default panel-border top">
                    <div class="panel-body">
                        <div class="tray tray-center">
                            
                            @component('adm::widgets.nestable', [
                                'params' => [
                                    //'data' => $nestableMenus,
                                    'urlCreate' => 'menu.create',
                                    'urlOrder' => 'menu.order',
                                    'urlEdit' => 'menu.edit',
                                    'urlDelete' => 'menu.destroy',
                                    'urlRefresh' => 'menu.index',
                                ]
                            ])
                            @endcomponent
                    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                
                @component('form.form', [ 'title' => '新增', 'method' => 'POST', 'action' => route('menu.store'), 'style' => 'system'])
                    @component('form.dropdown', [ 'label' => '父级菜单', 'name' => 'parent_id', 'placeholder' => '选择父级菜单', 'data' => $select2Menus ])@endcomponent
                    @component('form.text', ['label' => '菜单标题', 'name' => 'name', 'placeholder' => '输入菜单标题', 'required' => true])@endcomponent
                    @component('form.text', [
                        'label' => '菜单图标', 'name' => 'icon', 'placeholder' => '输入菜单图标', 'required' => true,
                        'help' => 'For more icons please see <a href="http://fontawesome.io/icons" target="_blank">http://fontawesome.io/icons</a>'
                    ])@endcomponent
                    @component('form.path', ['label' => '访问路径', 'name' => 'url', 'placeholder' => '输入访问路径'])@endcomponent
                    @component('form.number', ['label' => '显示顺序', 'name' => 'order', 'start' => 1])@endcomponent
                @endcomponent
                
            </div>
        </div>
    </section>
    
@endsection
