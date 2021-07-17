<?php

namespace App\Http\Controllers;

use App\Models\UserReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
class UserReportController extends Controller
{

    protected $userReport;
    
    public function __construct(UserReport $userReport)
    {
        $this->userReport = $userReport;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportSelection()
    {
        return view('report.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function audioReport(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('audio')) {
                $report = 
                $file         = $request->file("audio");
                $extension    = $file->getClientOriginalExtension();
                $dir = 'report' . DIRECTORY_SEPARATOR . auth()->user()->id . DIRECTORY_SEPARATOR . 'voice';
                $filename = Str::random().'.'.$file->getClientOriginalExtension();
                $path = Storage::disk('public')->putFileAs($dir, $file, $filename);
                $report = $this->userReport;
                $report->user_id = auth()->user()->id;
                $report->file_path = $path;
                $report->file_url = Storage::disk('public')->url($path);
                $report->file_original_name = $file->getClientOriginalName();
                $report->extension = $extension;
                $report->type = 'audio';
                $report->save();
            } else {
                Session::flash('error', 'File not found!');
                return response()->json(false);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Failed to submit report!');
            return response()->json(false);
        }
        DB::commit();
        Session::flash('success', 'Report has been submitted successfully!');
        return response()->json(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function textReport(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->has('text_report')) {
                $dir = 'report' . DIRECTORY_SEPARATOR . auth()->user()->id . DIRECTORY_SEPARATOR . 'text';
                $filename = Str::random().'.'.'txt';
                $fileDir = $dir . DIRECTORY_SEPARATOR . $filename;
                Storage::disk('public')->put($fileDir, $request->text_report);
                $report = $this->userReport;
                $report->user_id = auth()->user()->id;
                $report->file_path = $fileDir;
                $report->file_url = Storage::disk('public')->url($fileDir);
                $report->file_original_name = $filename;
                $report->extension = 'txt';
                $report->type = 'text';
                $report->save();
            } else {
                Session::flash('error', 'File not found!');
                return response()->json(false);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Failed to submit report!');
            return response()->json(false);
        }
        DB::commit();                
        Session::flash('success', 'Report has been submitted successfully!');
        return response()->json(true);
    }

    public function destroy(UserReport $report)
    {
        try {
            if($report->delete()){
                Storage::disk('public')->delete($report->file_path);
            } else {
                return back()->with('error','Error!! Operation Failed.');
            }
            return back()->with('success','Success!! File deleted.');
        } catch (\Exception $e) {
            return back()->with('error','Error!! Operation Failed.');
        }
    }
    public function download(UserReport $report)
    {
        return Storage::disk('public')->download($report->file_path);
    }
}
