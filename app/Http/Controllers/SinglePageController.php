<?php

namespace App\Http\Controllers;

use App\Models\ProjectRequest;
use App\Models\TeamMember;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectRequestMail;

class SinglePageController extends Controller
{
    protected $teamMembers;
    protected $projectRequests;
    protected $clients;

    public function __construct(TeamMember $teamMembers, ProjectRequest $projectRequests, Client $clients) {
        $this->teamMembers = $teamMembers;
        $this->projectRequests = $projectRequests;
        $this->clients = $clients;
    }

    public function index() {
        $teamMembers = TeamMember::get();
        return view('app', compact('teamMembers'));
    }

    /*public function viewProjectTeam($projectRequestId) { 
        return view('view-project-team');
    }*/

            public function createProjectTeam(Request $request){
                try {
                    $projectRequest = ProjectRequest::create(['project_title' => $request->projectTitle]);

                    TeamMember::whereIn('email', $request->projectTeamEmails)
                    ->update([
                        'project_request_id' => $projectRequest->id 
                    ]);

                    $projectTeam = TeamMember::where('project_request_id', $projectRequest->id)->get();

                return response()->json( [
                    'success'=> true,
                    'projectRequest' => $projectRequest,
                    'projectTeam' => $projectTeam
                ]);

                //return redirect()->route('view.project.team', ['project_request_id' => $projectRequest->id ]);

                } catch(\Exception $e){
                    return ['success' => false, 'message' => 'project team creation failed'];
                }

            }

            public function sendProjectTeam($clientId) {

                $clientEmail = Client::where('id', $clientId)->value('email');

                Mail::to($clientEmail)->send(new ProjectRequestMail());
        
                return ['success' => true, 'message' => 'Email was sent'];
                //return redirect()->back();
            }

}
