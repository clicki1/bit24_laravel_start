<?php

namespace App\Http\Services;

use App\Models\Field;
use App\Models\Rule;

class Services
{
    public static function getLeads($request, $type = 'all')
    {
        $data = [];
        $data = json_decode($request->input('PLACEMENT_OPTIONS'), true);
        if ($type == 'id') {
            return $data['ENTITY_VALUE_ID'];
        }
        return $data;
    }

    //лиды
    public static function refreshCRM_LEADfields($request)
    {
        $result = MyB24::getCallB24($request, 'crm.lead.fields');
        $data = [];
       // dd($result['result']);
        foreach ($result['result'] as $k => $value) {
            if ($value['isReadOnly'] == true) continue;
            $data[$k]['TITLE'] = $k;
            $data[$k]['BTX_TITLE'] = $value['title'] ?? $value['formLabel'];
            $data[$k]['CRM_TYPE'] = "CRM_LEADS";
            $data[$k]['type'] = $value['type'];
            $data[$k]['isRequired'] = $value['isRequired'];
            $data[$k]['isReadOnly'] = false;
            $data[$k]['isImmutable'] = $value['isImmutable'];
            $data[$k]['isMultiple'] = $value['isMultiple'];
            $data[$k]['isDynamic'] = $value['isDynamic'];
            $data[$k]['settings'] = json_encode($value['settings'] ?? []);
            $data[$k]['listLabel'] = $value['listLabel'] ?? '';
            $data[$k]['filterLabel'] = $value['filterLabel'] ?? '';
            $data[$k]['formLabel'] = $value['formLabel'] ?? '';
        }

        foreach ($data as $res) {
           // dd($res);
            $field = Field::firstOrCreate([
                'TITLE' => $res['TITLE'],
                'CRM_TYPE' => $res['CRM_TYPE'],
            ], $res);
        }
        $fields = Field::all();

        return $fields;
    }

    //сделки
    public static function refreshCRM_DEALfields($request)
    {
        $result = MyB24::getCallB24($request, 'crm.deal.fields');
        $data = [];
//        dd($result['result']);
        foreach ($result['result'] as $k => $value) {
            if ($value['isReadOnly'] == true) continue;
            $data[$k]['TITLE'] = $k;
            $data[$k]['BTX_TITLE'] = $value['title'] ?? $value['formLabel'];
            $data[$k]['CRM_TYPE'] = "CRM_DEAL";
            $data[$k]['type'] = $value['type'];
            $data[$k]['isRequired'] = $value['isRequired'];
            $data[$k]['isReadOnly'] = false;
            $data[$k]['isImmutable'] = $value['isImmutable'];
            $data[$k]['isMultiple'] = $value['isMultiple'];
            $data[$k]['isDynamic'] = $value['isDynamic'];
            $data[$k]['settings'] = json_encode($value['settings'] ?? []);
            $data[$k]['listLabel'] = $value['listLabel'] ?? '';
            $data[$k]['filterLabel'] = $value['filterLabel'] ?? '';
            $data[$k]['formLabel'] = $value['formLabel'] ?? '';
        }

        foreach ($data as $res) {
            $field = Field::firstOrCreate([
                'TITLE' => $res['TITLE'],
                'CRM_TYPE' => $res['CRM_TYPE'],
            ], $res);
        }

        $fields = Field::all();

        return $fields;
    }

