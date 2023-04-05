<?php

namespace App\Services;

use App\Models\Notice;

class NoticeService
{
    public function get($id = null)
    {
        if ($id) {
            return Notice::findOrFail($id);
        }

        return Notice::get();
    }

    public function create($data)
    {
        $notice = new Notice($data);
        $notice->save();
        
        return $notice;
    }

    public function update($data, $id)
    {
        $notice = Notice::find($id);
        $notice->update($data);
        return $notice;
    }

    public function delete($id)
    {
        $notice = Notice::findOrFail($id);
        return $notice->delete();
    }

}
