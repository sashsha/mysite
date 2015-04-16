<?php
/**
 * Created by PhpStorm.
 * User: sasha
 * Date: 15.04.2015
 * Time: 20:18
 */

Class LanguageHelper
{
    /**
     * Returns all locales
     *
     * @return array
     */
    public static function all()
    {
        return array(
           [ 'locale' => 'en',
               'name' => 'English',
           ],
           [ 'locale' => 'ru',
                'name' => 'Русский',
           ],
        );
    }

    /**
     * get corrent locale
     *
     * @return string
     */
    public static function getCurrent()
    {
        $language = Session::get('_locale');

        if (empty($language)){
            $language = App::getLocale();
        }
        $languages = self::all();

        foreach($languages as $value){
            if ($language == $value['locale']){
                return $value;
            }
        }
        return [
             'locale' => 'ru',
             'name' => 'Русский',

        ];
    }


}