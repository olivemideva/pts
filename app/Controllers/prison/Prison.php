<?php

namespace App\Controllers\prison;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\prisonerModel;
use App\Models\detaineeModel;
use App\Models\punishmentModel;
use App\Models\reviewModel;

class Prison extends BaseController
{
    public function index()
    {
        return view('prison/prison');
    }
    public function view_prisoners()
    {
        $detainee = new \App\Models\detaineeModel();
        $punishment = new \App\Models\punishmentModel();
        $prisoner = new \App\Models\prisonerModel();

        $data['prisoners']=json_decode(json_encode($punishment
        ->whereIn('punishments.punishment', [2])
        ->whereIn('prisoners.is_released',[0])
        ->whereIn('prisoners.is_recommended',[0])
        ->whereIn('detainees.is_admitted', [1])
        ->join('prisoners','prisoners.defendant_id=punishments.defendant')
        ->join('detainees','detainees.detainee_id=punishments.defendant')
        ->paginate(10)),true);

        return view('prison/view-prisoners', $data);
    }
    public function new_prisoners()
    {
        $detainee = new \App\Models\detaineeModel();
        $punishment = new \App\Models\punishmentModel();
        $prisoner = new \App\Models\prisonerModel();
        
        $data['new_prisoner']= json_decode(json_encode($punishment
        ->whereIn('detainees.is_admitted', [0])
        ->whereIn('punishments.punishment', [2])
        ->join('detainees', 'detainees.detainee_id=defendant')
        ->paginate(10)),true);

        //$data['new_prisoner']=json_decode(json_encode($punishment
        //->whereIn('punishments.punishment',[2], 'detainees.is_admitted', [0])
        //->join('detainees','detainees.detainee_id=punishments.defendant')->paginate(10)),true);

        return view('prison/new-prisoners', $data);
    }
    public function change_password()
    {
        return view('prison/change-password');
    }
    public function fetch_prisoner($id)
    {
        $detainee = new \App\Models\detaineeModel();
        $punishment = new \App\Models\punishmentModel();
        $prisoner = new \App\Models\prisonerModel();

        $data['info_prisoner']= json_decode(json_encode($punishment->join('detainees', 'detainees.detainee_id=defendant')->whereIn('detainee_id', [$id], 'punishment', [2])->first()),true);
        //$data['info_prisoner']=json_decode(json_encode($punishment
        //->whereIn('punishments.punishment',[2] ,'detainee_id', [$id])
        //->join('detainees','detainees.detainee_id=punishments.defendant')),true);

        //$data['defendants'] = $defendants->where('detainee_id' , $id, )->first();  

        //echo print_r($data);
        return view('prison/add_info', $data);
    }
    public function Rfetch_prisoner($id)
    {
        $detainee = new \App\Models\detaineeModel();
        $punishment = new \App\Models\punishmentModel();
        $prisoner = new \App\Models\prisonerModel();

        $data['review_prisoner'] = $prisoner->where('prisoner_id' , $id)->first();

        //echo print_r($data);
        return view('prison/review_prisoner', $data);
    }
    public function show_recommend($id)
    {
        $detainee = new \App\Models\detaineeModel();
        $punishment = new \App\Models\punishmentModel();
        $prisoner = new \App\Models\prisonerModel();

        $data['prisoner'] = $prisoner->where('prisoner_id' , $id)->first();

        //echo print_r($data);
        return view('prison/recommend', $data);
    }
    // public function Mfetch_prisoner($id)
    // {
    //     $review = new \App\Models\reviewModel();
    //     $prisoner = new \App\Models\prisonerModel(); 

    //     $values['review'] = $prisoner->where('prisoner_id' , $id)->first();
    //     //$data['reviews']= json_decode(json_encode($review->join('prisoners', 'prisoners.prisoner_id=prisoner')->whereIn('prisoner_id', [$id])->countAll()),true);

