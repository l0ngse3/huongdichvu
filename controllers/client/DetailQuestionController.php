<?php 
class DetaiQuestionController extends Controller
{
    /**
     * summary
     */
    public $CatagoryModel;
    public $QuestionModel;
    public $VoteQuestionModel;
    public $UserModel;
    public $NewsModel;

    public function __construct($param = NULL)
    {
        parent::__construct();
        
        include 'models/CatagoryModel.php';
        include 'models/VoteQuestionModel.php';
        include 'models/QuestionModel.php';
        include 'models/UserModel.php';
        include 'models/NewsModel.php';

        $this->CatagoryModel = new CatagoryModel();
        $this->QuestionModel = new QuestionModel();
        $this->VoteQuestionModel = new VoteQuestionModel();
        $this->UserModel = new UserModel();
        $this->NewsModel = new NewsModel();

        $this->view->js = '<script src="resources/js/detail_question.js"></script>';
    }

    public function detail_question()
    {

        $this->view->catagories = $this->CatagoryModel->all();

        if(isset($_SESSION['user']))
        {
            $user = $this->UserModel->find($_SESSION['user']['id']);
            if(!empty($user[0]['tag']))
            {
                $tag_user = explode(',',$user[0]['tag']);

                foreach ($tag_user as $value) 
                {
                    if(count($tag_user) > 5)
                        array_shift($tag_user);
                    else
                        break;
                }

                $data = [];
                $tintuc = [];

                foreach ($tag_user as $value) 
                {
                    $results = $this->QuestionModel->find_by_tag($value);

                    foreach ($results as $result) 
                    {
                        if(!in_array($result,$data))
                            array_push($data,$result);
                    }

                    $news = $this->NewsModel->find_by_tag($value);

                    foreach ($news as $new) 
                    {
                        if(!in_array($new,$tintuc))
                            array_push($tintuc,$new);
                    }
                }

                if(count($data) != 0)
                {
                    foreach ($data as $value) {
                        if(count($data) > 5)
                            //array_shift($data);
                            array_splice($data,rand(0,count($data)),1);

                        else
                            break;
                    }
                    $this->view->questions = $data;
                }
                else
                    $this->view->questions = $this->QuestionModel->order_by_time_and_count_reply();

                if(count($tintuc) != 0)
                {
                    foreach ($tintuc as $value) {
                        if(count($tintuc) > 6)
                            //array_pop($tintuc);
                            array_splice($tintuc,rand(0,count($tintuc)),1);
                        else
                            break;
                    }
                    $this->view->news = $tintuc;
                }
                else
                    $this->view->news = $this->NewsModel->rand();
            }
            else
            {   
                $this->view->questions = $this->QuestionModel->order_by_time_and_count_reply();
                $this->view->news = $this->NewsModel->rand();
            }
        }
        else
        {
            $this->view->questions = $this->QuestionModel->order_by_time_and_count_reply();
            $this->view->news = $this->NewsModel->rand();
        }

        
        
        $this->view->Render('client/head');
        $this->view->Render('client/header');
        $this->view->Render('client/detail_question/banner');
        $this->view->Render('client/detail_question/detail_question');
        $this->view->Render('client/detail_question/option');
        $this->view->Render('client/footer');

        

        if(isset($_SESSION['user']))
        {
            $url = $_SERVER['REQUEST_URI'];
            $url = explode('/', $url);
            $slug = $url[count($url)-1];
            $question = $this->QuestionModel->find($slug);

            $user = $this->UserModel->find($_SESSION['user']['id']);

            $tag_question = explode(',',$question[0]['tag']);

            $tag_user = explode(',',$user[0]['tag']);

            foreach ($tag_question as $value) 
            {
                if(!in_array($value,$tag_user))
                {
                    array_push($tag_user,$value);
                }
            }
            if(count($tag_user) > 10)
            {
                foreach ($tag_user as $value) {
                    if(count($tag_user) > 10)
                        array_shift($tag_user);
                    else
                        break;
                }
            }

            $tag_user = implode(',', $tag_user);
            $this->UserModel->update_tag($_SESSION['user']['id'],$tag_user);
        }

    }

}
