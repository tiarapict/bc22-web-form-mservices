<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use rndediiv2\SmartDevUsability\Facade\SmartDevUsability;
use App\CustomsDeclaration;
use App\CustomDeclarationGoods;

class RegisterController extends Controller
{
    public function getRegister()
    {
        $arrData['action'] = url('register');
        $arrData['country'] = SmartDevUsability::setSelectCombo("select country_id, country_name from tm_country","country_id","country_name", TRUE);
        return view('component.register.form', $arrData);
    }

    public function setRegister(Request $request)
    {
        $txCustomsDeclaration = SmartDevUsability::post2Query($request->customs);
        $txCustomsDeclaration['cd_id'] = SmartDevUsability::generatorUuid();        
        $txCustomsDeclaration['cd_accompanied_baggages'] = $request->cd_accompanied_baggages;
        $valTxCustomsDeclaration = Validator::make($txCustomsDeclaration, [
            'cd_id' => 'required|max:36',
            'cd_arrival_date' => 'required|date',
            'cd_voyage_number' => 'required|max:5',
            'cd_full_name' => 'required|max:75',
            'cd_nationality' => 'required|max:2',
            'cd_passport_number' => 'required|max:10',
            'cd_occupation' => 'required|max:75',
            'cd_address_in' => 'required|max:150',
            'cd_accompanying' => 'required|integer',
            'cd_accompanied_baggages' => 'required|integer',
            'cd_email' => 'required|email'
        ],[
            'cd_id.required' => 'Id must be fill with 36 max character',
            'cd_arrival_date.required' => 'Arrival date must be fill',
            'cd_cd_voyage_number.required' => 'Voyage number must be fill with 5 max character', 
            'cd_full_name.required' => 'Full name must be fill with 75 max character',
            'cd_nationality.required' => 'Nationality must be fill with 2 max character',
            'cd_passport_number.required' => 'Passport Number must be fill with 10 max character',
            'cd_occupation.required' => 'Occupation must be fill with 75 max character',
            'cd_address_in.required' => 'Address in must be fill with 150 max character',
            'cd_accompanying.required' => 'Accompanying must be fill',
            'cd_accompanied_baggages.required' => 'Accompanied baggages must be fill',
            'cd_email.required' => 'Email must be fill'
        ]);
        if($valTxCustomsDeclaration->fails())
        {
            return response()->json(['error' => $valTxCustomsDeclaration->errors(), 'status' => 400]);
        }
        else
        {
            try {
                CustomsDeclaration::create($txCustomsDeclaration);
                if($txCustomsDeclaration['cd_accompanied_baggages'] > 0)
                {
                    $arrTxCustomDeclarationGoods = $request->goods;
                    $arrKeyCustomDeclarationGoods = array_keys($arrTxCustomDeclarationGoods);
                    for($a = 0; $a < count($_POST['goods']['goods_description']); $a++){
                        $txCustomDeclarationGoods = array('cd_id' => $txCustomsDeclaration['cd_id']);
                        for($b=0;$b<count($arrKeyCustomDeclarationGoods);$b++)
                        {
                            $txCustomDeclarationGoods[$arrKeyCustomDeclarationGoods[$b]] = $arrTxCustomDeclarationGoods[$arrKeyCustomDeclarationGoods[$b]][$a];
                        }
                        CustomDeclarationGoods::create($txCustomDeclarationGoods);
                    }
                }
                return response()->json([
                    'message' => 'Register Successfully',
                    'redirect' => [
                        'statement' => true,
                        'url' => url('/')
                    ], 
                    'status' => 200
                ]);
            } catch (Exception $e) {
                return response()->json(['error' => $e, 'status' => 400]);
            }
        }
    }
}
