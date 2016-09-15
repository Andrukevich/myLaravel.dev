<?php

namespace App\My;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AddPhoto
{
   
    private $model;
    private $request;

    public function __construct(Model $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function save()
    {
        if ($this->request->hasFile('images')) {
            foreach ($this->request->file('images') as $item) {
                $path = $item->store('orders', 'orders');
                $this->model->image()->create([
                    'path' => $path
                ]);
                \Image::make($path)
                    ->fit(80)
                    ->save($this->makeName($path));
            }
        }
    }

    private function makeName($path)
    {
        list($folder, $img_name) = explode('/', $path);

        return $folder . '/th_' . $img_name;
    }
}