<?php

namespace App\Http\Controllers;

use App\Models\ProjectRequest;
use App\Models\TeamMember;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectRequestMail;
use Illuminate\Support\Facades\View;

class SinglePageController extends Controller
{
    protected $teamMembers;
    //protected $projectRequests;
    protected $projectClientId;

    public function __construct(TeamMember $teamMembers) {
        //ProjectRequest $projectRequests
        $this->teamMembers = $teamMembers;
        //$this->projectRequests = $projectRequests;
    }

    public function index() {
        $teamMembers = TeamMember::get();
        $clients = Client::get(['id', 'name']);
        return view('app', compact('teamMembers', 'clients'));
    }


            public function createProjectTeam(Request $request){
                try {
                    $projectRequest = ProjectRequest::create(['project_title' => $request->projectTitle, 'client_id' => $request->projectClientId]);

                    TeamMember::whereIn('email', $request->projectTeamEmails)
                    ->update([
                        'project_request_id' => $projectRequest->id 
                    ]);

                    $projectTeam = TeamMember::where('project_request_id', $projectRequest->id)->get();
                    //$userFullName = User::where('id', $request->projectClientId)->value('name');

                return response()->json( [
                    'success'=> true,
                    'projectRequest' => $projectRequest,
                    'projectTeam' => $projectTeam,
                    //'clientFullName' => $userFullName
                ]);

                //return redirect()->route('view.project.team', ['project_request_id' => $projectRequest->id ]);

                } catch(\Exception $e){
                    return ['success' => false, 'message' => 'project team creation failed'];
                }

            }

            public function sendProjectTeam($projectClientId) {

                $projectClientEmail = Client::where('id', $projectClientId)->value('email');

                Mail::to($projectClientEmail)->send(new ProjectRequestMail($projectClientId));
        
                return ['success' => true, 'message' => 'Email was sent'];
            }

            public function getProjectRequests($clientId) {
                try {
                    
                    $projectRequests = ProjectRequest::where('client_id', $clientId)->get();
                    return response()->json( [
                        'success'=> true,
                        'projectRequests' => $projectRequests
                    ]);
                } catch(\Exception $e){
                    return ['success' => false, 'message' => 'getting project requests failed'];
                }
            }

}
