<?php

class MenusController extends \BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = Menu::where(['menu_id' => Input::get('menu')])->orderBy('ordem','asc');
        $superior = Menu::find(Input::get('menu'));

        return View::make('menus.index')->with([
            'itens' => $query->get(),
            'trilha' =>   ($superior) ? $superior->superiores() : [],
            'superior' => $superior
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($menu_id = null)
    {
        return View::make('menus.create')->with([
            'menu' => new Menu,
            'menu_id' => $menu_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->clearCache();
        if (Input::has('menu_id')) {
            Menu::find(Input::get('menu_id'))->filhos()->create(Input::all());
        } else {
            Menu::create(Input::all());
        }
        Session::flash('mensagem', 'Salvo com sucesso');

        return Redirect::action('MenusController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int      $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int      $id
     * @return Response
     */
    public function edit($id)
    {
        return View::make('menus.edit')->with([
            'menu' => Menu::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function update($id)
    {
        $this->clearCache();
        Menu::find($id)->fill(Input::all())->save();
        Session::flash('mensagem', 'Atualizado com sucesso :)');

        return Redirect::action('MenusController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->clearCache();
        $menu = Menu::find($id);
        if ($menu && $menu->podeDeletar()) {
            $menu->delete();
            Session::flash('mensagem', 'Deletado com sucesso');
        } else {
            Session::flash('erro', 'Falha ao deletar');
        }

        return Redirect::back();
    }

    private function clearCache()
    {
        Cache::forget('menu');
    }

}
