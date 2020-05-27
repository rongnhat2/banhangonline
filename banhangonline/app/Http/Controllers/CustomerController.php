<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Customer;

class CustomerController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();

            $id = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            DB::table('user_detail')->insert([
                'users_id' => $id,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            DB::commit();
            return redirect()->route('customer.login');
        } catch (\Exception $exception) {
            dd($exception);
			Session::flash('error', 'Email đã tồn tại');
            return redirect()->route('customer.register');
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit()
    {
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('category')->get();

        $user_ = Session::has('customer') ? Session::get('customer')->customer : null;
        $user =  DB::table('users')
            ->where('users.id', '=', $user_['id'])
            ->join('user_detail', 'users.id', '=', 'user_detail.users_id')
            ->select('users.*', 'user_detail.phone', 'user_detail.address')
            ->first();                  
        // $items = $this->item->first();
        // dd($user);

        return view('user.user_update', compact('user', 'categories', 'amount_item'));
    }

    public function update(Request $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // // update user tabale
            DB::table('user_detail')->where('users_id', '=', $request->id)->update([
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            DB::commit();
            return redirect()->route('customer.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function changePassword()
    {
        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('category')->get();

        $user_ = Session::has('customer') ? Session::get('customer')->customer : null;
        $user =  DB::table('users')
            ->where('users.id', '=', $user_['id'])
            ->first();                  
        // $items = $this->item->first();
        // dd($user);

        return view('user.user_password_update', compact('user', 'categories', 'amount_item'));
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',     
        ], $messages);

        return $validator;
    }  
    public function updatePassword(Request $request)
    {
        if(Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails()) {
                Session::flash('error', 'Mật Khẩu Nhập Lại Không Chính Xác');
                return redirect()->route('customer.changePassword');    
                // return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            } else {  
                $current_password = Auth::User()->password;           
                if(Hash::check($request_data['current-password'], $current_password)) {           
                    $user_id = Auth::User()->id;                       
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);
                    $obj_user->save(); 
                    Session::flash('success', 'Đổi Mật Khẩu Thành Công!');
                    return redirect()->route('customer.edit');
                } else {           
                    Session::flash('error', 'Mật khẩu Cũ không đúng!');
                    return redirect()->route('customer.changePassword');
                }
            }        
        } else {
            return redirect()->to('/');
        }    
    }

    public function postLogin(Request $request) {
    // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
    
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('customer.login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang

                $customer_session = DB::table('users')->where('email', '=', $email)->first();
                $customer       =   new Customer($customer_session);
                $customer->Create($customer_session);
                $request->session()->put('customer', $customer);

                return redirect()->route('customer.index');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect()->route('customer.login');
            }
        }
    }

    
    public function postLoginOrder(Request $request) {
    // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
    
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('customer.postLoginOrder')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang

                $customer_session = DB::table('users')->where('email', '=', $email)->first();
                $customer       =   new Customer($customer_session);
                $customer->Create($customer_session);
                $request->session()->put('customer', $customer);

                return redirect()->route('customer.checkout');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect()->route('customer.postLoginOrder');
            }
        }
    }

    public function adminpostLogin(Request $request) {
    // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
    
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang

                $customer_session = DB::table('users')->where('email', '=', $email)->first();
                $customer       =   new Customer($customer_session);
                $customer->Create($customer_session);
                $request->session()->put('customer', $customer);
                
                return redirect()->route('item.index');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect()->back();
            }
        }
    }


    public function postOrder(Request $request) {
    	if(Auth::check()){
            dd($request);
    		dd('da dang nhap');
    	}else{
            dd($request);
			Session::flash('success', 'Bạn Cần Đăng Nhập Để Đặt Hàng');
	        return redirect()->route('customer.login');
    	}
    }

}
