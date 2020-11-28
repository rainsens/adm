<?php

function create($model, $attributes = [], $times = null)
{
	return factory($model, $times)->create($attributes);
}

function createAdmUser($attributes = [], $times = null)
{
	return create(\Rainsens\Adm\Models\AdmUser::class, $attributes, $times);
}
