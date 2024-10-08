<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
   
    public function profile($nama = '', $kelas = '', $npm = ''){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];
        return view('profile', $data);
    }

    public $userModel;
    public $kelasModel;

    public function create(){
        $kelasModel = new Kelas();
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
        
        return view('create_user', $data);
        
    }

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'Create User',
            'kelas' => $this->userModel->getUser(),
        ];

        $users = UserMOdel::all();

        return view('list_user', compact('users'), $data);
    }

    public function edit($id)
    {
    // Cari user berdasarkan ID
    $user = User::find($id);

    // Jika user tidak ditemukan, redirect dengan pesan error
    if (!$user) {
        return redirect()->route('users.index')->with('error', 'User tidak ditemukan');
    }

    // Return view untuk halaman edit, sambil mengirimkan data user
    return view('users.edit', compact('user'));
    }



    // public function store(Request $request)
    // {
       
    //     $validatedData = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'npm' => 'required|string|max:255',
    //         'kelas_id' => 'required|exists:kelas,id',
    //     ],
    //     [
    //         'nama.required' => 'Nama harus diisi.',
    //         'npm.required' => 'NPM harus diisi.',
    //         'kelas_id.required' => 'Kelas harus dipilih.',
    //     ]);


    //     $user = UserModel::create($validatedData);

    //     $user->load('kelas');

    //     return view('profile', [
    //         'nama' => $user->nama,
    //         'npm' => $user->npm,
    //         'nama_kelas' => $user->kelas->nama_kelas ?? 'kelas tidak ditemukan',
    //     ]);

    // }
    public function store(Request $request)
    {
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            ]);
            return redirect()->to('/user');
           
    }

}