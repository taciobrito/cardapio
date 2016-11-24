<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Mesa\MesaDao;

class HomeController extends Controller{
	private $mesa;

	public function __construct(MesaDao $mesaDao){
		parent::__construct();
		$this->mesa = $mesaDao;
	}

	public function index(){
		$this->view->set('mesas', $this->mesa->listaTodos());
		$this->view->render('home');
	}
}