<?php 

class About extends Controller {
    public function index($nama = 'fahri', $profesi = 'programer') {
        $data['nama'] = $nama;
        $data['profesi'] = $profesi;
        $data['judul'] = 'About';
        
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page() {
        $data['judul'] = 'About-page';
        $this->view('templates/header', $data);
        $this->view('About/page');
        $this->view('templates/footer');
    }
}