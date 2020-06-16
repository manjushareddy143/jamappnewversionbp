<?php

namespace App\Http\Controllers;

use App\Address;
use App\Document;
use App\FCMDevices;
use App\Http\Controllers\Auth\RegisterController;
use App\IndividualServiceProvider;
use App\organisation;
use App\ProviderServiceMapping;
use App\Role;
//use App\ServiceMapping;
use App\ServiceProvider;
use App\services;
use App\SubCategories;
use App\TermAgreement;
use App\TermCondition;
use App\User;
use App\UserTypes;
use DB;
use CreateIndividualserviceprovidermasterTable;
use Exception;
use GuzzleHttp\Middleware;
//use Illuminate\Contracts\Validation\Validator;
use http\Message;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Str;
use Swagger\Annotations\Post;
use Swagger\Annotations\Response;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpKernel\EventListener\SaveSessionListener;
use Kreait\Laravel\Firebase\Facades\FirebaseAuth;
use Validator;
use PHPUnit\Util\Json;
// use App\Http\Controllers\response;

class UserController extends Controller
{
    //CRUD Operation for Users
    /**Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usr = $request->user();
        $users=User::where('users.id', '>', 0)
            ->leftJoin('user_types', 'users.type_id','=', 'user_types.id')
            ->select('users.*', 'user_types.*')
            ->get();
        return view('layouts.Users.index')->with('data',$users);  //->with('individualserviceprovider', $individualserviceprovidermaster);
    }

    public function getuser($id)
    {
        // $user = ProviderServiceMapping::with('user')->with('service')->where('service_id', '=', $id)->get();
        $user = User::with('documents')->with('address')->with('provider')
        ->with('type')->with('services')->with('organisation')->where('type_id', '=', (int)$id)->get();
        return response()->json($user, 200);

        // $users=User::where('type_id', '=', (int)$id)
        //     ->leftJoin('user_types', 'users.type_id','=', 'user_types.id')
        //     ->leftJoin('organisation', 'users.org_id','=', 'organisation.id')
        //     ->select('users.*',
        //         'user_types.type as type',
        //         'organisation.name as company',
        //         'organisation.resident_country as country',
        //         'organisation.number_of_employee as number_of_employee')
        //     ->get();
        // return response()->json($users, 200);
    }

    public function getuserbyid($id)
    {

        $user = User::with('documents')->with('address')->with('provider')
        ->with('type')->with('services')->with('organisation')->find($id);
        return response()->json($user, 200);
//        $users=User::where('users.id', '=', (int)$id)
//            ->leftJoin('user_types', 'users.type_id','=', 'user_types.id')
//            ->leftJoin('organisation', 'users.org_id','=', 'organisation.id')
//            ->leftJoin('addresses', 'addresses.user_id','=', 'users.id')
//            ->select('users.*',
//                'user_types.type as type',
//                'organisation.name as company',
//                'organisation.resident_country as country',
//                'organisation.number_of_employee as number_of_employee',
//                'addresses.name as addressname',
//                'addresses.address_line1 as address_line1',
//                'addresses.address_line2 as address_line2')
//            ->first();
//
//        $results = ProviderServiceMapping::where('user_id', '=', $users['id'])
//            ->leftJoin('services', 'services.id', '=','provider_service_mappings.service_id')
//            ->leftJoin('sub_categories', 'sub_categories.id', '=','provider_service_mappings.category_id')
//            ->select('services.id as service_id',
//                'services.name as service','services.icon_image as service_icon',
//                'services.banner_image as service_banner', 'services.description as service_description' ,
//                'sub_categories.name as category', 'sub_categories.id as category_id',
//                'sub_categories.image as category_image', 'sub_categories.description as category_description')
//            ->get();
//
//
//        $users["services"] = $results;
//
//        return response()->json($users, 200);
    }
    /** Form for creating a new resource
     *
     *@return \Illuminate\Http\Response
     */


    public function getcusbyid($id)
    {
        $users=User::where('users.id', '=', (int)$id)
            ->leftJoin('user_types', 'users.type_id','=', 'user_types.id')
            ->leftJoin('organisation', 'users.org_id','=', 'organisation.id')
            ->leftJoin('addresses', 'addresses.user_id','=', 'users.id')
//            ->leftJoin('provider_service_mappings', 'provider_service_mappings.user_id','=', 'users.id')
//            ->leftJoin('services', 'provider_service_mappings.service_id', '=', 'services.id')
            ->select('users.*',
                'user_types.type as type',
                'organisation.name as company',
                'organisation.resident_country as country',
                'organisation.number_of_employee as number_of_employee',
                'addresses.name as addressname',
                'addresses.address_line1 as address_line1',
                'addresses.address_line2 as address_line2')
            ->first();

        $results = ProviderServiceMapping::where('user_id', '=', $users['id'])
            ->leftJoin('services', 'services.id', '=','provider_service_mappings.service_id')
            ->leftJoin('sub_categories', 'sub_categories.id', '=','provider_service_mappings.category_id')
            ->select('services.id as service_id',
                'services.name as service','services.icon_image as service_icon',
                'services.banner_image as service_banner', 'services.description as service_description' ,
                'sub_categories.name as category', 'sub_categories.id as category_id',
                'sub_categories.image as category_image', 'sub_categories.description as category_description')
            ->get();

        $users["services"] = $results;

        return response()->json($users, 200);
    }


