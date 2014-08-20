<?php

abstract class ResourceController extends BaseController
{
    const MSG_ERRO_FIND      = 'Registro não encontrado';
    const MSG_ERRO_DELETE    = 'Não foi possível deteletar';
    const MSG_SUCESSO_DELETE = 'Deletado com sucesso';
    const MSG_SUCESSO_SALVAR = 'Salvo com sucesso';

    protected static $model = '';

    protected static $pagination = 15;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function listar()
    {
        $query = call_user_func(static::$model . '::search', Input::get('pesquisa', null));
        Input::flash();

        return View::make($this->getViewName(__FUNCTION__))->with([
            'models' =>  $query->paginate(static::$pagination)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function criar()
    {
        return View::make($this->getViewName(__FUNCTION__))->with([
            'model' => new static::$model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function salvar()
    {
        $model = new static::$model(Input::all());

        if ($model->save()) {
            Session::flash('mensagem', self::MSG_SUCESSO_SALVAR);

            return Redirect::action(get_called_class() . '@listar');
        }

        Input::flash();

        return Redirect::action(get_called_class() . '@criar')->withErrors($model->errors());
    }

    /**
     * Show the description resource.
     *
     * @return Response
     */
    public function exibir($id)
    {
        if ($model = call_user_func(static::$model . '::find', $id)) {
            return View::make($this->getViewName(__FUNCTION__))->with([
                'model' => $model
            ]);
        }

        Session::flash('erro', self::MSG_ERRO_FIND);

        return Redirect::action(get_called_class() . '@listar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int      $id
     * @return Response
     */
    public function editar($id)
    {
        if ($model = call_user_func(static::$model . '::find', $id)) {
            return View::make($this->getViewName(__FUNCTION__))->with([
                'model' => $model
            ]);
        }

        Session::flash('erro', self::MSG_ERRO_FIND);

        return Redirect::action(get_called_class() . '@listar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function alterar($id)
    {
        if ($model = call_user_func(static::$model . '::find', $id)) {
            $model->fill(Input::all());
            if ($model->updateUniques()) {
                Session::flash('mensagem', self::MSG_SUCESSO_SALVAR);

                return Redirect::action(get_called_class() . '@listar');
            }

            Input::flash();

            return Redirect::action(get_called_class() . '@editar', $id)->withErrors($model->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int      $id
     * @return Response
     */
    public function deletar($id)
    {
        if (call_user_func(static::$model . '::destroy', $id)) {
            Session::flash('mensagem', self::MSG_SUCESSO_DELETE);
        } else {
            Session::flash('erro', self::MSG_ERRO_DELETE);
        }

        return Redirect::action(get_called_class() . '@listar');
    }

    protected function getViewName($method)
    {
        $default = Meta::getControllerSlug() .'.'. $method;
        return View::exists($default) ? $default : '_layouts.' . $method;
    }
}
