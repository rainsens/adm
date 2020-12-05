@extends('adm::layouts.body')

@section('content')
    
    
    @component('adm::form.form', [ 'title' => '新增', 'method' => 'POST', 'action' => route('adm.menus.store'), 'style' => 'system'])
        @component('adm::form.dropdown', [ 'label' => '父级菜单', 'name' => 'parent_id', 'placeholder' => '选择父级菜单', 'data' => $select2Menus ])@endcomponent
        @component('adm::form.text', ['label' => '菜单标题', 'name' => 'name', 'placeholder' => '输入菜单标题', 'required' => true])@endcomponent
        @component('adm::form.text', [
            'label' => '菜单图标', 'name' => 'icon', 'placeholder' => '输入菜单图标', 'required' => true,
            'help' => '<a href="http://fontawesome.io/icons" target="_blank">http://fontawesome.io/icons</a>'
        ])@endcomponent
        @component('adm::form.path', ['label' => '访问路径', 'name' => 'url', 'placeholder' => '输入访问路径'])@endcomponent
        @component('adm::form.number', ['label' => '显示顺序', 'name' => 'order', 'start' => 1])@endcomponent
    @endcomponent
    
    
    
@endsection
