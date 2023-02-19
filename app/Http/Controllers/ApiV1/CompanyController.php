<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\ApiV1\CompanyStoreRequest;
use App\Http\Requests\ApiV1\CompanyUpdateRequest;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $filter_keys = $request->all();
        $company = Company::query();

        if ($filter_keys) {
            $company->where($filter_keys);
        }

        return [
            'status' => true,
            'data' => $company->orderBy('id', 'desc')->paginate(10)
        ];
    }

    public function selectById($id)
    {
        $company = Company::find($id);
        if ($company)
            return $company;

        return [
            'status' => false,
            'msg' => 'No data found!'
        ];
    }

    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->all([
            'name', 'website', 'phone', 'email', 'address'
        ]));

        if ($company)
            return [
                'status' => true,
                'msg' => __('messages.Data is created successfully'),
                'data' => $company
            ];
    }

    public function destroy($id)
    {
        $company = Company::destroy($id);

        if ($company)
            return [
                'status' => true,
                'msg' => __('messages.Company delete successfully')
            ];

        return [
            'status' => true,
            'msg' => __('messages.Company not found')
        ];
    }

    public function update(CompanyUpdateRequest $request)
    {
        $company = Company::query()->where('id', $request->id)
            ->update($request->all());

        if ($company)
            return [
                'status' => true,
                'msg' => __('messages.Data is updated successfully'),
                'data' => $company
            ];

        return [
            'status' => true,
            'msg' => __('messages.Company not found')
        ];

    }

}