    public function addUser(Request $request)
    {
        $roles = Role::pluck('name','name')->all();

        return view('layouts.Users.create',compact('roles'));

    }

    protected $usermaster, $IndividualServiceProvider;

    public function __construct(User $users, IndividualServiceProvider $IndividualServiceProvider)
    {
        $this->users = new user();
        $this->IndividualServiceProvider = new IndividualServiceProvider();
    }

    /**
     * store newly created resource in storage
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $roles)
    {
        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'contact' => 'required',
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();

        if($input['type'] == "Individual service provider") {

            $detailValidator = Validator::make($request->all(),
                [
                    "gender" => "required",
                    "language" => "required",
                    "start_time" => "required|before:end_time",
                    "end_time" => "required",
                    "experience" => "required"
                ]);

            if($detailValidator->fails())
            {
                return response()->json(['error'=>$detailValidator->errors()], 401);
            }
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        if($input['type'] == "Individual service provider") {
            $user_id=$user->id;
            $dataArray= [
                'user_id' => $user_id,
                'gender' => $input['gender'],
                'languages_known' => $input['languages'],
                'start_time' => $input['start_time'],
                'end_time' => $input['end_time'],
                'experience' => $input['experience'],
            ];

            $details = IndividualServiceProvider::create($dataArray);
            $user["details"] = $details;
        }

        if (isset($user)) {
            $response['status']  = "200";
            $response['message']  = $user;
        } else {
            $response['status']  = false;
            $response['message']  = "Please add valid details";
        }

       return response()->json($response);

        //return redirect()->route('user.index')->with('Success','User created successfully.');
    }

    /**Display the specified resource
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)//User $users
    {
        $user = User::find($id);
        return view('layouts.Users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

         return response()->json($user, 200);
    }

    /**
     * Update the specified resources in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        print_r($request->all());
        exit();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'contact' => 'required',
            "gender" => "required",
            "languages" => "required",
        ]);

        $input = $request->all();
        if(!empty($input['password']))
        {
            $input['password'] = Hash::make($input['password']);
        }
        else
        {
            $input = array_except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('users_has_roles')->where('users_id',$id)->delete();
        //$users->update($request->all());
        // return redirect()->route('/index')->with('Success','User updated successfully');
        return response()->json($users, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return response()->json($users, 200);
    }



    // User Login API
    /**
     * @SWG\Post(
     *   path="/login",
     *   summary="User Login",
     *     description="User will be logged in",
     *   operationId="userLogin",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter email address and password for user login",
     *      required=true,
     *     @SWG\Definition(
     *         definition="users",
     *         required={"username","passwrod"},
     *         @SWG\Property(
     *             description="Enter Email id",
     *             property="username",
     *             type="string"
     *         ),
     *         @SWG\Property(
     *             description="Enter User Password",
     *             property="password",
     *             type="string"
     *         ),
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User logged in Successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */
    public function login(Request $request)
    {
        try
        {
            $response = array();
            $input = $request->all();

            $username = "";
            $condition = "";
            if(array_key_exists('email', $input))
            {
                $username = $request->input('email');
                $condition = "email";
            }
            else if(array_key_exists('contact', $input))
            {
                $username = $request->input('contact');
                $condition = "contact";
            } else {
                return response(null, 401);
            }
            $password = $request->input('password');
            $token = $request->input('token');
            $device = $request->input('device');

            $fcm_response = array();
            $checkuser  = User::where($condition, '=', $username)->first();

            if (isset($checkuser))
            {
                if (Hash::check($password,$checkuser->password))
                {

                    $user = User::with('services')->with('address')->with('provider')->where($condition, '=', $username)->first();

                    $checkuser = Auth::onceUsingId($checkuser['id']);
                    $roles = Auth::user()->roles;
                    $user["roles"] = $roles;

                    if(array_key_exists('token', $input))
                    {
                        $fcm_response = array();
                        //                    $fcm_user = FCMDevices::where('fcm_device_token', '=', $token)->get();
                        $fcm_user = FCMDevices::where('user_id', '=', $user['id'])->get();
                        if ($fcm_user->count() <= 0)
                        {

                            $fcm_data = [
                                "user_id" => $user['id'],
                                "fcm_device_token" => $input['token'],
                                "device_type" => $input['device']
                            ];
                            $fcm_response = FCMDevices::create($fcm_data);
                        }
                        else
                        {
                            $fcm_response = $fcm_user;
                        }
                        $user['fcm'] = $fcm_response;
                    }
                    return response($user, 200);
                }
                else
                {
                    return response(null, 401);
                }
            } else {
                return response(null, 401);
            }
        } catch (\Exception $e) {
            $response['code'] = 400;
            $response['message'] = "There is some error";
        }
    }

