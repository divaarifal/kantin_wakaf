<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index($page)
    {
        $contents = Content::where('page', $page)->get()->groupBy('section');
        return view('admin.pages.edit', compact('contents', 'page'));
    }

    public function update(Request $request, $page)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            // Check if input name format is content_{id}
            if (str_starts_with($key, 'content_')) {
                $id = str_replace('content_', '', $key);
                $content = Content::find($id);

                if ($content) {
                    $content->update(['content' => $value]);
                }
            }
        }

        // Handle Image Uploads
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $id => $file) {
                $content = Content::find($id);
                if ($content) {
                    // Delete old image if exists
                    if ($content->content && Storage::disk('public')->exists($content->content)) {
                        Storage::disk('public')->delete($content->content);
                    }
                    
                    $path = $file->store('contents', 'public');
                    $content->update(['content' => $path]);
                }
            }
        }

        return redirect()->back()->with('success', 'Page content updated successfully.');
    }
}
