<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Items;
use DB;
use Excel;
class ExcelController extends Controller
{
	public function getListItem(){
		$item = Items::all();
		return view('listItem', compact('item'));
	}
    public function importExport()
	{
		return view('Import');
	}
	public function downloadExcel($type)
	{
		$data = Items::get()->toArray();
		return Excel::create('ListItems', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	// public function importExcel(Request $req)
	// {
	// 	if($req->hasFile('import_file')){
	// 		$path = $req->file('import_file')->getRealPath();
	// 		$data = Excel::load($path, function($reader){})->get();
	// 		if(!empty($data) && $data->count()){
	// 			foreach($data as $key =>$value){
	// 				$item = new Items;
	// 				$item->title = $value->title;
	// 				$item->description = $value->description;
	// 				$item->save;
	// 			}
	// 		}
	// 	}
	// 	return back();
	// }
	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['title' => $value->title, 'description' => $value->description];
				}
				if(!empty($insert)){
					DB::table('items')->insert($insert);
					return redirect('listItem');
				}
			}
		}
		return back();
	}
	public function DeleteAll(){
		Items::all()->delete();
		return redirect('listItem');
	}
}
