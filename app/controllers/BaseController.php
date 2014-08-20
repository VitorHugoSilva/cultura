 <?php

 abstract class BaseController extends Controller 
 {
    public function __construct()
    {
        $this->beforeFilter('@setupMenu');
    }

    public function setupMenu()
    {
        $menus = Cache::rememberForever('menu', function () {
            return Menu::with('filhos.filhos.filhos')->principais()->get();
        });

        View::share('menus', $menus);
    }
 }
