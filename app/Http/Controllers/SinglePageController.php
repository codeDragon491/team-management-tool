<?php

namespace App\Http\Controllers;

use App\Models\ProjectRequest;
use App\Models\TeamMember;
use App\Models\Client;
use App\Models\User;
use App\Events\TeamMemberUpdating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectRequestMail;
use Illuminate\Support\Facades\View;

class SinglePageController extends Controller
{

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
                    event(new TeamMemberUpdating($projectTeam->toArray()));

                return response()->json( [
                    'success'=> true,
                    'projectRequest' => $projectRequest,
                    'projectTeam' => $projectTeam,
                ]);

                } catch(\Exception $e){
                    return ['success' => false, 'message' => $e];
                }

            }

            public function sendProjectTeam($projectClientId) {

                $projectClientEmail = Client::where('id', $projectClientId)->value('email');

                Mail::to($projectClientEmail)->send(new ProjectRequestMail($projectClientId));
        
                return ['success' => true, 'message' => 'Email was sent'];
            }

            public function getProjectRequests($clientId) {
                try {
                    
                    $projectRequests = ProjectRequest::where('client_id', $clientId)->orderBy('created_at', 'DESC')->with('teamMemberLog')->get();
                    //$projectClient = Client::where('id', $clientId)->with('projectRequest')->orderBy('created_at', 'DESC')->with('teamMemberLog')->get();
                    $projectClientName = Client::where('id', $clientId)->value('name');
                    return response()->json( [
                        'success'=> true,
                        'projectRequests' => $projectRequests,
                        'projectClientName' => $projectClientName
                     ]);
                } catch(\Exception $e){
                    return ['success' => false, 'message' => 'getting project requests failed'];
                }
            }

}
