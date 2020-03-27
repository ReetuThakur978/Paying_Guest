<?php
declare(strict_types=1);

namespace App\Controller;
// use Cake\Validation\Validator;


class WebsiteController extends AppController
{
	public function guest()
	{
		$this->set("title", "Paying_Guest");

	}
	public function home()
	{
		$this->set("title", "PG website");

	}

}
