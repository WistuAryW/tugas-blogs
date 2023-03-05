<?php

class Blog extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Blog_model');
        $this->load->helper('form');
        $this->load->library('session');
    }
    
    public function index($offset = 0)
    {       
        $this->load->library('pagination');
        $config['base_url']= site_url('blog/index');
        $config['total_rows']= $this->Blog_model->getTotalBlog();
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        
        $query = $this->Blog_model->getBlogs($config['per_page'],$offset);
        $data['blogs']= $query->result_array();

        $this->load->view('blog',$data); 
    }


    public function detail($id)
    {   
        $data['blog'] = $this->Blog_model->getSingleBlog('id',$id);
        $data['blogs'] = $this->Blog_model->otherPost($id,6,0)->result_array();
        $this->load->view('detail',$data);
    }

    public function add()
    {
        if($this->input->post())
        {
            $this->form_validation->set_rules('title','Judul','required');
            $this->form_validation->set_rules('url','URL','required');
            $this->form_validation->set_rules('content','Konten','required');    

            if($this->form_validation->run()===TRUE)
            {
                //konfigurasi upload
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 5000;
                $this->load->library('upload',$config);

                if(empty($_FILES['cover']['name']) || empty($_FILES['thumbnail']['name'])){
                    $this->session->set_flashdata('message','<div class="alert alert-warning">Mohon upload thumbnail dan banner</div>');
                    redirect('/blog/add');
                }
                else
                {
                    $this->upload->do_upload('cover');
                    $data1 = $this->upload->data();
                    $cover = $data1['file_name'];   
                    
                    $this->upload->do_upload('thumbnail');
                    $data2 = $this->upload->data();
                    $thumbnail = $data2['file_name'];
                }
                
                $title = $this->input->post('title');
                $content =$this->input->post('content');
                $url =$this->input->post('url');
                $data = ['title'=>$title,'content'=>$content,'url'=>$url,'thumbnail'=>$thumbnail,'cover'=>$cover];
                
                $id=$this->Blog_model->insertBlog($data);
                if($id)
                {
                    $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil disimpan</div>');
                    redirect('/');
                }
                else
                {
                    $this->session->set_flashdata('message','<div class="alert alert-warning">Data gagal disimpan</div>');
                }
            }
            

        }
        $this->load->view('form_add');
    }

    public function edit($id)
    {
        $data['blog']=$this->Blog_model->getSingleBlog('id',$id);
        $this->form_validation->set_rules('title','Judul','required');
        $this->form_validation->set_rules('url','URL','required|alpha_dash');
        $this->form_validation->set_rules('content','Konten','required');

        if($this->form_validation->run()===TRUE)
        {
            $post['title']=$this->input->post('title');
            $post['content']=$this->input->post('content');
            $post['url']=$this->input->post('url');

             //konfigurasi upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5000;
            $this->load->library('upload',$config);

            if(!empty($_FILES['cover']['name'])){
                $this->upload->do_upload('cover');
                $post['cover'] = $this->upload->data('file_name');
            }

            if(!empty($_FILES['thumbnail']['name'])){
                $this->upload->do_upload('thumbnail');
                $post['thumbnail'] = $this->upload->data('file_name');
            }
            
            $id=$this->Blog_model->updatetBlog($id,$post);

            if($id)
            {
                $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil disimpan</div>');
                redirect('/');
            }
            else
            {
                $this->session->set_flashdata('message','<div class="alert alert-warning">Data gagal disimpan</div>');
            }
            
        }
        $this->load->view('form_edit',$data);
    }

    public function delete($id)
    {
        $result = $this->Blog_model->deleteBlog($id);
        if($result)
        {
            $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus</div>');
        }
        else{
            $this->session->set_flashdata('message','<div class="alert alert-warning">Data gagal dihapus</div>');
        }
        redirect('/');
    }

    public function login()
    {
        if($this->input->post())
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if($username=='admin@gmail.com' && $password=='admin')
            {
                $_SESSION['username']= 'admin';
                redirect('/');
            }
            else{
                $this->session->set_flashdata('message','<div class="alert alert-warning">Username atau password anda tidak valid</div>');
                redirect('blog/login');
            }
        }
        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}