    // User Register API
    /**
     * @SWG\Post(
     *   path="/register",
     *   summary="User Register",
     *     description="User will be logged in",
     *   operationId="userRegister",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter username, email address and password for user Register",
     *      required=true,
     *     @SWG\Definition(
     *         definition="users",
     *         required={"username","email","password"},
     *     @SWG\Property(
     *             description="Enter name",
     *             property="username",
     *             type="string"
     *         ),
     *         @SWG\Property(
     *             description="Enter name",
     *             property="name",
     *             type="string"
     *         ),
     *
     *     @SWG\Property(
     *             description="Enter email address",
     *             property="email",
     *             type="string"
     *         ),
     *         @SWG\Property(
     *             description="Enter User Password",
     *             property="password",
     *             type="string"
     *         ),
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User Register successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */

    public function register_provider(Request $request)
    {
        $response = array();

        $input = $request->all();

        if(array_key_exists('social_signin', $input)) {

            $user = User::where('email', '=', $input['email'])->first();
            $user = Auth::onceUsingId($user['id']);
            $roles = Auth::user()->roles;
            if($user != null) {
                if($user['type_id'] != 4)
                {
                    $service_provider = ServiceProvider::where('user_id', '=', $user['id'])->first();
                    $user['resident_country'] = $service_provider['resident_country'];
                }
                $response = $user;

                $address = Address::where('user_id', '=', $user['id'])->first();
                $response['address'] = $address;
                $response['existing_user'] = 1;
                return response($response, 200);
            } else {

            }
        }

        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $customer_role = Role::where('slug','=', 'provider')->first();
        $user->roles()->attach($customer_role);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            //            dd($user);
            $authUser = Auth::user();
            $roles = Auth::user()->roles;
            $response = $authUser;
        } else{
            return response()->json(null, 406);
        }
        if(array_key_exists('token', $input)) {
            $fcm_response = array();
            //            $fcm_user = FCMDevices::where('fcm_device_token', '=', $input['token'])->get();
            $fcm_user = FCMDevices::where('user_id', '=', $response['id'])->get();
            if($fcm_user->count() <= 0) {

                $fcm_data = [
                    "user_id" => $response['id'],
                    "fcm_device_token" => $input['token'],
                    "device_type" => $input['device']
                ];
                $fcm_response = FCMDevices::create($fcm_data);
            } else {
                $fcm_response = $fcm_user;
            }

            $response['fcm'] = $fcm_response;
        }

        $user_id=$user->id;
        $now = now()->utc();
        $term_agreement= [
            'user_id' => $user_id,
            'term_id' => $input['term_id'],
            'agreed_at' => $now
        ];
        TermAgreement::create($term_agreement);

