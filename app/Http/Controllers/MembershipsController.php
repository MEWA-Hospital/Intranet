<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MembershipCreateRequest;
use App\Http\Requests\MembershipUpdateRequest;
use App\Interfaces\MembershipRepository;
use App\Validators\MembershipValidator;

/**
 * Class MembershipsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MembershipsController extends Controller
{
    /**
     * @var MembershipRepository
     */
    protected $repository;

    /**
     * @var MembershipValidator
     */
    protected $validator;

    /**
     * MembershipsController constructor.
     *
     * @param MembershipRepository $repository
     * @param MembershipValidator $validator
     */
    public function __construct(MembershipRepository $repository, MembershipValidator $validator)
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
        $memberships = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $memberships,
            ]);
        }

        return view('memberships.index', compact('memberships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MembershipCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MembershipCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $membership = $this->repository->create($request->all());

            $response = [
                'message' => 'Membership created.',
                'data'    => $membership->toArray(),
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
        $membership = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $membership,
            ]);
        }

        return view('memberships.show', compact('membership'));
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
        $membership = $this->repository->find($id);

        return view('memberships.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MembershipUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MembershipUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $membership = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Membership updated.',
                'data'    => $membership->toArray(),
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
                'message' => 'Membership deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Membership deleted.');
    }
}
