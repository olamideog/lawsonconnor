<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Models
abstract class AdminCoreController extends Controller
{
	public $data = array();
	protected $dir = "";
	protected $modelClass = "";
	private $whiteListedModels = array('login', 'dashboard', 'profile');

	use AdminAuthTraits;

	public function __construct(){
		$this->data['dir'] = $this->dir = Route::currentRouteName();
		$this->data['rows'] = array();
		$this->setModel($this->dir);
	}
	
	public function index(){
		$this->data['rows'] = $this->modelClass::all();
		return view('_admin.'.$this->dir.'.index', $this->data);
	}

	public function showForm($itemId = 0){
		if($itemId > 0)
		{
			$this->data['rows'] = $this->modelClass::where($this->dir.'_id', $itemId)
										->first();
		}
		return view('_admin.'.$this->dir.'.form', $this->data);
	}

	public function addItem(Request $request){
		//code
	}

	public function editItem(Request $request){
		//code
	}

	public function deleteItem($itemId){
		//code
	}

    protected function setModel($modelName=""){
		if((!class_exists('\App\\'.ucfirst($modelName)) || empty($modelName)) && !in_array($modelName, $this->whiteListedModels))
		{
			abort(500, 'Fatal Error: Model "'.$modelName.'" Not Found');
		}else{
			$this->modelClass = '\App\\'.ucfirst($modelName);
		}
    }
}
?>