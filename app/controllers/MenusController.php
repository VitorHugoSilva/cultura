<?php

class MenusController extends \BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function listar()
    {
        $query = Menu::where(['menu_id' => Input::get('menu')])->orderBy('ordem','asc');
        $superior = Menu::find(Input::get('menu'));

        return View::make('menus.listar')->with([
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
    public function criar($menu_id = null)
    {
        return View::make('menus.criar')->with([
            'menu' => new Menu,
            'menu_id' => $menu_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function salvar()
    {
        $this->clearCache();
        if (Input::has('menu_id')) {
            Menu::find(Input::get('menu_id'))->filhos()->create(Input::all());
        } else {
            Menu::create(Input::all());
        }
        Session::flash('mensagem', 'Salvo com sucesso');

        return Redirect::action('MenusController@listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int      $id
     * @return Response
     */
    public function exibir($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int      $id
     * @return Response
     */
    public function editar($id)
    {
        return View::make('menus.editar')->with([
            'menu' => Menu::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function alterar($id)
    {
        $this->clearCache();
        Menu::find($id)->fill(Input::all())->save();
        Session::flash('mensagem', 'Atualizado com sucesso :)');

        return Redirect::action('MenusController@listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function deletar($id)
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
