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
use App\Http\Requests\DeductionCreateRequest;
use App\Http\Requests\DeductionUpdateRequest;
use App\Interfaces\DeductionRepository;
use App\Validators\DeductionValidator;

/**
 * Class DeductionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class DeductionsController extends Controller
{
    /**
     * @var DeductionRepository
     */
    protected $repository;

    /**
     * @var DeductionValidator
     */
    protected $validator;

    /**
     * DeductionsController constructor.
     *
     * @param DeductionRepository $repository
     * @param DeductionValidator $validator
     */
    public function __construct(DeductionRepository $repository, DeductionValidator $validator)
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
        $deductions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $deductions,
            ]);
        }

        return view('deductions.index', compact('deductions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DeductionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DeductionCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $deduction = $this->repository->create($request->all());

            $response = [
                'message' => 'Deduction created.',
                'data'    => $deduction->toArray(),
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
        $deduction = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $deduction,
            ]);
        }

        return view('deductions.show', compact('deduction'));
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
        $deduction = $this->repository->find($id);

        return view('deductions.edit', compact('deduction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DeductionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DeductionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $deduction = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Deduction updated.',
                'data'    => $deduction->toArray(),
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
                'message' => 'Deduction deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Deduction deleted.');
    }
}
