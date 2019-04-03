<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Number;

class AjaxController extends Controller
{
    /**
     * Search for a contact by partially entered number and/or contact name.
     * @param Request $request
     */
    public function search(Request $request)
    {
        $post = $request->all();
        $contactName = $post['contactName'];
        $contactNumber = $post['contactNumber'];

        $numbers = Number::where('number', 'LIKE', '%'.$contactNumber.'%')
            ->where('name', 'LIKE', '%'.$contactName.'%')
            ->get();                                        //sorted contacts
        $amount_numbers=sizeof($numbers);                   //amount contacts

        echo json_encode(array(
                'numbers' => $numbers,
                'amount_numbers' => $amount_numbers
            )
        );
    }


}
