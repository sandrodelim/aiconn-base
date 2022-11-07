<?php 
namespace Aiconn\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return parent::View('home');
    }
}