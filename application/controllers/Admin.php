<?php

class Admin extends CI_controller
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Admin_model');
        log_message('debug', 'topic 초기화');
    }

    // url/index.php/class/method
    public function index(){
        log_message('debug', 'index 호출');
        
        // $datas=$this->Admin_model->gets();

        // $this->load->view('main', array('datas'=>$datas));

        $this->load->view('board_index');
    }

    // url/index.php/class/method/$params
    public function create($params){
        $data = [];
        //텍스트 log 출력
        log_message('info', var_export($data, 1));

        if(empty($data)){
            log_message('error', 'topic이 없습니다.');
            show_error('topic이 없습니다.');
        }

        echo $params;
    }

    // views/test.php 로드
    // www/assets/css css는 views에 포함시키지 말것
    public function store($params){
        //사용자정의 config 로드하기
        $this->load->config('sample');

        // view 에 데이터 넘기기
        $data=array('params' => $params);

        // 뷰분기
        $this->load->view('header');

        // views/test.html 경우 $this->load->view('test.html');
        $this->load->view('test', $data);
        
        // 뷰분기
        $this->load->view('footer');
    }

    public function get($id){
        $topic=$this->Admin_model->get($id);

        $this->load->view('get', array('topic'=>$topic));
    }

    public function helper(){
        //helper 가져오기
        $this->load->helper('url');

        //helper 두개 가져오기
        $this->load->helper(array('url', 'HTML'));

        //직접 제작한 헬퍼 : korean_helper.php 로드
        $this->load->helper('korean');
        //kdate($topic->created);
        //헬퍼에 있는 함수 실행
        
        // config/autoload.php 에서 자동로드 가능
    }
}