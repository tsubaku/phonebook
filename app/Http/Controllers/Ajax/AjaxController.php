<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AjaxController extends Controller
{


    public function search(Request $request)
    {
        $post1 = $request->all();
        $name = $post1['name']; //

        echo json_encode(array(
            'post1' => $post1,
            'name' => $name)
        );
    }


}
