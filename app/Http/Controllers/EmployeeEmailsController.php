<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmployeeEmailCreateRequest;
use App\Http\Requests\EmployeeEmailUpdateRequest;
use App\Interfaces\EmployeeEmailRepository;
use App\Validators\EmployeeEmailValidator;

/**
 * Class EmployeeEmailsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmployeeEmailsController extends Controller
{
    /**
     * @var EmployeeEmailRepository
     */
    protected $repository;

    /**
     * @var EmployeeEmailValidator
     */
    protected $validator;

    /**
     * EmployeeEmailsController constructor.
     *
     * @param EmployeeEmailRepository $repository
     * @param EmployeeEmailValidator $validator
     */
    public function __construct(EmployeeEmailRepository $repository, EmployeeEmailValidator $validator)
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
        $employeeEmails = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employeeEmails,
            ]);
        }

        return view('employeeEmails.index', compact('employeeEmails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeEmailCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(EmployeeEmailCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $employeeEmail = $this->repository->create($request->all());

            $response = [
                'message' => 'EmployeeEmail created.',
                'data'    => $employeeEmail->toArray(),
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
        $employeeEmail = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $employeeEmail,
            ]);
        }

        return view('employeeEmails.show', compact('employeeEmail'));
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
        $employeeEmail = $this->repository->find($id);

        return view('employeeEmails.edit', compact('employeeEmail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeEmailUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(EmployeeEmailUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $employeeEmail = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'EmployeeEmail updated.',
                'data'    => $employeeEmail->toArray(),
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
                'message' => 'EmployeeEmail deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'EmployeeEmail deleted.');
    }
}
