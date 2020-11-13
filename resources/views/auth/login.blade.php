@extends('adm::layouts.adm')

@section('content')
    <i class="el-icon-edit"></i>
    Login Page Content.
    <el-button @click="visible = true">Button</el-button>
    <el-dialog :visible.sync="visible" title="Hello world">
        <p>Try Element</p>
    </el-dialog>
@stop
