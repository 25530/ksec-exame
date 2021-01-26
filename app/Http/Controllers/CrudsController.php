<?php

namespace App\Http\Controllers;
use App\Crud;
use Illuminate\Http\Request;
use DB;
class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Crud::latest()->paginate(5);
        return view('index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'    =>  'required',
            'description'     =>  'required',
            'video'         =>  'required|mimes:mp4,webm,oog|max:5000000'
        ]);

        $image = $request->file('video');

        $video = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('video'), $video);
        $form_data = array(
            'title'       =>   $request->title,
            'description'        =>   $request->description,
            'video'            =>   $video
        );

        Crud::create($form_data);

        return redirect('crud')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            $data = Crud::findOrFail($id);
            return view('view', compact('data'));
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    }
    public function edit($id)
    {
        $data = Crud::findOrFail($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = $request->hidden_image;
        $image = $request->file('video');
        if($image != '')
        {
            $request->validate([
                'title'    =>  'required',
                'description'     =>  'required',
                'video'         =>  'mimes:mp4,webm,oog|max:5000000'
            ]);

            $video = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('video'), $video);
        }
        else
        {
            $request->validate([
                'title'    =>  'required',
                'description'     =>  'required'
            ]);
        }

        $form_data = array(
            'title'       =>   $request->title,
            'description'        =>   $request->description,
            'video'            =>   $video
        );
  
        Crud::whereId($id)->update($form_data);

        return redirect('crud')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Crud::findOrFail($id);
        $data->delete();

        return redirect('crud')->with('success', 'Data is successfully deleted');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = DB::table('cruds')->where('title','like', '%'.$search.'%')->paginate(5);
        return view('index', ['data' => $data]);
    }
}
