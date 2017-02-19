<?php namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use Guzzle\Tests\Plugin\Redirect;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(5);

        return view('image.index', ['articles' => $articles]);
    }

    /**
     * Show the form for uploading a new resource.
     *
     * @return Response
     */
    public function upload(){
        // Redirect to image upload form
        return view('imageupload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // Store records process
        $image = new Image();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
        if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

            $name = $timestamp. '-' .$file->getClientOriginalName();

            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return $this->create()->with('success', 'Image Uploaded Successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function show(){
        // Show lists of the images

        $images = Image::all();
        return view('image.showLists', compact('images'));
    }
}