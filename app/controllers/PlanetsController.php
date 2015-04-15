<?php

class PlanetsController extends \BaseController
{

    /**
     * Get form for add planets
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $user = Auth::user();

        if (!$user) {
            //App::abort(403, Lang::get('messages.create_only_logged'));
            $error = [
                'code' => 403,
                'message' => Lang::get('messages.create_only_logged'),
            ];
            return View::make('errors/error', array('error' => $error));
        }
        $planet = null;
        return View::make('planets/add', array('planet' => $planet));
    }

    /**
     * Create planets
     *
     * @return $this|\Illuminate\Http\RedirectResponse|string
     */
    public function store() {
        $user = Auth::user();

        if (!$user) {
            return Lang::get('messages.create_only_logged');
        }

        $data = Input::all();

        $validation = Validator::make($data, Planet::getValidationRules());
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }

        if (Auth::check()) {
            $data['user_id'] = Auth::user()->id;
        }
        $planet = Planet::create($data);
        return Redirect::to(action('PlanetsController@show', array($planet->id)));
    }

    /**
     * Get planet
     *
     * @param integer $planetId
     * @return \Illuminate\View\View
     */
    public function show($planetId) {
        $planet = Planet::find($planetId);

        // Если такой планеты нет, то вернем пользователю ошибку 404 - Не найдено
        if (!$planet) {
            //App::abort(404);
            $error = [
                'code' => 404,
                'message' => Lang::get('messages.planet_not_found'),
            ];
            return View::make('errors/error', array('error' => $error));
        }

        // Увеличим счетчик просмотров планеты
        $planet->views++;
        $planet->save();

        return View::make('planets/view', array('planet' => $planet));
    }

    /**
     * Delete planet
     *
     * @param integer $planetId
     * @return Response
     */
    public function destroy($planetId)
    {
        $planet = Planet::find($planetId);

        if (!$planet) {
            $error = [
                'code' => 404,
                'message' => Lang::get('messages.planet_not_found'),
            ];
            return View::make('errors/error', array('error' => $error));
        }

        /**
         * @var Planet $planet
         */
        if (!$planet->isAuthor()) {
            return Lang::get('messages.delete_only_logged');
        }

        $planetName = $planet->planet;
        $planet->delete();

        return View::make('planets/delete', array('planetName' => $planetName));
    }

    /**
     * Edit planet
     *
     * @param integer $planetId
     * @return \Illuminate\View\View|string
     */
    public function edit($planetId)
    {
        $planet = Planet::find($planetId);
        if (!$planet) {
            $error = [
                'code' => 404,
                'message' => Lang::get('messages.planet_not_found'),
            ];
            return View::make('errors/error', array('error' => $error));
        }

        if (!$planet->isAuthor()) {
            return Lang::get('messages.edit_only_logged');
        }

        return View::make('planets/edit', array('planet' => $planet));
    }

    /**
     * Update planets
     *
     * @param $planetId
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function update($planetId)
    {
        $planet = Planet::find($planetId);
        if (!$planet) {
            $error = [
                'code' => 404,
                'message' => Lang::get('messages.planet_not_found'),
            ];
            return View::make('errors/error', array('error' => $error));
        }

        if (!$planet->isAuthor()) {
            return Lang::get('messages.delete_only_logged');
        }

        $data = Input::all();

        $validation = Validator::make($data, Planet::getValidationRules());
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }

        //var_dump($data);die();
        $planet->sector = $data['sector'];
        $planet->level = $data['level'];
        $planet->star = $data['star'];
        $planet->system = $data['system'];
        $planet->planet = $data['planet'];
        $planet->biome = $data['biome'];
        $planet->x = $data['x'];
        $planet->y = $data['y'];
        $planet->version = $data['version'];
        $planet->os = $data['os'];
        $planet->comment = $data['comment'];
        $planet->save();

        return Redirect::to(action('PlanetsController@show', array($planet->id)));
    }
}