 //контакты
    public static function refreshCRM_CONTACTfields($request)
    {
        $result = MyB24::getCallB24($request, 'crm.contact.fields');
        $data = [];
//        dd($result['result']);
        foreach ($result['result'] as $k => $value) {
            if ($value['isReadOnly'] == true) continue;
            $data[$k]['TITLE'] = $k;
            $data[$k]['BTX_TITLE'] = $value['title'] ?? $value['formLabel'];
            $data[$k]['CRM_TYPE'] = "CRM_CONTACT";
            $data[$k]['type'] = $value['type'];
            $data[$k]['isRequired'] = $value['isRequired'];
            $data[$k]['isReadOnly'] = false;
            $data[$k]['isImmutable'] = $value['isImmutable'];
            $data[$k]['isMultiple'] = $value['isMultiple'];
            $data[$k]['isDynamic'] = $value['isDynamic'];
            $data[$k]['settings'] = json_encode($value['settings'] ?? []);
            $data[$k]['listLabel'] = $value['listLabel'] ?? '';
            $data[$k]['filterLabel'] = $value['filterLabel'] ?? '';
            $data[$k]['formLabel'] = $value['formLabel'] ?? '';
        }

        foreach ($data as $res) {
            $field = Field::firstOrCreate([
                'TITLE' => $res['TITLE'],
                'CRM_TYPE' => $res['CRM_TYPE'],
            ], $res);
        }

        $fields = Field::all();

        return $fields;
    }

//компании
    public static function refreshCRM_COMPANYfields($request)
    {
        $result = MyB24::getCallB24($request, 'crm.company.fields');
        $data = [];
//        dd($result['result']);
        foreach ($result['result'] as $k => $value) {
            if ($value['isReadOnly'] == true) continue;
            $data[$k]['TITLE'] = $k;
            $data[$k]['BTX_TITLE'] = $value['title'] ?? $value['formLabel'];
            $data[$k]['CRM_TYPE'] = "CRM_COMPANY";
            $data[$k]['type'] = $value['type'];
            $data[$k]['isRequired'] = $value['isRequired'];
            $data[$k]['isReadOnly'] = false;
            $data[$k]['isImmutable'] = $value['isImmutable'];
            $data[$k]['isMultiple'] = $value['isMultiple'];
            $data[$k]['isDynamic'] = $value['isDynamic'];
            $data[$k]['settings'] = json_encode($value['settings'] ?? []);
            $data[$k]['listLabel'] = $value['listLabel'] ?? '';
            $data[$k]['filterLabel'] = $value['filterLabel'] ?? '';
            $data[$k]['formLabel'] = $value['formLabel'] ?? '';
        }

        foreach ($data as $res) {
            $field = Field::firstOrCreate([
                'TITLE' => $res['TITLE'],
                'CRM_TYPE' => $res['CRM_TYPE'],
            ], $res);
        }

        $fields = Field::all();

        return $fields;
    }

//CRM_QUOTE предложения
    public static function refreshCRM_QUOTEfields($request)
    {
        $result = MyB24::getCallB24($request, 'crm.quote.fields');
        $data = [];
        foreach ($result['result'] as $k => $value) {
            if ($value['isReadOnly'] == true) continue;
            $data[$k]['TITLE'] = $k;
            $data[$k]['BTX_TITLE'] = $value['title'] ?? $value['formLabel'];
            $data[$k]['CRM_TYPE'] = "CRM_QUOTE";
            $data[$k]['type'] = $value['type'];
            $data[$k]['isRequired'] = $value['isRequired'];
            $data[$k]['isReadOnly'] = false;
            $data[$k]['isImmutable'] = $value['isImmutable'];
            $data[$k]['isMultiple'] = $value['isMultiple'];
            $data[$k]['isDynamic'] = $value['isDynamic'];
            $data[$k]['settings'] = json_encode($value['settings'] ?? []);
            $data[$k]['listLabel'] = $value['listLabel'] ?? '';
            $data[$k]['filterLabel'] = $value['filterLabel'] ?? '';
            $data[$k]['formLabel'] = $value['formLabel'] ?? '';
        }

        foreach ($data as $res) {
            $field = Field::firstOrCreate([
                'TITLE' => $res['TITLE'],
                'CRM_TYPE' => $res['CRM_TYPE'],
            ], $res);
        }

        $fields = Field::all();

        return $fields;
    }



    public static function checkLeadsFields($request)
    {

        $rules = Rule::all() ?? [];
        $data = $request->input();
        $result = [];
        foreach ($rules as $rule) {
            if ($rule->rule_type == 1) {
                $result[] = Services::checkFieldsOne($data, $rule);
            } elseif ($rule->rule_type == 2) {
                $result[] = Services::checkFieldsTwo($data, $rule);
            } elseif ($rule->rule_type == 3) {
                $result[] = Services::checkFieldsThree($data, $rule);
            }
        }
        return $result;
    }

