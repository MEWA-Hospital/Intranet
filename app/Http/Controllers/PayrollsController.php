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
use App\Http\Requests\PayrollCreateRequest;
use App\Http\Requests\PayrollUpdateRequest;
use App\Interfaces\PayrollRepository;
use App\Validators\PayrollValidator;

/**
 * Class PayrollsController.
 *
 * @package namespace App\Http\Controllers;
 */
class PayrollsController extends Controller
{
    /**
     * @var PayrollRepository
     */
    protected $repository;

    /**
     * @var PayrollValidator
     */
    protected $validator;

    /**
     * PayrollsController constructor.
     *
     * @param PayrollRepository $repository
     * @param PayrollValidator $validator
     */
    public function __construct(PayrollRepository $repository, PayrollValidator $validator)
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
        $payrolls = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $payrolls,
            ]);
        }

        return view('payrolls.index', compact('payrolls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PayrollCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PayrollCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $payroll = $this->repository->create($request->all());

            $response = [
                'message' => 'Payroll created.',
                'data'    => $payroll->toArray(),
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
        $payroll = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $payroll,
            ]);
        }

        return view('payrolls.show', compact('payroll'));
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
        $payroll = $this->repository->find($id);

        return view('payrolls.edit', compact('payroll'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PayrollUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PayrollUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $payroll = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Payroll updated.',
                'data'    => $payroll->toArray(),
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
                'message' => 'Payroll deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Payroll deleted.');
    }
}