    //     //echo print_r($values);
    //     return view('prison/more_info', $values);
    // }
    public function charts($id)
    {
        $review = new \App\Models\reviewModel();
        $prisoner = new \App\Models\prisonerModel(); 

        $prisoners = $review->where('prisoner' , $id)->findAll();
        $values[] = $review->where('prisoner' , $id)->findAll();

		$dataPoints = [];

		foreach ($prisoners as $prisoner) {
			$dataPoints[] = array(
				"prisoner_id" => $prisoner['prisoner'],
				"data" => [
					intval($prisoner['participation']),
					intval($prisoner['behaviour']),
					intval($prisoner['team_work']),
					intval($prisoner['social_interactions']),
				],
			);
		}

        //echo print_r($values);

		return view("prison/more_info", [
			"data" => json_encode($dataPoints),
            "prisoner" => json_decode(json_encode($values)),
			"fields" => json_encode(array(
				"Participation",
				"Behaviour",
				"Team work",
				"Social interactions",
			)),
		]);
    }
    public function recommend()
    {
        $review = new \App\Models\reviewModel();
        $prisoner = new \App\Models\prisonerModel(); 

        $id = $this->request->getPost('prisoner_id');
        $recommend = $this->request->getPost('recommend');

         $data = [
            'is_recommended'=>$recommend,
        ];

        $query = $prisoner->update($id, $data);

        
        if(!$query){
            return redirect()->back()->with('fail', 'Something went wrong. Please try again.');
        }else{
            return redirect()->to('view_prisoners')->with('success', 'You recommended the prisoner successfully');
        }
    }
    public function add_info()
    {
        $detainee = new \App\Models\detaineeModel();
        $punishment = new \App\Models\punishmentModel();
        $prisoner = new \App\Models\prisonerModel();    

        $id = $this->request->getPost('detainee_id');
        $cell_no = $this->request->getPost('cell_no');
        $admitted_on = $this->request->getPost('admitted_on');
        $firstname = $this->request->getPost('first_name');
        $lastname = $this->request->getPost('last_name');
        $arrested_for = $this->request->getPost('arrested_for');
        $gender = $this->request->getPost('gender');

        $values = [
            'first_name'=>$firstname,
            'last_name'=>$lastname,
            'arrested_for'=>$arrested_for,
            'defendant_id'=>$id,
            'gender'=>$gender,
            'cell_no'=>$cell_no,
            'admitted_on'=>$admitted_on,
        ];

        $query = $prisoner->insert($values);
        
        if(!$query){
            return redirect()->back()->with('fail', 'Something went wrong. Please try again.');
        }else{
            $id = $this->request->getPost('detainee_id');
            
            $data = [
                'is_admitted'=>1,
            ];
    
            $new_query = $detainee->update($id, $data);

            if($new_query){
                return redirect()->to('new_prisoners')->with('success', 'You have added a new information successfully');
            }

        }
    }
    public function prisoner_review()
    {
        $review = new \App\Models\reviewModel();
        $prisoner = new \App\Models\prisonerModel(); 
        
        $id = $this->request->getPost('prisoner_id');
        $participation = $this->request->getPost('participation');
        $behavoiur = $this->request->getPost('behaviour');
        $team_work = $this->request->getPost('team_work');
        $social_interaction = $this->request->getPost('social_interaction');
        // $recommend = $this->request->getPost('recommend');

        $values = [
            'prisoner'=>$id,
            'participation'=>$participation,
            'behaviour'=>$behavoiur,
            'team_work'=>$team_work,
            'social_interactions'=>$social_interaction,
        ];

        $query = $review->insert($values);

        // $data = [
        //     'is_recommended'=>$recommend,
        // ];

        // $query = $prisoner->update($id, $data);

        
        if(!$query){
            return redirect()->back()->with('fail', 'Something went wrong. Please try again.');
        }else{
            return redirect()->to('view_prisoners')->with('success', 'You have added reviews successfully');
        }

    }
    public function suggested()
    {
        $prisoner = new \App\Models\prisonerModel();
        $punishment = new \App\Models\punishmentModel();
        
        $data['suggested']= json_decode(json_encode($punishment
        ->join('prisoners','prisoners.defendant_id=punishments.defendant')
        ->join('detainees','detainees.detainee_id=punishments.defendant')
        ->whereIn('is_recommended', [1], 'is_relesed', [0])
        ->paginate(10)),true);

        return view('prison/suggested', $data);
    }
}
