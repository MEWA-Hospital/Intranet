<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\FoodCreateRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Interfaces\FoodRepository;
use App\Validators\FoodValidator;

/**
 * Class FoodsController.
 *
 * @package namespace App\Http\Controllers;
 */
class FoodsController extends Controller
{
    /**
     * @var FoodRepository
     */
    protected $repository;

    /**
     * @var FoodValidator
     */
    protected $validator;

    /**
     * FoodsController constructor.
     *
     * @param FoodRepository $repository
     * @param FoodValidator $validator
     */
    public function __construct(FoodRepository $repository, FoodValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    public function dataTable()
    {
        return $this->repository->getDataTable();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $foods = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $foods,
            ]);
        }

        return view('Backend.foods.index', compact('foods'));
    }


    public function create(){
        return view('Backend.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FoodCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(FoodCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $food = $this->repository->create($request->all());

            $response = [
                'message' => 'Food created.',
                'data'    => $food->toArray(),
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
        $food = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $food,
            ]);
        }

        return view('foods.show', compact('food'));
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
        $food = $this->repository->find($id);

        return view('Backend.foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FoodUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(FoodUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $food = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Food updated.',
                'data'    => $food->toArray(),
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
                'message' => 'Food deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Food deleted.');
    }
}
