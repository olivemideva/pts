<?php

namespace App\Controllers\parole;
use App\Controllers\BaseController;
use App\Models\userModel;
use App\Models\prisonerModel;
use App\Models\detaineeModel;
use App\Models\punishmentModel;
use App\Models\reviewModel;

class Parole extends BaseController
{
    public function index()
    {
        return view('parole/parole');
    }
    public function approved()
    {
        $detainee = new \App\Models\detaineeModel();
        $punishment = new \App\Models\punishmentModel();
        $prisoner = new \App\Models\prisonerModel();
        $released = new \App\Models\releaseModel();
        $user = new \App\Models\userModel(); 
        
        $data['approved']= json_decode(json_encode($released
        ->whereIn('is_released', [1])
        ->join('prisoners','prisoners.prisoner_id=released.prisoner')
        ->join('users','users.user_id=released.parole_officer')
        ->paginate(10)),true);

        // $data['approved']= json_decode(json_encode($released
        // ->whereIn('is_released', [1])
        // ->join('prisoners','prisoners.prisoner_id=prisoner')
        // ->join('users','users.user_id=.parole_officer')
        // ->paginate(10)),true);

        //echo print_r($data);

        return view('parole/approved', $data);
    }
    public function suggested()
    {
        $prisoner = new \App\Models\prisonerModel();
        $punishment = new \App\Models\punishmentModel();
        
        $data['suggested']= json_decode(json_encode($punishment->join('prisoners', 'prisoners.defendant_id=defendant')->whereIn('is_recommended', [1], 'is_relesed', [0])->paginate(10)),true);

        return view('parole/suggested', $data);
    }
    public function charts($id)
    {
        $review = new \App\Models\reviewModel();
        $prisoner = new \App\Models\prisonerModel(); 

        $prisoners = $review->where('prisoner' , $id)->findAll();

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
            $prisoner_id = $prisoner['prisoner'];
		}

		return view("parole/more_info", [
			"data" => json_encode($dataPoints),
            "prisoner" => json_encode($prisoner_id),
			"fields" => json_encode(array(
				"Participation",
				"Behaviour",
				"Team work",
				"Social interactions",
			)),
		]);
    }
    public function decision()
    {
        $released = new \App\Models\releaseModel();
        $prisoner = new \App\Models\prisonerModel();

        $decision = $this->request->getPost('decision');
        $recommend = $this->request->getPost('recommend');
        $id = $this->request->getPost('prisoner_id');
    
        $data = [
            'is_released'=>$decision,
            'is_recommended'=>$recommend,
        ];

        $query = $prisoner->update($id, $data);

        if($query){

            if($decision==1){
            $parole_officer = $this->request->getPost('parole_officer');
    
            $data = [
                'parole_officer'=>$parole_officer,
                'prisoner'=>$id,
            ];
            $query = $released->insert($data);
            }

            return redirect()->to('suggested')->with('success', 'Your response has been recorded');
        }

    }
    public function fetch_response($id)
    {
        $detainee = new \App\Models\detaineeModel();
        $punishment = new \App\Models\punishmentModel();
        $prisoner = new \App\Models\prisonerModel();

        $data['prisoner'] = $prisoner->where('prisoner_id' , $id)->first();

        //echo print_r($data);
        return view('parole/response', $data);
    }
}