        if(array_key_exists('resident_country', $input)) {
            $service_provider= [
                'user_id' => $user_id,
                'resident_country' => $input['resident_country']
            ];
            $service_provider_detail = ServiceProvider::create($service_provider);
            $response['resident_country'] = $service_provider_detail['resident_country'];
        } else {
            $service_provider= [
                'user_id' => $user_id,
                'resident_country' => ""
            ];
            $service_provider_detail = ServiceProvider::create($service_provider);

        }
        return response()->json($response, 200);

    }

    public function register(Request $request)
    {
        //        $user = User::with('userservices')->with('address')->where('email', '=', $input['email']);
        //        return response()->json($user); exit();
        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                // 'first_name' => 'required',
                'type_id' => 'required|exists:user_types,id',
                'term_id' => 'required|exists:term_conditions,id',
            ]
        );

        if ($initialValidator->fails()) {
            return response()->json(['error' => $initialValidator->errors()], 406);
        }


        $input = $request->all();


        if (array_key_exists('social_signin', $input))
        {

            //            $user = User::with('userservices')->with('address')->where('email', '=', $input['email'])->first(); //
            $user = User::with('services')->with('address')->with('provider')->where('email', '=', $input['email'])->first();
            if ($user != null) {
            //                $user = Auth::onceUsingId($user['id']);
            //                $roles = Auth::user()->roles;
                $checkuser = Auth::onceUsingId($user['id']);
                $roles = Auth::user()->roles;
                $user["roles"] = $roles;
                if(array_key_exists('token', $input)) {
                    $fcm_response = array();
                //                    $fcm_user = FCMDevices::where('fcm_device_token', '=', $token)->get();
                    $fcm_user = FCMDevices::where('user_id', '=', $user['id'])->get();
                    if ($fcm_user->count() <= 0) {

                        $fcm_data = [
                            "user_id" => $user['id'],
                            "fcm_device_token" => $input['token'],
                            "device_type" => $input['device']
                        ];
                        $fcm_response = FCMDevices::create($fcm_data);
                    } else {
                        $fcm_response = $fcm_user;
                    }
                    $user['fcm'] = $fcm_response;
                }
                //                $response = $user;
                //                $address = Address::where('user_id', '=', $user['id'])->first();
                //                $response['address'] = $address;
                $user['existing_user'] = 1;
                return response($user, 200);
            } else {

            }
        } else {

        }
        if (array_key_exists('contact', $input)) {
            $contactValidator = Validator::make($request->all(),
                [
                    'contact' => 'required|unique:users,contact',
                ]
            );

            if ($contactValidator->fails()) {
                return response()->json(['error' => $contactValidator->errors()], 406);
            }
        }

        if (array_key_exists('email', $input)) {
            $emailValidator = Validator::make($request->all(),
                [
                    'email' => 'required|unique:users,email',
                ]
            );

            if ($emailValidator->fails()) {
                return response()->json(['error' => $emailValidator->errors()], 406);
            }
        }


        $input['type_id'] = (int)$request->get('type_id');
        $input['term_id'] = (int)$request->get('term_id');


        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        if ($input['type_id'] == 4) {
            $customer_role = Role::where('slug', '=', 'customer')->first();
            $user->roles()->attach($customer_role);
        } else if ($input['type_id'] == 3) {
            $customer_role = Role::where('slug', '=', 'provider')->first();
            $user->roles()->attach($customer_role);
        }

        $user = Auth::onceUsingId($user['id']);
        $roles = Auth::user()->roles;
        if($input['type_id'] == 3) {
            if (array_key_exists('resident_country', $input)) {
                $service_provider = [
                    'user_id' => $user['id'],
                    'resident_country' => $input['resident_country']
                ];
                $service_provider_detail = ServiceProvider::create($service_provider);
                $user['resident_country'] = $service_provider_detail['resident_country'];
            } else {
                $service_provider = [
                    'user_id' => $user['id'],
                    'resident_country' => ""
                ];
                $service_provider_detail = ServiceProvider::create($service_provider);
            }
        }
        if(array_key_exists('token', $input)) {
            $fcm_response = array();
            //        $fcm_user = FCMDevices::where('fcm_device_token', '=', $input['token'])->get();
            $fcm_user = FCMDevices::where('user_id', '=', $user['id'])->get();
            if ($fcm_user->count() <= 0) {

                $fcm_data = [
                    "user_id" => $user['id'],
                    "fcm_device_token" => $input['token'],
                    "device_type" => $input['device']
                ];
                $fcm_response = FCMDevices::create($fcm_data);
            } else {
                $fcm_response = $fcm_user;
            }
            $user['fcm'] = $fcm_response;
        }

        $user_id=$user->id;
        $now = now()->utc();
        $term_agreement= [
                'user_id' => $user_id,
                'term_id' => $input['term_id'],
                'agreed_at' => $now
            ];
        TermAgreement::create($term_agreement);

        if (isset($user)) {
            return response()->json($user);
        } else {
            $response['message']  = "Please add valid details";
        }
        return response()->json($response);

    }


    public function add_vendors(Request $request) {
        $initialValidator = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'contact' => 'required|unique:users,contact',
                'gender' => 'required',
                'languages' => 'required',

            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();

        $type = UserTypes::where('type', '=', 'Individual Service Provider')->first();
        $input +=  [
            'type_id' => $type->id,
        ];

        $term = TermCondition::where('type', '=', 'Provider Terms')->where('is_latest', '=', 1)->first();
        $input +=  [
            'term_id' => $term->id,
        ];

        if(array_key_exists('profile_photo', $input)) {
            $profileImg = $request->file('profile_photo');
            $profile_name = rand() . '.' . $profileImg->getClientOriginalExtension();
            $profileImg->move(public_path('images/profiles'), $profile_name);
            //            $host = url('/');
            unset($input["profile_photo"]);
            $input +=  [
                'image' => "/images/profiles/" . $profile_name,
            ];
        }


        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $vendors_role = Role::where('slug','=', 'provider')->first();

        $user->roles()->attach($vendors_role);

        $service_provider= [
            'user_id' => $user['id'],
            'resident_country' => $input['resident_country']
        ];
        $service_provider_detail = ServiceProvider::create($service_provider);
        $user['resident_country'] = $service_provider_detail['resident_country'];

        $now = now()->utc();
        $term_agreement= [
            'user_id' => $user->id,
            'term_id' => $input['term_id'],
            'agreed_at' => $now
        ];
        TermAgreement::create($term_agreement);

        $services = $input['services'];

        //        $services =array_map('intval', explode(',', $services));
        $services =explode(',', $services); // json_decode($services, true );

        foreach ($services as $data) {
            $obj = array();
            $obj['user_id'] = $user['id'];
            $obj['service_id'] = $data;
            ProviderServiceMapping::create($obj);
        }

        $user['services'] = $this->get_user_services($user['id']);

        return response()->json($user, 200);
    }

    function updatevendor(Request $request) {

        $input = $request->all();

        $updatedata = [];
        if(array_key_exists('first_name', $input)) {
        $updatedata += [
            'first_name' => $input['first_name'],
        ];

    }
    if(array_key_exists('last_name', $input)) {
        $updatedata += [
            'last_name' => $input['last_name'],
        ];
    }
    if(array_key_exists('contact', $input)) {
        $updatedata += [
            'contact' => $input['contact'],

        ];
    }
    // if(array_key_exists('gender', $input)) {
    //     $updatedata += [
    //          'gender' => $input['gender'],

    //     ];
    // }
    // if(array_key_exists('language', $input)) {
    //     $updatedata += [
    //          'language' => $input['language'],

    //     ];
    // }
        $temp= DB::table('users')
            ->where('id', $input['id'])
            ->update($updatedata);

        return $temp;
    }


    //User profile API
    /**
     * @SWG\Get(
     *   path="/profile",
     *   summary="User Profile by ID",
     *     description="User profile",
     *   operationId="userProfile",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter required Id for user profile",
     *      required=true,
     *     @SWG\Definition(
     *         definition="users",
     *         required={"id"},
     *         @SWG\Property(
     *             description="Enter user id",
     *             property="id",
     *             type="integer"
     *         ),
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User Profile created Successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */
    //User profile
    public function profile(Request $request)
    {

        try {
            // print_r($request->toArray());
            // exit();
            $response = array();
            $validator = Validator::make($request->all(),
                [
                    'id'  => 'required|exists:users,id',
                    'profile_photo' => 'required|image',  //|max:2048
                ]);
            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()], 401);
            }
            $input = $request->all();
            $id = $request->input('id');
            $user = User::find($id);
            $type_id = $user['type_id'];
            $host = url('/');
            if($type_id != 4) {
                // ID Proof Upload
                $validator_provider = Validator::make($request->all(),
                    [
                        'id'  => 'required|exists:users,id',
                        'profile_photo' => 'required|image',  //|max:2048
                        'identity_proof' => 'required|image',
                        'services' => 'required'
                    ]);
                if ($validator_provider->fails())
                {
                    return response()->json(['error'=>$validator_provider->errors()], 401);
                }
               $id_proof =  $this->add_document($request, $input, $id);
               if($id_proof != null) {
                   $user['identity_proofs'] = $id_proof;

                   // Service mapping

                   $services = $input['services'];


                   $services =explode(',', $services);

                   foreach ($services as $data) {
                       $obj = array();
                       $obj['user_id'] = $user['id'];
                       $obj['service_id'] = $data;
                       ProviderServiceMapping::create($obj);
                   }

                   $user['services'] = $this->get_user_services($id);

               } else {
                   $response['message'] = "Id proof not inserted";
                   return response($response, 406)
                       ->header('content-type', 'application/json');
               }
            }

            // Profile Image insert
            $profileImg = $request->file('profile_photo');
            $profile_name = rand() . '.' . $profileImg->getClientOriginalExtension();
            $profileImg->move(public_path('images/profiles'), $profile_name);
            $imagedata = [
                'image' => $host . "/images/profiles/" . $profile_name,
            ];

            if(array_key_exists('languages', $input)) {
                $imagedata += [
                    'languages' => $input['languages'],
                ];
            }


            if($this->update_user_details($imagedata, $id)) {
                $user["image"] = $host . "/images/profiles/" . $profile_name;
            } else {
                $response['message'] = "Profile image not update";
                return response($response, 406)
                    ->header('content-type', 'application/json');
            }


            // ADDRESS
            if(array_key_exists('address', $input)) {
                $address = $input['address'];
                $address = json_decode($address, true);

                $adddressdata = Address::create($address);
                $user['address'] = $adddressdata;
            }

            return response($user, 200)
                ->header('content-type', 'application/json');
        }
        catch (\Exception $e) {
            $response['code'] = 400;
            $response['message'] = "There is some error";
        }
    }
    //Organization profile function
    public function org_profile(Request $request)
    {
        try {
//
            $response = array();
            $validator = Validator::make($request->all(),
                [
                    'id'  => 'required|exists:users,id',
                    'number_of_employee'  => 'required',
                    'profile_photo' => 'required|image',  //|max:2048
                ]);
            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()], 401);
            }

             $input = $request->all();
             $id = $request->input('id');
             $user = User::find($id);
             $type_id = $user['type_id'];

             $host = url('/');

             if($type_id == 2) {

                 // ID Proof Upload
                 $company= [
                     'number_of_employee' => $input['number_of_employee'],
                 ];
                 $this->update_organisation_details($company, $user->org_id);

             }

            // Org_Profile Image insert
            $profileImg = $request->file('profile_photo');
            $profile_name = rand() . '.' . $profileImg->getClientOriginalExtension();
            $profileImg->move(public_path('images/profiles'), $profile_name);
            $imagedata = [
                    'image' => $host . "/images/profiles/" . $profile_name,
            ];

            if($this->update_user_details($imagedata, $id)) {

                $user["image"] = $host . "/images/profiles/" . $profile_name;
            } else {
                $response['message'] = "Profile image not update";
                return response($response, 406)
                    ->header('content-type', 'application/json');
            }


            // ADDRESS
            if(array_key_exists('address', $input)) {
                $address = $input['address'];
                //                $address += [
                //                    "user_id" => $id
                //                ];
                $address = json_decode($address, true);

                $adddressdata = Address::create($address);
                $user['address'] = $adddressdata;
            }


        $result = User::with('documents')->with('address')->with('provider')
        ->with('type')->with('services')->with('organisation')->find($id);
        $checkuser = Auth::onceUsingId($result['id']);
        $roles = Auth::user()->roles;
        $result["roles"] = $roles;
        return response()->json($result, 200);
            // return response($user, 200)
            //     ->header('content-type', 'application/json');
        }
        catch (\Exception $e) {
            $response['code'] = 400;
            $response['message'] = "There is some error";
        }
    }

    public function get_user_services($id) {
        return  ProviderServiceMapping::where('user_id', '=', $id)
            ->leftJoin('services', 'services.id', '=','provider_service_mappings.service_id')
            ->leftJoin('sub_categories', 'sub_categories.id', '=','provider_service_mappings.category_id')
            ->select('services.id as service_id',
                'services.name as service','services.icon_image as service_icon',
                'services.banner_image as service_banner', 'services.description as service_description' ,
                'sub_categories.name as category', 'sub_categories.id as category_id',
                'sub_categories.image as category_image', 'sub_categories.description as category_description')
            ->get();
    }

    public function add_document($request, $input, $id) {
        $doc_file = $request->file('identity_proof');
        $doc_name = rand() . '.' . $doc_file->getClientOriginalExtension();
        $doc_file->move(public_path('images/documents'), $doc_name);

        $doc_type = $input['doc_type'];
        $host = url('/');
        $docdata = [
            'user_id' => $id,
            'type' => $doc_type,
            'doc_name' => $host . "/images/documents/" . $doc_name
        ];
        $id_proof = Document::create($docdata);


        $updatedata = [
            'proof_id' => $id_proof['id'],
        ];
        DB::table('service_providers')
            ->where('user_id', $id)
            ->update($updatedata);

        return $id_proof;
    }

    public function update_organisation_details($dataArray, $id) {
        return DB::table('organisation')
            ->where('id', $id)
            ->update($dataArray);
    }

    public function update_user_details($dataArray, $id) {
        return DB::table('users')
            ->where('id', $id)
            ->update($dataArray);
    }

    public function getSingupDetail() {

        $response = array();

        // get latest terms
        $term = TermCondition::where('is_latest','=', 1)->get();

        $response['terms'] = $term;
        $types = UserTypes::all();
        $response['type'] = $types;
        return response()->json($response);
    }

    // User Initial Profile
    public function init_profile(Request $request) {
        $response = array();
        try {

            $validator = Validator::make($request->all(),
                [
                    'id'  => 'required|exists:users,id',
//                    'profile_photo' => 'required|image',  //|max:2048
                    'gender' => 'required',
                    'address' => 'required'
                ]);
            if ($validator->fails())
            {
                return response()->json(['error'=>$validator->errors()], 401);
            }

            $input = $request->all();

            $id = $request->input('id');
            $user = User::find($id);
            $type_id = $user['type_id'];
            $host = url('/');

            // Profile Image insert
            $imagedata =  [];
            $profile_name  = "";
            if(array_key_exists('profile_photo', $input)) {
                $profileImg = $request->file('profile_photo');
                $profile_name = rand() . '.' . $profileImg->getClientOriginalExtension();
                $profileImg->move(public_path('images/profiles'), $profile_name);
                $requestdata = array();

                $imagedata =  [
                    'image' => $host . "/images/profiles/" . $profile_name,
                ];
            }

            if(array_key_exists('first_name', $input)) {
                $imagedata +=  [
                    'first_name' => $input['first_name'],
                ];
            }
            if(array_key_exists('last_name', $input)) {
                $imagedata +=  [
                    'last_name' => $input['last_name'],
                ];
            }
            if(array_key_exists('gender', $input)) {
                $imagedata +=  [
                    'gender' => $input['gender'],
                ];
            }

            if(array_key_exists('languages', $input)) {
                $imagedata +=  [
                    'languages' => $input['languages'],
                ];
            }

            if(array_key_exists('email', $input)) {
                $imagedata +=  [
                    'email' => $input['email'],
                ];
            }

            if($this->update_user_details($imagedata, $id)) {

                $user = User::with('services')->with('provider')->where('id', '=', $id)->first();

                $checkuser = Auth::onceUsingId($id);
                $roles = Auth::user()->roles;
                $user["roles"] = $roles;

//                $user = Auth::onceUsingId($id);
//                $roles = Auth::user()->roles;
                if(array_key_exists('profile_photo', $input)) {
                    $user["image"] = $host . "/images/profiles/" . $profile_name;
                }

            } else {
                $response['message'] = "Profile image not update";
                return response($response, 406)
                    ->header('content-type', 'application/json');
            }

            if(array_key_exists('services', $input)) {
                $services = $input['services'];

                $services =explode(',', $services);
                foreach ($services as $data) {
                    $obj = array();
                    $obj['user_id'] = $user['id'];
                    $obj['service_id'] = $data;
                    ProviderServiceMapping::create($obj);
                }
;
                $user['services'] = $this->get_user_services($id);
             }
            // ADDRESS
            if(array_key_exists('address', $input)) {

                $address = $input['address'];

                $address = json_decode($address, true);

                $address += [
                    "user_id" => $id
                ];


                $adddressdata = Address::create($address);
//
                $addressRes = Address::where('user_id', '=', $id)->get();
//                return response($addressRes, 403);
                $user['address'] = $addressRes;
            }
            return response($user, 200)
                ->header('content-type', 'application/json');
        } catch (\Exception $e) {
            $response['code'] = 400;
            $response['message'] = $e->getMessage();
            return response($response, 400)
                ->header('content-type', 'application/json');
        }
    }

    public function add_organisation(Request $request) {
        $initialValidator = Validator::make($request->all(),
            [
                'company' => 'required',
                'first_name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'contact' => 'required|unique:users,contact'
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();

        $type = UserTypes::where('type', '=', 'Organisation')->first();
        $input +=  [
            'type_id' => $type->id,
        ];

        $term = TermCondition::where('type', '=', 'Organisation Terms')->where('is_latest', '=', 1)->first();
        $input +=  [
            'term_id' => $term->id,
        ];

        $company = [];

        if(array_key_exists('profile_photo', $input)) {
            $profileImg = $request->file('profile_photo');
            $profile_name = rand() . '.' . $profileImg->getClientOriginalExtension();
            $profileImg->move(public_path('images/profiles'), $profile_name);
            $host = url('/');
            unset($input["profile_photo"]);
            $company +=  [
                'logo' => $host . "/images/profiles/" . $profile_name,
            ];
        }



        $company += [
            'name' => $input['company'],
        ];

        $org = organisation::create($company);

        $input += [
            "org_id" => $org->id
        ];

        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $org_role = Role::where('slug','=', 'organisation-admin')->first();

        $user->roles()->attach($org_role);

        $now = now()->utc();
        $term_agreement= [
            'user_id' => $user->id,
            'term_id' => $input['term_id'],
            'agreed_at' => $now
        ];
        TermAgreement::create($term_agreement);

        return response()->json($user, 200);
    }

    public function add_customer(Request $request) {
        $initialValidator = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'contact' => 'required|unique:users,contact',
                'gender' => 'required',
                'language' => 'required',
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();

        $type = UserTypes::where('type', '=', 'Consumer')->first();
        $input +=  [
            'type_id' => $type->id,
        ];


        $term = TermCondition::where('type', '=', 'Consumer Terms')->where('is_latest', '=', 1)->first();
        $input +=  [
            'term_id' => $term->id,
        ];

        if(array_key_exists('profile_photo', $input)) {
            $profileImg = $request->file('profile_photo');
            $profile_name = rand() . '.' . $profileImg->getClientOriginalExtension();
            $profileImg->move(public_path('images/profiles'), $profile_name);
            $host = url('/');
            unset($input["profile_photo"]);
            $input +=  [
                'image' => $host . "/images/profiles/" . $profile_name,
            ];
        }




        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $customer_role = Role::where('slug','=', 'provider')->first();
        $user->roles()->attach($customer_role);

        $now = now()->utc();
        $term_agreement= [
            'user_id' => $user->id,
            'term_id' => $input['term_id'],
            'agreed_at' => $now
        ];
        TermAgreement::create($term_agreement);

        return response()->json($user, 200);
    }



    public function customer_register(Request $request) {
        $response = array();
        $initialValidator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'type' => 'required',
                'gender' => 'required',
                'language' => 'required',
                'contact' => 'required',
            ]);

        if ($initialValidator->fails())
        {
            return response()->json(['error'=>$initialValidator->errors()], 401);
        }

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user_id=$user->id;
        $dataArray= [
            'user_id' => $user_id,
            'gender' => $input['gender'],
            'languages_known' => $input['language']
        ];
        $details = IndividualServiceProvider::create($dataArray);
        $user["details"] = $details;

        if (isset($user)) {
            $response  = $user;
        } else {
            $response['message']  = "Please add valid details";
            return response()->json($response, 406);
        }

        return response()->json($response, 200);
    }



        //Change password api
    /**
     * @SWG\Post(
     *   path="/changepassword",
     *   summary="User can change password.",
     *     description="User can change current password",
     *   operationId="userPasswordChange",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter email and new password for change current user password.",
     *      required=true,
     *     @SWG\Definition(
     *         definition="password_change",
     *         required={"email","password"},
     *         @SWG\Property(
     *             description="Enter email",
     *             property="email",
     *             type="string"
     *         ),
     *          @SWG\Property(
     *             description="Enter Password",
     *             property="password",
     *             type="string"
     *         )
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User password change successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */

    public function changepassword(Request $request) {

        try {
            $response = array();
            $email = $request->input("email");
            $password = $request->input("password");

            if(trim($email) == "" || trim($password) == "") {
                return response(array(
                    'message' => "Invalid parameters.",
                    'statuscode' => 0,
                ),
                    200);
            }


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                return response(array(
                    'message' => $emailErr,
                    'statuscode' => 0,
                ),
                    200);
            }

            $user = User::where('email',$email)->first();

            if(isset($user) && !empty($user)) {

                $user->password = Hash::make($password);
                $user->save();

                return response(array(
                    'statuscode' => true,
                    'message' => "Password updated successfully.",

                ),
                    200);

            } else {

                return response(array(
                    'statuscode' => false,
                    'message' => "No user with this email id available.",

                ),
                    200);

            }
        } catch (\Exception $e) {
            $this->$response($request, "There is some error in change password");
            $this->$response($request, $e->getMessage() . " " . $e->getLine());
        }
    }



    //reset Password
    /**
     * @SWG\Post(
     *   path="/resetPassword",
     *   summary="User will get reset password link.",
     *     description="User will get reset password link",
     *   operationId="userPasswordReset",
     *   consumes={"application/xml","application/json"},
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *      in="body",
     *      name="body",
     *      description="Enter email for user password reset",
     *      required=true,
     *     @SWG\Definition(
     *         definition="password_reset",
     *         required={"email"},
     *         @SWG\Property(
     *             description="Enter email",
     *             property="email",
     *             type="string"
     *         )
     *          @SWG\Property(
     *             description="Enter Password",
     *             property="password",
     *             type="string"
     *         )
     *       )
     *      ),
     *   @SWG\Response(
     *     response=200,
     *     description="User password reset link sent successfully!"
     *   ),
     *   @SWG\Response(response=404, description="Page not Found"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     *
     */

    public function resetPassword(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|confirmed'
        ]);

        //check if input is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
