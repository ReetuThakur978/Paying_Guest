<?php
namespace App\Controller;
use App\Controller\AppController;

class PayingguestController extends AppController
{
	public function initialize() : void
	{
		parent::initialize();
		// $this->viewBuilder()->setLayout("guestlayout");
	}


	public function index()
	{
        $this->set("title", "Paying_Guest");
	}

	public function register()
	{
        // $this->set("title", "Paying_Guest");
	}


}
