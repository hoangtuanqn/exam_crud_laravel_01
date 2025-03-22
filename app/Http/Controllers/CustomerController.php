<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $customers, $messages;
    public function __construct()
    {
        // $this->customers = new Customer();
        $this->messages = [
            'CCode.unique' => 'CCode này đã tồn tại',
            'required' => 'Trường này không được để trống',
            'max' => 'Trường này không được quá :max ký tự',
            'min' => 'Trường này không được ít hơn :min ký tự'
        ];
        $this->customers = new Customer();
    }
    public function index()
    {
        $customerList = $this->customers->getAll();
        return view('home', compact('customerList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'CCode' => 'required|min:1|max:50|unique:customer,CCode',
                'CName' => 'required|min:1|max:50',
                'CEmail' => ['required', 'string', 'email', 'max:50', function($attribute, $value, $fail) {
                    if (!preg_match("/^.+@.+\..+$/", $value)) {
                        $fail('Định dạng email không hợp lệ');
                    }
                }],
                'CPhone' => 'required|min:1|max:50'
            ], 
            $this->messages
        );

        $isCheck = $this->customers->insertCustomer([
            $request->CCode,
            $request->CName,
            $request->CPhone,
            $request->CEmail
        ]);
        if($isCheck) {
            return redirect()->route('index')->with('success', 'Đã thêm dữ liệu thành công');
        } else {
            return redirect()->route('index')->with('error', 'Đã thêm dữ liệu thất bại');
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
    public function edit(Request $request, string $CCode)
    {
        $request->session()->put('CCode', $CCode);
        $detailCustomer = $this->customers->getDetail($CCode);
        if(empty($CCode) || empty($detailCustomer)) {
            return redirect()->route('index')->with('error', 'Không tìm thấy dữ liệu');
        }
        $detailCustomer = $detailCustomer[0];
        return view('edit', compact('detailCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $CCode = $request->session()->get('CCode');
        $CCode = $this->customers->getDetail($CCode)[0]->CCode;
        $request->validate(
            [
                'CCode' => 'required|min:1|max:50|unique:customer,CCode,'.$CCode.',CCode',
                'CName' => 'required|min:1|max:50',
                'CEmail' => ['required', 'string', 'email', 'max:50', function($attribute, $value, $fail) {
                    if (!preg_match("/^.+@.+\..+$/", $value)) {
                        $fail('Định dạng email không hợp lệ');
                    }
                }],
                'CPhone' => 'required|min:1|max:50'
            ],
            $this->messages
        );

        $isCheck = $this->customers->updateCustomer([
            $request->CCode,
            $request->CName,
            $request->CPhone,
            $request->CEmail,
            $request->session()->get('CCode')
        ]);
        if($isCheck) {
            return redirect()->route('index')->with('success', 'Đã cập nhật dữ liệu thành công');
        } else {
            return redirect()->route('index')->with('error', 'Không có sự thay đổi!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $CCode)
    {
        $isCheck = $this->customers->deleteCustomer($CCode);
        if($isCheck) {
            return redirect()->route('index')->with('success', 'Đã xóa dữ liệu thành công');
        } else {
            return redirect()->route('index')->with('error', 'Đã xóa dữ liệu thất bại');
        }
    }
}
