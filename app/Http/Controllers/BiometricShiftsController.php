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
use App\Http\Requests\BiometricShiftCreateRequest;
use App\Http\Requests\BiometricShiftUpdateRequest;
use App\Interfaces\BiometricShiftRepository;
use App\Validators\BiometricShiftValidator;

/**
 * Class BiometricShiftsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BiometricShiftsController extends Controller
{
    /**
     * @var BiometricShiftRepository
     */
    protected $repository;

    /**
     * @var BiometricShiftValidator
     */
    protected $validator;

    /**
     * BiometricShiftsController constructor.
     *
     * @param BiometricShiftRepository $repository
     * @param BiometricShiftValidator $validator
     */
    public function __construct(BiometricShiftRepository $repository, BiometricShiftValidator $validator)
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
        $biometricShifts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $biometricShifts,
            ]);
        }

        return view('biometricShifts.index', compact('biometricShifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BiometricShiftCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BiometricShiftCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $biometricShift = $this->repository->create($request->all());

            $response = [
                'message' => 'BiometricShift created.',
                'data'    => $biometricShift->toArray(),
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
        $biometricShift = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $biometricShift,
            ]);
        }

        return view('biometricShifts.show', compact('biometricShift'));
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
        $biometricShift = $this->repository->find($id);

        return view('biometricShifts.edit', compact('biometricShift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BiometricShiftUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BiometricShiftUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $biometricShift = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'BiometricShift updated.',
                'data'    => $biometricShift->toArray(),
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
                'message' => 'BiometricShift deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'BiometricShift deleted.');
    }
}
