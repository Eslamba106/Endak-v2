<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Services\PostServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class PostController extends Controller
{
    public $post_service;

    public function __construct(PostServices $post_service)
    {
        $this->post_service = $post_service;
    }

    public function index($id)
    {
        $posts = $this->post_service->getAllWith('department_id', $id);
        // dd($posts);
        return view('front_office.posts.all', compact('posts'));
    }
    public function create($id)
    {
        // dd($id);
        $department = Department::findOrFail($id);
        return view('front_office.posts.create', compact('department'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "department_id" => "required",
        ]);
        $user = auth()->user()->id;
        $data = $request->all();
        $data['user_id'] = $user;
        $this->post_service->store($data);
        return redirect()->route('web.posts' , $request->department_id)->with('success','Add Seccessfully');
    }
    public function show($id)
    {
        $post = $this->post_service->show($id);
        // dd($posts);
        return view('front_office.posts.show', compact('post'));
    }





    public function uploadLargeFiles(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('videos', $file, $fileName);
            $request->session()->put('sharedValue', $path);
            // delete chunked file
            unlink($file->getPathname());
            return $path;
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true];
    }
}
