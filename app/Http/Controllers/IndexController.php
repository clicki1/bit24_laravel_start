<?php

namespace App\Http\Controllers;

use App\Http\Services\FieldsBTX;
use App\Http\Services\MyB24;
use App\Http\Services\Services;
use App\Models\Field;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{

    public function index(Request $request)
    {

        //ДОБАВЛЕНИЕ ПОЛЯ ТЕКСТ
        $add = [];
        $add["FIELD_NAME"] = "MY_STROKA_TEST";
        $add["EDIT_FORM_LABEL"] = "TEST STROKA";
        $add["LIST_COLUMN_LABEL"] = $add["EDIT_FORM_LABEL"];
        $add["USER_TYPE_ID"] = 'string';
        $add["XML_ID"] = 'MY_LIST_TEST';
        $add["member_id"] = '6c65247a243ea9e94902130e110452c9';
//        $add["LIST"] = [["VALUE" => "Элемент #1"], ["VALUE" => "Элемент #2"], ["VALUE" => "Элемент #3"], ["VALUE" => "Элемент #4"], ["VALUE" => "Элемент #5"]] ;
//        $add_field_text = MyB24::CallB24_field_text_add($request, "CRM_LEAD", $add);
//        $add_field_text = MyB24::CallB24_field_enumeration_add($request, "CRM_LEAD", $add);
//        $add_field_text = MyB24::CallB24_field_text_add_new("CRM_LEAD", $add);
//        $ref = MyB24::CallB24_refresh_token($add["member_id"]);
//        dd($ref);
//        dd($add_field_text);
        //ОБНОВЛЕНИЕ ПОЛЯ ТЕКСТ
        $update = [];
        $update['LIST_COLUMN_LABEL'] = 'СПИСОК NEW CRM_LEAD UPD';
        $update["EDIT_FORM_LABEL"] = $update["LIST_COLUMN_LABEL"];
        $update["LIST"] = [["VALUE" => "Элемент #188"], ["VALUE" => "Элемент #288"],  ["VALUE" => "Элемент #4"], ["VALUE" => "Элемент #5"]] ;


//        $upd_field_text = MyB24::CallB24_field_enumeration_upd($request,  "CRM_LEAD", 'MY_LIST_TEST', $update);
//        dd($upd_field_text);
        //УДАЛЕНИЕ ПОЛЯ В БИТРИКС
        $del_field = MyB24::CallB24_field_del($request, "CRM_LEAD", 'STRING_8');
//        dd($del_field);
        //СПИСОК ПОЛЬЗОВАТЕЛЬСКИХ ПОЛЕЙ СПИСОК
        $usr_field_list = MyB24::CallB24_field_list($request,  "CRM_LEAD", );
        dd($usr_field_list);
        //ДОБАВЛЕНИЕ ПОЛЯ СПИСОК

        //ДОБАВЛЕНИЕ ПОЛЯ СПИСОК (МНОЖЕСТВЕННЫЙ)


//        $result_del = MyB24::placementCallB24_delete($request, 'userfieldtype.delete');
//        $result_list = MyB24::placementCallB24_list($request, 'userfieldtype.list');
//        return $result_list->body();

//        dd($request->input());
//        $fields_CRM_LEAD = Services::refreshCRM_LEADfields($request);
//        $fields_CRM_DEAL = Services::refreshCRM_DEALfields($request);
//        $fields_CRM_CONTACT = Services::refreshCRM_CONTACTfields($request);
//        $fields_CRM_COMPANY = Services::refreshCRM_COMPANYfields($request);
//        $fields_CRM_QUOTE = Services::refreshCRM_QUOTEfields($request);

//        $result = MyB24::getCallB24configReset($request, 'crm.lead.details.configuration.reset');
//        $result = MyB24::getCallB24config($request, 'crm.lead.details.configuration.set');

//        $result1 = FieldsBTX::AddTextField($request);
//        $result2 = FieldsBTX::AddListField($request);

//        dump($result1);
//        dd($result2);

        $crm_type = "CRM_LEAD";
        $res['member_id'] = "e06846e3d3560fffef5142c3fff0a8f6";
        $res['ENTITY_VALUE_ID'] = "2";
//        $get = MyB24::CallB24_get_crm($crm_type, $res);
//
//        dd($get);


        Log::info("INDEX");


        $rules_fields = array(
            0 => 'РАВНО',
            1 => 'НЕ РАВНО',
            2 => 'НЕ ЗАПОЛНЕНО',
            3 => 'ЗАПОЛНЕНО',
            4 => 'СОДЕРЖИТ',
            5 => 'НЕ СОДЕРЖИТ',
        );

//TYPE_FIELD = 1
//        $rule = [];
//        $rule['id'] = 1;
//        $rule['rule'] = 0;
//        $rule['text'] = "aaa";
//
//
//        $field = Rule::create([
//            'field_id' => 3,
//            'rule' => json_encode($rule),
//            'rule_type' => 1,
//            'show' => 1,
//        ]);

        //---------
        //TYPE_FIELD = 2
//        $rule = [];
//
//        $rule = [
//            [
//            'id' => 1,
//            'rule' => 0,
//            'text' => "zzz",
//                ],
//            [
//                'id' => 1,
//                'rule' => 0,
//                'text' => "fff",
//            ]
//        ];
//---------
        //TYPE_FIELD = 3
//        $rule = [];
//
//        $rule = [
//            [
//            'id' => 1,
//            'rule' => 0,
//            'text' => "abc",
//                ],
//            [
//                'id' => 1,
//                'rule' => 5,
//                'text' => "www",
//            ]
//        ];
//---------

//
//
//        $field = Rule::create([
//            'field_id' => 4,
//            'rule' => json_encode($rule),
//            'rule_type' => 2,
//            'show' => 1,
//        ]);

//        $rule_one = Rule::first();
//        $rule_dec = json_decode($rule_one->rule, true);
//        dd($rule_dec[0]['id']);


        return view('btx.index');
    }

    public function install(Request $request)
    {

        $install_result = MyB24::installApp($request);

        $result = MyB24::placementCallB24($request, 'userfieldtype.add');
//
//        dd($result);
//        $result = MyB24::placementCallB24_list($request, 'userfieldtype.list');
//
//        dd($result);
        $result_bind = MyB24::bindCallB24($request, 'event.bind', 'ONCRMLEADADD');
        $result_bind_2 = MyB24::bindCallB24($request, 'event.bind', 'ONCRMLEADUPDATE');

        Log::info($result);
        Log::info($result_bind);
        Log::info($result_bind_2);


//        $result = CRest::call(
//            'event.bind',
//            [
//                'EVENT' => 'ONCRMCONTACTADD',
//                'HANDLER' => $handlerBackUrl,
//                'EVENT_TYPE' => 'online'
//            ]
//        );


        return view('btx.install', compact("install_result"));
    }

    public function handler(Request $request)
    {
        Log::info("HANDLER");
        Log::info($request->input());
        Log::info($request->input('data.FIELDS.ID'));
        Log::info($request->input('data.FIELDS'));
        Log::info("HANDLER");

        $event = $request->input('event');

        if (in_array($event, ['0' => 'ONCRMLEADADD', '1' => 'ONCRMLEADUPDATE'])) {
        }

        $result = MyB24::setLeadsCallB24_test($request, 'crm.lead.update');
        Log::info($result);


        return 'handler';
    }

    public function leads(Request $request)
    {
        $domain = $request->input('DOMAIN');
        $auth_id = $request->input('AUTH_ID');
        $id = $request->input('LEADS.ID');

        $result = MyB24::setLeadsCallB24($request, 'crm.lead.update', $request);
        $fields = Field::all();
        return view('btx.placement', compact('id', 'fields', 'domain', 'auth_id'));
    }

    public function placement(Request $request)
    {
        $data = $request->input();
//        dd(json_decode($data['PLACEMENT_OPTIONS'])->ENTITY_ID) ;
//        $result = MyB24::placementCallB24_list($request, 'userfieldtype.list');
//
//        dd($result->body());
//        $result_del = MyB24::placementCallB24_delete($request, 'userfieldtype.delete');
//
//        $result = MyB24::placementCallB24upd($request, 'userfieldtype.update');
//        dd($result_del);
//        $result = MyB24::getCallB24configReset($request, 'crm.contact.details.configuration.reset');
//        $result = MyB24::getCallB24config($request, 'crm.lead.details.configuration.set');

//        dd($request->input());
//
        $domain = $request->input('DOMAIN');
        $auth_id = $request->input('AUTH_ID');
        $id = Services::getLeads($request, 'id');
        $CRM_TYPE = json_decode($data['PLACEMENT_OPTIONS'])->ENTITY_ID;

        $fields = Field::where('member_id','e06846e3d3560fffef5142c3fff0a8f6')->where('CRM_TYPE',$CRM_TYPE)->get();
//        dd($fields);
        return view('btx.placement', compact('id', 'fields', 'domain', 'auth_id'));
    }
}
