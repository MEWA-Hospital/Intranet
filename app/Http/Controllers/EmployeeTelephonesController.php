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
use App\Http\Requests\EmployeeTelephoneCreateRequest;
use App\Http\Requests\EmployeeTelephoneUpdateRequest;
use App\Interfaces\EmployeeTelephoneRepository;
use App\Validators\EmployeeTelephoneValidator;

/**
 * Class EmployeeTelephonesController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmployeeTelephonesController extends Controller
{
    /**
     * @var EmployeeTelephoneRepository
     */
    protected $repository;

    /**
     * @var EmployeeTelephoneValidator
     */
    protected $validator;

    /**
     * EmployeeTelephonesController constructor.
     *
     * @param EmployeeTelephoneRepository $repository
     * @param EmployeeTelephoneValidator $validator
     */
    public function __construct(EmployeeTelephoneRepository $repository, EmployeeTelephoneValidator $validator)
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
        $employeeTelephones = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employeeTelephones,
            ]);
        }

        return view('employeeTelephones.index', compact('employeeTelephones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeTelephoneCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmployeeTelephoneCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $employeeTelephone = $this->repository->create($request->all());

            $response = [
                'message' => 'EmployeeTelephone created.',
                'data'    => $employeeTelephone->toArray(),
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
        $employeeTelephone = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employeeTelephone,
            ]);
        }

        return view('employeeTelephones.show', compact('employeeTelephone'));
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
        $employeeTelephone = $this->repository->find($id);

        return view('employeeTelephones.edit', compact('employeeTelephone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeTelephoneUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EmployeeTelephoneUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $employeeTelephone = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'EmployeeTelephone updated.',
                'data'    => $employeeTelephone->toArray(),
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
                'message' => 'EmployeeTelephone deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EmployeeTelephone deleted.');
    }
}