// Validate the token
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();
// Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');

        $user = User::where('email', $tokenData->email)->first();
// Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
//Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
            ->delete();

        //Send Email Reset Success Email
        if ($this->sendSuccessEmail($tokenData->email)) {
            return view('index');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }

    }




    // Forgot Password function

        public function resetPasswordform() {
            $requestObject = Input::json()->all();
            $email = Input::json('email');


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $this->exceptionLogger->writeLog($requestObject, $emailErr);
                return Response::json(array(
                    'message' => $emailErr,
                    'statuscode' => 0,
                ),
                    200);
            } else {

                $user = User::where('email',$email)->first();

                if(isset($user) && !empty($user)) {

                    $response = $this->broker()->sendResetLink(['email'=>$email]);

                    $this->exceptionLogger->writeLog($requestObject, 'Mail sent successfully.');
                    return Response::json(array(
                        'response' => $response,
                        'message' => "Mail sent successfully.",
                        'statuscode' => 1,
                    ),
                        200);
                } else {
                    $this->exceptionLogger->writeLog($requestObject, "No user with this email id available. Please Sign up.");
                    return Response::json(array(
                        'message' => "No user with this email id available. Please Sign up.",
                        'statuscode' => 0,
                    ),
                        200);

                }

            }
        } 
    



    public function changePasswordform() {

        
            $requestObject = Input::json()->all();
            $password = Input::json("password");

            $user = User::where('email',$email)->first();

            if(isset($user) && !empty($user)) {

                $input['password'] = Hash::make($input['password']);
                // $user->password = Hash::make($password);
                $user->save();

                $this->exceptionLogger->writeLog($requestObject, "Password updated successfully.");
                return Response::json(array(
                    'message' => "Password updated successfully.",
                    'statuscode' => 1,
                ),
                    200);

            } else {
                $this->exceptionLogger->writeLog($requestObject, "No user with this email id available.");
                return Response::json(array(
                    'message' => "No user with this email id available.",
                    'statuscode' => 0,
                ),
                    200);

            }
    }
}
