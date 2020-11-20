<?php

function create($model, $attributes = [], $times = null)
{
	return factory($model, $times)->create($attributes);
}