    public static function checkFields($data, $rule, $rule_field)
    {
        $result = [];
        // 0 => 'РАВНО',
        if ($rule_field['rule'] == 0) {

            if ($data[$rule_field['id']] == $rule_field['text']) {
                $value = $data[$rule_field['id']];
                $result[$rule_field['id']] = [
                    'show' => $rule->show,
                    'check' => 1,
                    'value' => $value
                ];
                $result['check_rule_field'] = 1;
            }
        }
//        1 => 'НЕ РАВНО',
        if ($rule_field['rule'] == 1) {
            if ($data[$rule_field['id']] !== $rule_field['text']) {
                $value = $data[$rule_field['id']];
                $result[$rule_field['id']] = [
                    'show' => $rule->show,
                    'check' => 1,
                    'value' => $value
                ];
                $result['check_rule_field'] = 1;
            }
        }
        //        2 => 'НЕ ЗАПОЛНЕНО',
        if ($rule_field['rule'] == 2) {
            if (empty($data[$rule_field['id']])) {
                $value = $data[$rule_field['id']];
                $result[$rule_field['id']] = [
                    'show' => $rule->show,
                    'check' => 1,
                    'value' => $value
                ];
                $result['check_rule_field'] = 1;
            }
        }
        //        3 => 'ЗАПОЛНЕНО',
        if ($rule_field['rule'] == 3) {
            if (!empty($data[$rule_field['id']])) {
                $value = $data[$rule_field['id']];
                $result[$rule_field['id']] = [
                    'show' => $rule->show,
                    'check' => 1,
                    'value' => $value
                ];
                $result['check_rule_field'] = 1;
            }
        }
        //        4 => 'СОДЕРЖИТ',
        if ($rule_field['rule'] == 4) {
            if ((strpos($data[$rule_field['id']], $rule_field['text']) !== false)) {
                $value = $data[$rule_field['id']];
                $result[$rule_field['id']] = [
                    'show' => $rule->show,
                    'check' => 1,
                    'value' => $value
                ];
                $result['check_rule_field'] = 1;
            }
        }
        //       5 => 'НЕ СОДЕРЖИТ',
        if ($rule_field['rule'] == 5) {
            if ((strpos($data[$rule_field['id']], $rule_field['text']) === false)) {
                $value = $data[$rule_field['id']];
                $result[$rule_field['id']] = [
                    'show' => $rule->show,
                    'check' => 1,
                    'value' => $value
                ];
                $result['check_rule_field'] = 1;
            }
        }

        return $result;
    }
    public static function checkFieldsOne($data, $rule){

        $rule_field = json_decode($rule->rule, true);
        $result = Services::checkFields($data, $rule, $rule_field);
        if (isset($result['check_rule_field'])){
            $data_fresh[$rule->field_id] = [
                'show' => $rule->show,
            ];
        }else{
            $data_fresh[$rule->field_id] = [
                'show' => ($rule->show == 1) ? 0 : 1,
            ];
        };

        return $data_fresh;
    }
    public static function checkFieldsTwo($data, $rule)
    {
        $data_fresh = [];
        $rule_fields = json_decode($rule->rule, true);

        foreach ($rule_fields as $rule_field) {

            $result = Services::checkFields($data, $rule, $rule_field);

            if (isset($result['check_rule_field'])){
               $data_fresh[$rule->field_id] = [
                    'show' => $rule->show,
                ];
                break;
            };

            $data_fresh[$rule->field_id] = [
                'show' => ($rule->show == 1) ? 0 : 1,
            ];
        }

        return $data_fresh;

    }

    public static function checkFieldsThree($data, $rule)
    {
        $data_fresh = [];
        $rule_fields = json_decode($rule->rule, true);
        $check_cont = count($rule_fields);
        foreach ($rule_fields as $rule_field) {

            $result = Services::checkFields($data, $rule, $rule_field);

            if (!count($result)) {
                $data_fresh[$rule->field_id] = [
                    'show' => ($rule->show == 1) ? 0 : 1,
                ];
                break;
            } else {
                $data_fresh[$rule->field_id] = [
                    'show' => $rule->show,
                ];
            }

        }

        return $data_fresh;
    }
}
