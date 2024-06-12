<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation_rules = Validator::make($request->all(), [
            'name'=>'required',
            'file' => 'required|mimes:audio/mpeg,mpga,mp3,wav,aac|max:10240', // example validation rule
            'language'=>'required',
            'create_by'=>'required|numeric',
        ]);
        if ($validation_rules->fails()) {
            return response()->json($validation_rules->messages(),400);
        }
        else{
                $filed = $request->file('file');
               // $name = $filed->getClientOriginalName();
                $uniqueId = (string) Str::uuid();
                $filename = $uniqueId.'.'.$filed->getClientOriginalExtension();
                //The below path take us to storage/app,write public to put it in public folder rather than local which is default
                $path= $filed->storeAs('audio',$filename,'public');  //foldername,filename,in public folder
                //return $path;
                $data =['name' => $request->name,
                        'file_path'=>$path,
                        'language' => $request->language,
                        'create_by' => $request->create_by,
                       ];
           DB::beginTransaction();
            try {
                $customer=Customer::create($data);
                DB::commit();

            } catch (\Exception $ex) {
                DB::rollBack();
                p($ex->getMessage());
                $customer=NULL;
            }
            if($customer){
                //ok
                return response()->json(['message' => 'File Uploaded Successfully', 'unique_id' => $uniqueId], 200);
            }
            else{
                //error
                return response()->json(['message' => 'Error Uploading file'], 500);
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           
    }
}
