<?php

use Rainsens\Adm\Tests\Dummy\Models\User;

function createAdmUser($attributes = [], $times = null)
{
	return factory(User::class, $times)->create($attributes);
}
