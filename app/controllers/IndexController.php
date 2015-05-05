<?php
use \PlanetRepository;

class IndexController extends BaseController
{

    /**
     * Homepage
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $planets = PlanetRepository::all(3);
        return View::make('index', ['planets' => $planets]);
    }
}
