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
        $prisoner = new \App\Models\prisonerModel();
        
        $data['approved']= json_decode(json_encode($prisoner->whereIn('is_released', [1])->paginate(10)),true);

        return view('parole/approved', $data);
    }
    public function suggested()
    {
        $prisoner = new \App\Models\prisonerModel();
        $punishment = new \App\Models\punishmentModel();
        
        $data['suggested']= json_decode(json_encode($punishment->join('prisoners', 'prisoners.defendant_id=defendant')->whereIn('is_recommended', [1], 'punishment', [2])->paginate(10)),true);

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
        $id = $this->request->getPost('prisoner_id');
    
        $data = [
            'is_released'=>$decision,
        ];

        $query = $prisoner->update($id, $data);
        
        if($decision == 1 ){    
            $id = $this->request->getPost('prisoner_id');
    
            $data = [
                'is_released'=>$decision,
            ];
    
            $query = $prisoner->update($id, $data);
    
            if($query){
    
                $parole_officer = $this->request->getPost('parole_officer');
        
                $values = [
                    'parole_officer'=>$parole_officer,
                    'prisoner'=>$prisoner,
                ];
        
                $new_query = $released->insert($values);
    
                if($new_query){
                return redirect()->to('suggested')->with('success', 'You have approved parole successfully');
                }
            }
        }else{
            $id = $this->request->getPost('prisoner_id');
    
            $data = [
                'is_reccomended'=>0,
            ];
    
            $query = $prisoner->update($id, $data);
    
            if($query){
                return redirect()->to('suggested')->with('fail', 'You have denied parole');
            }
        }
    }
}