<?php

namespace App\My;

class Flash
{
    protected function setMessage($message, $type='success')
    {
        session()->flash('flash', [
            'message' => $message,
            'type' => $type
        ]);
    }

    public function __call($type, $args)
    {
        $this->setMessage(array_get($args, 0, ':('), $type);
    }

    /*public function error($message)
    {
        $this->setMessage($message, 'error');
    }
    public function success($message)
    {
        $this->setMessage($message);
    }
    public function warn($message)
    {
        $this->setMessage($message, 'warn');
    }
    public function info($message)
    {
        $this->setMessage($message, 'info');
    }*/
}