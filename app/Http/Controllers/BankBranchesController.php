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
use App\Http\Requests\BankBranchCreateRequest;
use App\Http\Requests\BankBranchUpdateRequest;
use App\Interfaces\BankBranchRepository;
use App\Validators\BankBranchValidator;

/**
 * Class BankBranchesController.
 *
 * @package namespace App\Http\Controllers;
 */
class BankBranchesController extends Controller
{
    /**
     * @var BankBranchRepository
     */
    protected $repository;

    /**
     * @var BankBranchValidator
     */
    protected $validator;

    /**
     * BankBranchesController constructor.
     *
     * @param BankBranchRepository $repository
     * @param BankBranchValidator $validator
     */
    public function __construct(BankBranchRepository $repository, BankBranchValidator $validator)
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
        $bankBranches = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bankBranches,
            ]);
        }

        return view('bankBranches.index', compact('bankBranches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BankBranchCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BankBranchCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $bankBranch = $this->repository->create($request->all());

            $response = [
                'message' => 'BankBranch created.',
                'data'    => $bankBranch->toArray(),
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
        $bankBranch = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bankBranch,
            ]);
        }

        return view('bankBranches.show', compact('bankBranch'));
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
        $bankBranch = $this->repository->find($id);

        return view('bankBranches.edit', compact('bankBranch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BankBranchUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BankBranchUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $bankBranch = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'BankBranch updated.',
                'data'    => $bankBranch->toArray(),
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
                'message' => 'BankBranch deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'BankBranch deleted.');
    }
}
