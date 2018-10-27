<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BranchCreateRequest;
use App\Http\Requests\BranchUpdateRequest;
use App\Interfaces\BranchRepository;
use App\Validators\BranchValidator;

/**
 * Class BranchesController.
 *
 * @package namespace App\Http\Controllers;
 */
class BranchesController extends Controller
{
    /**
     * @var BranchRepository
     */
    protected $repository;

    /**
     * @var BranchValidator
     */
    protected $validator;

    /**
     * BranchesController constructor.
     *
     * @param BranchRepository $repository
     * @param BranchValidator $validator
     */
    public function __construct(BranchRepository $repository, BranchValidator $validator)
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
        $branches = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $branches,
            ]);
        }

        return view('branches.index', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BranchCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BranchCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $branch = $this->repository->create($request->all());

            $response = [
                'message' => 'Branch created.',
                'data'    => $branch->toArray(),
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
        $branch = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $branch,
            ]);
        }

        return view('branches.show', compact('branch'));
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
        $branch = $this->repository->find($id);

        return view('branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BranchUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BranchUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $branch = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Branch updated.',
                'data'    => $branch->toArray(),
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
                'message' => 'Branch deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Branch deleted.');
    }
}
