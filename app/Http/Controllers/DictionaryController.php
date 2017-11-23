<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dictionarys;
use DB;

use File;
use Input;

class DictionaryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$dictionarys = Dictionarys::All();
    	
		return view("dictionarys.dictionaryspannel")
		->with("dictionarys", $dictionarys);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view("dictionarys.dictionarycreate");

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		

		$this->validate($request,[
			'qtext' => 'required',
			'atext' => 'required',

			
			]);


		$dictionary = new Dictionarys();
		$imagePath = public_path() . '/images/dictionary/';
		$lastid = DB::table('dictionarys')->select('id')->orderBy('id', 'DESC')->first();
		if($lastid!=null)
		{
			$lastid = $lastid->id + 1;
		}
		else
		{
			$lastid = 1;	
		}
		$directory = $lastid;
		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
		
		
		$photourl1 = "";
		$photourl2 = "";
		
		
		if(Input::file('photourl1')!="")
		{
			if(Input::file('photourl1')->isValid())
			{
				$name =  time()  . '-photo' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/dictionary/" . $directory . '/photos/' .  $name;
			
			}

		}

		if(Input::file('photourl2')!="")
		{
			if(Input::file('photourl2')->isValid())
			{
				$name =  time()  . '-soung' . '.' . $input['photourl2']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/dictionary/" . $directory . '/photos/' .  $name;
			
			}

		}

		$dictionary->qtext = $request->input("qtext");

		$dictionary->atext = $request->input("atext");

		


		$dictionary->active = 0;
		if (Input::get('active') === '1'){$dictionary->active = 1;}

	
	
		$dictionary->photourl1 = $photourl1;
		$dictionary->photourl2 = $photourl2;
		
		$dictionary->save();
		return redirect()->route("dictionarys.index");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		
		$dictionary = Dictionarys::find($id);
		return view('dictionarys.dictionaryedit')->with('dictionary',$dictionary);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
			$this->validate($request,[
			'qtext' => 'required',
			'atext' => 'required',

			
			]);

		$dictionary = Dictionarys::find($id);
			
		$imagePath = public_path() . '/images/dictionary/';
	
		$directory = $id;


		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
	
		$photourl1 = $dictionary->photourl1;
		$photourl2 = $dictionary->photourl2;
		
		if(Input::file('photourl1')!="")
		{
			

			 if(Input::file('photourl1')->isValid())
			 {
				if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}
					


				$name =  time() . '-photo' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/dictionary/" . $directory . '/photos/' .  $name;
			 }

		}

				if(Input::file('photourl2')!="")
		{
			

			 if(Input::file('photourl2')->isValid())
			 {
				if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}
					


				$name =  time() . 'soung' . '.' . $input['photourl2']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/dictionary/" . $directory . '/photos/' .  $name;
			 }

		}
	
		$dictionary->qtext = $request->input("qtext");

		$dictionary->atext = $request->input("atext");
		
		
		$dictionary->photourl1 = $photourl1;
		$dictionary->photourl2 = $photourl2;

		$dictionary->active = 0;
		if (Input::get('active') === ""){$dictionary->active = 1;}


		$dictionary->save();
		return redirect()->route("dictionarys.index");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
			$dictionary = Dictionarys::find($id);

		$photourl1 = $dictionary->photourl1;
	
			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}

		$photourl2 = $dictionary->photourl2;
	
			if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}		
		
		Dictionarys::destroy($id);

		return redirect()->route("dictionarys.index");
	}

	public function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") 
						rrmdir($dir."/".$object); 
					else unlink   ($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}

}
