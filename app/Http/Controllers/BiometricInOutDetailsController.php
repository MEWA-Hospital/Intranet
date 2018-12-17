<?php

namespace App\Http\Controllers;

use App\Http\Requests\BiometricInOutDetailsCreateRequest;
use App\Http\Requests\BiometricInOutDetailsUpdateRequest;
use App\Interfaces\BiometricInOutDetailsRepository;
use App\Validators\BiometricInOutDetailsValidator;
use Carbon\Carbon;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class BiometricInOutDetailsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BiometricInOutDetailsController extends Controller
{
    /**
     * @var BiometricInOutDetailsRepository
     */
    protected $repository;

    /**
     * BiometricInOutDetailsController constructor.
     *
     * @param BiometricInOutDetailsRepository $repository
     */
    public function __construct(BiometricInOutDetailsRepository $repository)
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
        $biometricInOutDetails = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $biometricInOutDetails,
            ]);
        }

        return view('biometricInOutDetails.index', compact('biometricInOutDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BiometricInOutDetailsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BiometricInOutDetailsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $biometricInOutDetail = $this->repository->create($request->all());

            $response = [
                'message' => 'BiometricInOutDetails created.',
                'data'    => $biometricInOutDetail->toArray(),
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
        $biometricInOutDetails = \DB::connection('otl')
            ->table('Emp_InOut_Record')
            ->select(['Emp_Id', 'For_Date', 'In_Out_Flag', 'In_Duration'])
            ->limit(10)
            ->where('Emp_Id', $id)
            ->orderBy('For_Date', 'desc')
            ->get();

        foreach ($biometricInOutDetails as $e) {
            $e->For_Date = date('Y-m-d H:s:i', strtotime($e->For_Date));
            $e->For_Date = Carbon::parse($e->For_Date)->format('M j Y,  H:s:i');

            if ($e->In_Out_Flag === 'I') {
                $e->In_Out_Flag = 'Check in';
            } else {
                $e->In_Out_Flag = 'Check out';
            }
        }
        if (request()->wantsJson()) {

            return response()->json($biometricInOutDetails);
        }

        return view('biometricInOutDetails.show', compact('biometricInOutDetails'));
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
        $biometricInOutDetail = $this->repository->find($id);

        return view('biometricInOutDetails.edit', compact('biometricInOutDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BiometricInOutDetailsUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BiometricInOutDetailsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $biometricInOutDetail = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'BiometricInOutDetails updated.',
                'data'    => $biometricInOutDetail->toArray(),
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
                'message' => 'BiometricInOutDetails deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'BiometricInOutDetails deleted.');
    }
}
