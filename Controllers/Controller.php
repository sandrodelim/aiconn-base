<?php 
namespace Aiconn\Controller;

abstract class Controller 
{
    private $VIEW_PATH;

    public function __construct() {
        $this->VIEW_PATH = __DIR__ . '/../Views/';
    }

    public function View(string $view, array $data = null) : string
    {
        extract($data);
        ob_start();
        require_once($this->VIEW_PATH . $view);
        $html = ob_get_clean();
        return $html;
    }
}