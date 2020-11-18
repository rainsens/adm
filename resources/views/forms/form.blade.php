<form method="{{ isset($method) ? $method : '' }}"
      action="{{ isset($action) ? $action : '' }}"
      class="form-horizontal {{ isset($class) ? $class : '' }}"
      role="form">@csrf
    <div class="panel {{ isset($style) ? 'panel-'.$style : '' }} panel-border top">
        <div class="panel-heading">
            <span class="panel-title"><b>{{ isset($title) ? $title : 'Form Title' }}</b></span>
        </div>
        <div class="panel-body">
            
            {{ $slot }}
        
        </div>
        <div class="panel-footer text-right">
            <button type="reset" class="btn btn-default btn-sm ph25">重置</button>
            <button type="submit" class="btn btn-system btn-sm ph25">提交</button>
        </div>
    </div>
</form>
