<?php

namespace App\Controllers\Contacts;

use App\Kernel\Controller\Controller;

class IndexContactsController extends Controller
{
    public function index(){
        $this->view("/contacts/contacts");
    }
}