<?php

class Sector extends Eloquent {

    protected $fillable = array(

       'name',
        'description',
    );



    public static function getValidationRules() {
        $validation = array(
            'level'     => 'required',
        );

        return $validation;
    }

    /**
     * Return stars
     *
     * @return mixed
     */
    public function stars()
    {
        return $this->hasMany('Star');
    }

    /**
     * Return planets
     *
     * @return mixed
     */
    public function planets()
    {
        return $this->hasManyThrough( 'Planet', 'Star');
    }
}
