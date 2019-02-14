<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmployeesDeductionCreateRequest;
use App\Http\Requests\EmployeesDeductionUpdateRequest;
use App\Interfaces\EmployeesDeductionRepository;
use App\Validators\EmployeesDeductionValidator;

/**
 * Class EmployeesDeductionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmployeesDeductionsController extends Controller
{
    /**
     * @var EmployeesDeductionRepository
     */
    protected $repository;

    /**
     * @var EmployeesDeductionValidator
     */
    protected $validator;

    /**
     * EmployeesDeductionsController constructor.
     *
     * @param EmployeesDeductionRepository $repository
     * @param EmployeesDeductionValidator $validator
     */
    public function __construct(EmployeesDeductionRepository $repository, EmployeesDeductionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $employeesDeductions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employeesDeductions,
            ]);
        }

        return view('employeesDeductions.index', compact('employeesDeductions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeesDeductionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmployeesDeductionCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $employeesDeduction = $this->repository->create($request->all());

            $response = [
                'message' => 'EmployeesDeduction created.',
                'data'    => $employeesDeduction->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeesDeduction = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employeesDeduction,
            ]);
        }

        return view('employeesDeductions.show', compact('employeesDeduction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeesDeduction = $this->repository->find($id);

        return view('employeesDeductions.edit', compact('employeesDeduction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeesDeductionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EmployeesDeductionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $employeesDeduction = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'EmployeesDeduction updated.',
                'data'    => $employeesDeduction->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'EmployeesDeduction deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EmployeesDeduction deleted.');
    }
}
