<?php
namespace App\Http\Controllers;

class MainController extends Controller {
    public function on() {
        /** @var ProcessHandler $processHandler */
        $processHandler = app()->make('process');
    }
}
