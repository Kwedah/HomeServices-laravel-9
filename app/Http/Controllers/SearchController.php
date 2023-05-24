<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function autocomplete(Request $req)
    {
        $data = Service::select('name')->where("name","LIKE","%{$req->input('query')}%")->get();
        return response()->json($data);
    }

    public function searchService(Request $req)
    {
        $service_slug = Str::slug($req->q,'-');
        if($service_slug)
        {
            return redirect('/services/'.$service_slug);
        }
        else
        {
            return back();
        }
    }


// public function searchService(Request $req)
// {
//     $service_slug = Str::slug($req->q, '-');
//     $service = Service::where('slug', $service_slug)->first();
//     if($service){
//       return redirect('/services/' . $service_slug);
//     }else{
//       session()->flash('message', 'No services found, please try with different input.');
//       return back();
//     }
//   }

}
