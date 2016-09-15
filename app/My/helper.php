<?php

if(! function_exists('setFlash')){
    function setFlash($message=null)
    {
        if(is_null($message)){
            return app(\App\My\Flash::class);
        }

        return app(\App\My\Flash::class)->success($message);
    }
}