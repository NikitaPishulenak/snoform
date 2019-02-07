<?php

return array(
	'snoform/enter' => 'user/login',
	'snoform/logout' => 'user/logout', //вход пользователя
	'snoform/register' => 'user/register', //регистрация пользователя
	'snoform/cabinet/edit/saveForm' => 'main/saveF',
	'snoform/cabinet/edit/([0-9]+)' => 'cabinet/editForm/$1',
	'snoform/cabinet' => 'cabinet/index',

	'snoform/csv' => 'admin/downloadCSV',
	'snoform/rep' => 'admin/showReports',
	'snoform/admin' => 'admin/index',
	'snoform/sendForm' => 'main/sendF',
	'snoform' => 'main/index'
	
);