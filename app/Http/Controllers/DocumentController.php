<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Project;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'files.*' => 'required|mimes:pdf,doc,docx,jpeg,png|max:2048',
        ]);

        foreach ($request->file('files') as $file) {
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('documents', $originalName, 'public');

            $document = new Document();
            $document->project_id = $project->id;
            $document->type = $file->getClientOriginalExtension();
            $document->date = now();
            $document->size = $file->getSize() / 1024; // size in KB
            $document->path = 'documents/' . $originalName;
            $document->save();
        }

        return redirect()->route('projects.show', $project)->with('success', 'Files uploaded successfully.');
    }

    public function download(Document $document)
    {
        $filePath = storage_path('app/' . $document->path);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File not found.');
        }

        $fileName = basename($document->path);
        $mimeType = mime_content_type($filePath);

        return response()->download($filePath, $fileName, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('projects.show', $document->project_id)->with('success', 'Document deleted successfully.');
    }
}
