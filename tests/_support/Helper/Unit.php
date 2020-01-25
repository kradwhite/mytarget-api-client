<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use kradwhite\myTarget\api\Client;

class Unit extends \Codeception\Module
{
    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return "GuIjjaTQiEgXDsh59vQLcVMBxYvK9C3qoiYxTmzEeYVpOkarNbp6ZIuVqtWffINPTTLQfWf4TSNCKLJ745Jauq5arGWL8m4UsGDi0ujZ8GyfO31fAqBcT9wcJk2ePYHSwNGLMxILYD5LInB7O68NXvcJATG569N8fFGZEsqjnvtdMknTEHNhsct6jxwBSvecW4P6uGqQT6u26";
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return "0dfSbZ2WAgmSqUNbuSV6XH6Ig1aIRJAGCDkbU2w2IUxCudbHpPBGytgBMvPVDf7q8N48PFrGiUrWNmWfLL0quI0pQLlZAEH4mna20l8HzI1bUN79nzqdQRn4LNOxXabMGfGrq92Ehn6u6w4ixhr7iV3qgl0HU03kenWf0ecqTv0ZsbZS9UqLeEo21RVR7dQM3m3mo34ESb9BoFkReklZLYiDHLF6Y38BmjSsW8f8mbHXbXxWPVd";
    }

    /**
     * @return Client
     */
    public function getApi(): Client
    {
        return new Client($this->getAccessToken(), ['sandbox' => true]);
    }
}
