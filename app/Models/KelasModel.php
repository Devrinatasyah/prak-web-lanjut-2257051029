public function create(){
    return view('create_user', [ 
        'kelas' => Kelas: :all(),
        ]);
}
