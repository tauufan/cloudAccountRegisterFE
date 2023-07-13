<?php

namespace Modules\Daftar\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ip=env("IPBE", "http://localhost");
        $port=env("PORTBE", "8080");
		$url=env("URLBE", "/account");
        $user=env("USERBE", "admin");
        $password=env("PASSWORDBE", "administrator");
        $page = '?page=0';
        $size = '&size=10';
        try {
            $response = Http::withBasicAuth($user, $password)
		    ->get($ip.':'.$port.$url.$page.$size);
            // dd($response['statusCode']);
            if ($response->status() == 200) {
                $data = $response['data'];
                // dd($data);
                return view('daftar::index', compact('data'));
            }else{
                return view('daftar::index');
            }
            
        } catch (\Throwable $th) {
            return view('daftar::index');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('daftar::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // $input['createdby'] = Auth::user()->username;
        
        $ip=env("IPBE", "http://localhost");
        $port=env("PORTBE", "8080");
		$url=env("URLBE", "/account");
        $user=env("USERBE", "admin");
        $password=env("PASSWORDBE", "administrator");
        try {
            $response = Http::withBasicAuth($user, $password)
		    ->POST($ip.':'.$port.$url,  $input);
            // dd($response['statusCode']);
            if ($response->status() == 200) {
                $data = $response['data'];
                // dd($data);
                return redirect()->route('index')
                        ->with('success','Account created successfully');
            }else{
                return redirect()->route('index')
                        ->with('failed','Account created failed');
            }
            
        } catch (\Throwable $th) {
            return redirect()->route('index')
                        ->with('failed','Account created failed '.$th);
        }        

        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // dd($id);
        $ip=env("IPBE", "http://localhost");
        $port=env("PORTBE", "8080");
		$url=env("URLBE", "/account");
        $user=env("USERBE", "admin");
        $password=env("PASSWORDBE", "administrator");
        $page = '?page=0';
        $size = '&size=10';
        try {
            $response = Http::withBasicAuth($user, $password)
		    ->get($ip.':'.$port.$url."/".$id);
            // dd($response);
            if ($response->status() == 200) {
                $data = $response;
                // dd($data);
                return view('daftar::create', compact('data'));
            }else{
                return view('daftar::index');
            }
            
        } catch (\Throwable $th) {
            return view('daftar::index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        // dd($id);
        $ip=env("IPBE", "http://localhost");
        $port=env("PORTBE", "8080");
		$url=env("URLBE", "/account");
        $user=env("USERBE", "admin");
        $password=env("PASSWORDBE", "administrator");
        $page = '?page=0';
        $size = '&size=10';
        try {
            $response = Http::withBasicAuth($user, $password)
		    ->get($ip.':'.$port.$url."/".$id);
            // dd($response);
            if ($response->status() == 200) {
                $data = $response;
                // dd($data);
                return view('daftar::create', compact('data'));
            }else{
                return view('daftar::index');
            }
            
        } catch (\Throwable $th) {
            return view('daftar::index');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        
        $ip=env("IPBE", "http://localhost");
        $port=env("PORTBE", "8080");
		$url=env("URLBE", "/account");
        $user=env("USERBE", "admin");
        $password=env("PASSWORDBE", "administrator");
        try {
            $response = Http::withBasicAuth($user, $password)
		    ->PUT($ip.':'.$port.$url.'/'.$id,  $input);
            // dd($response['statusCode']);
            if ($response->status() == 200) {
                $data = $response['data'];
                // dd($data);
                return redirect()->route('index')
                        ->with('success','Account update successfully');
            }else{
                return redirect()->route('index')
                        ->with('failed','Account update failed');
            }
            
        } catch (\Throwable $th) {
            return redirect()->route('index')
                        ->with('failed','Account update failed '.$th);
        }        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $ip=env("IPBE", "http://localhost");
        $port=env("PORTBE", "8080");
		$url=env("URLBE", "/account");
        $user=env("USERBE", "admin");
        $password=env("PASSWORDBE", "administrator");
        try {
            $response = Http::withBasicAuth($user, $password)
		    ->DELETE($ip.':'.$port.$url.'/'.$id);
            // dd($response['statusCode']);
            if ($response->status() == 200) {
                $data = $response['data'];
                // dd($data);
                return redirect()->route('index')
                        ->with('success','Account delete successfully');
            }else{
                return redirect()->route('index')
                        ->with('failed','Account delete failed');
            }
            
        } catch (\Throwable $th) {
            return redirect()->route('index')
                        ->with('failed','Account delete failed '.$th);
        }        
    }
}
