<?php

namespace App\Http\Controllers\States;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Charts;

class anambraController extends Controller
{

	//get all users registered as resident under anambra
	public function allAnambraResident(){
    	

    	$allAnambra2 = DB::select('select * from users where resident = ?', ['Anambra']);
    	$allAnambra2 =+ count($allAnambra2);

    	return $allAnambra2;
    	
    }

//get all users registered as origin under anambra
    public function allAnambraOrigin(){
        $allAnambra1 = DB::select('select * from users where origin = ?', ['Anambra']);
        $allAnambra1 =+ count($allAnambra1);

        

        return $allAnambra1;
       
    }

    //get all users registered under anambra
    public function allRegisterAnambra(){
       
        return $allAnambraResident() + $allAnambraOrigin();
    }

    //get all votes
    public function allAnambraVotes(){
    	$allAnambraGov = DB::select('select * from users where govstate = ?', ['Anambra']);
    	$allAnambraGov =+ count($allAnambraGov);

    	return $allAnambraGov;
    }


    //retrieve votes according to party
    public function anambraVoteParty(){
    	 
    	 $anambraGovApc = DB::select('select * from users where governor = ? and govstate = ?, ['APC', 'Anambra']');
    	 $anambraGovApc =+ count($anambraGovApc);

    	 $anambraGovPdp = DB::select('select * from users where governor = ? and govstate = ?, ['PDP', 'Anambra']');
    	 $anambraGovPdp =+ count($anambraGovApc);

    	 $anambraGovApga = DB::select('select * from users where governor = ? and govstate = ?, ['APGA', 'Anambra']');
    	 $anambraGovApga =+ count($anambraGovApc);

    	 $anambraGovLp = DB::select('select * from users where governor = ? and govstate = ?, ['LP', 'Anambra']');
    	 $anambraGovLp =+ count($anambraGovApc);

         $anambraGovPpa = DB::select('select * from users where governor = ? and govstate = ?, ['PPA', 'Anambra']');
         $anambraGovPpa =+ count($anambraGovPpa);

         $anambraGovUpp = DB::select('select * from users where governor = ? and govstate = ?, ['Upp', 'Anambra']');
         $anambraGovUpp =+ count($anambraGovUpp);

         //bar chart- anambra gov votes by party chart
 $anambrachart1 = Charts::create('bar', 'highcharts')
           
            
            ->title("Votes according to party in Abia State")
            ->dimensions(0, 400) // Width x Height
            ->template("material")
            // You could always set them manually
            ->colors(['#2196F3', '#F44336', '#4FC107', '#F3C111', '#4FC1555', '#F3C771'])
            // Setup the diferent datasets (this is a multi chart)
            ->values([$anambraGovApc, $anambraGovPdp, $anambraGovApga, $anambraGovLp, $anambraGovPpa, $anambraGovUpp])
            
            // Setup what the values mean
            ->labels(['APC', 'PDP', 'APGA', 'LP', 'PPA', 'UPP']);

            

            return $anambraChart;
    }

  //var Anambra = ['Select item...', 'Aguata', 'Anambra East', 'Anambra West', 'Anaocha', 'Awka North', 'Awka South', 'Ayamelum', 'Dunukofia', 'Ekwusigo', 'Idemili North', 'Idemili South', 'Ihiala', 'Njikoka', 'Nnewi North', 'Nnewi South', 'Ogbaru', 'Onitsha North', 'Onitsha South', 'Orumba North', 'Orumba South', 'Oyi'];

}
