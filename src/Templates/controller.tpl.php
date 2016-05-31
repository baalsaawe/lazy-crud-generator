<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\[[controller_name]]CreateRequest;
use App\Http\Requests\[[controller_name]]UpdateRequest;
use App\Repositories\[[controller_name]]Repository;
use App\Validators\[[controller_name]]Validator;


class [[controller_name]]Controller extends Controller
{

    /**
     * @var RelevanceRepository
     */
    protected $repository;

    /**
     * @var RelevanceValidator
     */
    protected $validator;


    public function __construct([[controller_name]]Repository $repository, [[controller_name]]Validator $validator)
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
        $[[model_plural]] = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $[[model_plural]],
            ]);
        }

        return view('[[view_folder]].index', compact('[[model_plural]]'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('[[view_folder]].create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  RelevanceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store([[controller_name]]CreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $[[model_singular]] = $this->repository->create($request->all());

            $response = [
                'message' => '[[controller_name]] created.',
                'data'    => $[[model_singular]]->toArray(),
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
        $[[model_singular]] = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $[[model_singular]],
            ]);
        }

        return view('[[view_folder]].show', compact('[[model_singular]]'));
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

        $[[model_singular]] = $this->repository->find($id);

        return view('[[view_folder]].edit', compact('[[model_singular]]'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RelevanceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update([[controller_name]]UpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $[[model_singular]] = $this->repository->update($request->all(), $id);

            $response = [
                'message' => '[[controller_name]] updated.',
                'data'    => $[[model_singular]]->toArray(),
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
                'message' => '[[controller_name]] deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', '[[controller_name]] deleted.');
    }
}
