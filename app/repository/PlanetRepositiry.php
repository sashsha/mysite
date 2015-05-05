<?php

class PlanetRepository
{

    /**
     * @param $paginateCount
     * @return mixed
     */
    public static function all($paginateCount)
    {
        $user = Auth::user();

        if ($user) {
            $planets = Planet::where('user_id', '=', $user->id)->orderBy('created_at', 'DESC');

        } else {

            $planets = Planet::orderBy('created_at', 'DESC');

        }
        
        return $planets->paginate($paginateCount);
    }
}