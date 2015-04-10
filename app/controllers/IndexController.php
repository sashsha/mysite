<?php

class IndexController extends BaseController
{

    /**
     * Homepage
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $user = Auth::user();
        if ($user) {
            $planets = Planet::where('user_id', '=', $user->id)->orderBy('created_at', 'DESC')->take(6)->get();
            $counter = Planet::where('user_id', '=', $user->id)->count();
        } else {
            $planets = Planet::orderBy('created_at', 'DESC')->take(6)->get();
            $counter = Planet::count();
        }

        return View::make('index', array(
                                     'planets'  => $planets,
                                     'counter'  => $counter,
                                 ));
    }
}
