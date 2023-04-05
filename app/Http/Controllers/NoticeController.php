<?php

namespace App\Http\Controllers;

use App\Services\NoticeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
{
    protected $noticeService;

    public function __construct(NoticeService $noticeService)
    {
        $this->noticeService = $noticeService;
    }

    public function index()
    {
        $notices = $this->noticeService->get();
        return response()->json($notices);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'details' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()->all()], 400);
        }
        
        $notice = $this->noticeService->create($validation->getData());

        return response()->json($notice);
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'details' => 'required',
            'category_id' => 'required',
        ]);

        $updated = $this->noticeService->update($data, $id);

        return response()->json($updated);
    }

    public function show($id)
    {
        $notice = $this->noticeService->get($id);
        return response()->json($notice);
    }

    public function destroy($id)
    {
        $this->noticeService->delete($id);

        response()->json(array(
            'success' => true,
        ));
    }

}
