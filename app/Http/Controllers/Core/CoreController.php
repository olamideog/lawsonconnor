<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

abstract class CoreController extends Controller {

    use AuthTraits;
    
    public $data = array();
    protected $dir = "";
    protected $modelClass = "";
    private $whiteListedModels = array('login', 'dashboard', 'profile');

    public function __construct() {
        $this->data['dir'] = $this->dir = Route::currentRouteName();
        $this->data['rows'] = array();
        $this->setModel($this->dir);
    }

    public function showForm(){        
        return view($this->dir.'.form', $this->data);
    }

    protected function setModel($modelName = "") {
        if((!class_exists('\App\\'.ucfirst($modelName)) || empty($modelName)) && !in_array($modelName, $this->whiteListedModels)) {
            abort(500, 'Fatal Error: Model "' . $modelName . '" Not Found');
        } else {
            $this->modelClass = '\App\\' . ucfirst($modelName);
        }
    }
}
?>