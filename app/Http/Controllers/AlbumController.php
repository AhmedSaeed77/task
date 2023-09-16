<?php

namespace App\Http\Controllers;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\File;
use App\Models\AlbumImage;
use App\ImageUpload;

class AlbumController extends Controller
{
    public function index()
    {
        return view('albums.index');
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Album::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //$edit =  route('activitybookings.editactivitybookings', $row->id);
                    // $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    //$actionBtn = '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';

                    $edit =  route('album.albumedit',$row->id) ;
                    $DeleteAndMove =  route('album.deleteandmove', $row->id);
                    $actionBtn = '<a href=" ' . $edit . '" class="edit btn btn-success btn-sm m-1">Edit</a>';
                    $actionBtn .= '<a href="javascript:void(0)" value="' . $row->id . '" class="delete btn btn-danger btn-sm">Delete All</a>';
                    $actionBtn .= '<a href=" ' . $DeleteAndMove . '" class="edit btn btn-dark btn-sm m-1">DeleteAndMove</a>';

                    return $actionBtn;
                })
                ->filter(
                    function ($instance) use ($request) {
                        if (request()->has('name')) {
                            $instance->where(function ($w) use ($request) {
                                $name = $request->get('name');
                                $w->orWhere('type', 'LIKE', "%$name%");
                            });
                        }
                    },
                  true
                )
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function add()
    {
        return view('albums.addalbum');
    }

    public function storedata(Request $request)
    {
        //dd($request);
        $imageUpload = new Album();
        $imageUpload->name = "hhh";
        $imageUpload->user_id = Auth::user()->id;
        $imageUpload->save();

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/dropzone', $filename);
            if($path)
            {
                $album = new AlbumImage();
                $imageUpload->images()->create([
                                                    'name' => $imageUpload->name,
                                                    'album_id'=> $imageUpload->id,
                                                    'image' => $filename,
                                                ]);
                return response()->json(['upload' => 'success',200]);
            }
            else
            {
                return response()->json(['upload' => 'failed',401]);
            }
        }

        return redirect()->route('album.index'); 
    }

    public function edit($id)
    {
        $album = Album::find($id);
        return view('albums.editalbum', ['album'=>$album]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            
          ],[
             'name'=>' ألاسم المقال مطلوب ',
                       ]);

        //$album = new Album();
        $album = Album::find($id);
        $album->name = $request->name;
        $album->user_id = Auth::user()->id;
        $album->save();

        if($request->file('file'))
        {
            $albumimage = AlbumImage::where('album_id', $album->id)->get();

                foreach($albumimage as $image)
                {
                    $image->delete();
                    if (File::exists('images/albums/' .$image->image)) 
                    {
                        File::delete('images/albums/'.$image->image);
                    }
                }
            foreach($request->file('images') as $image)
            {
                $albumimage = new AlbumImage();
                $albumimage->name = $album->name;

                $file = $image;
                $filename = $file->getClientOriginalName();
                $file->move('images/albums', $filename);
                $albumimage->image = $filename;

                $albumimage->album_id = $album->id;
                $albumimage->save();
            }
        }
        return redirect()->route('album.index');
    }

    public function delete(Request $trquest)
    {
        $album = Album::find($trquest->id);
        //dd($album);
        $album->images()->delete();
        $album->delete();
        return redirect()->route('album.index');
    }

    public function deleteandmove(Request $request,$id)
    {
        $lastalbum = Album::latest()->limit(1)->first();
        //dd( $lastalbum );
        $album = Album::find($request->id);

        $albumimage = $album->images;

        foreach($albumimage as $image)
        {
            $image->name = $lastalbum->name ;
            $image->album_id = $lastalbum->id ;
            $image->save(); 
            
        }
        $album->delete();
       
       return redirect()->route('album.index');
    }
}
