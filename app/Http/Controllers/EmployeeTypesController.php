<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmployeeTypeCreateRequest;
use App\Http\Requests\EmployeeTypeUpdateRequest;
use App\Interfaces\EmployeeTypeRepository;
use App\Validators\EmployeeTypeValidator;

/**
 * Class EmployeeTypesController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmployeeTypesController extends Controller
{
    /**
     * @var EmployeeTypeRepository
     */
    protected $repository;

    /**
     * EmployeeTypesController constructor.
     *
     * @param EmployeeTypeRepository $repository
     */
    public function __construct(EmployeeTypeRepository $repository)
    {
        $this->repository = $repository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $employeeTypes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employeeTypes,
            ]);
        }

        return view('employeeTypes.index', compact('employeeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmployeeTypeCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $employeeType = $this->repository->create($request->all());

            $response = [
                'message' => 'EmployeeType created.',
                'data'    => $employeeType->toArray(),
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
        $employeeType = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employeeType,
            ]);
        }

        return view('employeeTypes.show', compact('employeeType'));
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
        $employeeType = $this->repository->find($id);

        return view('employeeTypes.edit', compact('employeeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeTypeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EmployeeTypeUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $employeeType = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'EmployeeType updated.',
                'data'    => $employeeType->toArray(),
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
                'message' => 'EmployeeType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EmployeeType deleted.');
    }
}
