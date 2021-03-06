<?php
/**
 * Created by PhpStorm.
 * User: Edgar
 * Date: 12/1/2017
 * Time: 12:38 PM
 */

class WhereClause
{
    private $field;
    private $comparison;
    private $value;
    private $join;

    public $openParentheses=false;
    public $closeParentheses=false;

    public function __construct($field, $comparison, $value,$join)
    {
        $this->join=$join;
        $this->field=$field;
        $this->value=$value;
        $this->comparison=$comparison;

        $validComparisons=array('<','>','<=','>=','<>','=','like');
        if(in_array($comparison,$validComparisons)===false)
        {
            throw new Exception("Invalid comparison ".$comparison);
        }
    }


    private function GetOperationString()
    {
        if($this->comparison=='like')
        {
            switch($this->GetSerializationType())
            {
                case "text":
                    return "value like concat('%%',%s,'%%')";
                case "list":
                    return "value in (%l)";
                case "check":
                    return "(%c)";
                default:
                    throw new Exception("Invalid like operation");
            }
        }

        switch($this->comparison)
        {
            case 'like':
            case 'not like':
                return "value ".$this->comparison." concat('%%',%s,'%%')";
            break;

            case "in":
            case "not in":
                return "value ".$this->comparison." (%l)";
            default:
                if($this->GetSerializationType()=='date')
                    return "datevalue".$this->comparison."%s";
                return "value".$this->comparison."%s";


        }
    }

    public function GetText()
    {


        global $wpdb;
        $statement='';
        if($this->field['Id']=="_FormId")
        {
            $statement= $wpdb->prepare(" parent.entry_id=%s ",$this->value);
        }else

        if($this->field['Id']=="_SFTimeStamp")
        {
            $statement= $wpdb->prepare(" parent.date".$this->comparison."%s ",$this->value);
        }else

        if($this->field['Id']=="_UserId")
        {
            $statement= $wpdb->prepare(" parent.user_id".$this->comparison."%s ",$this->value);
        }else{
            $statement=$wpdb->prepare(" exists(select 1 from ".SMART_FORMS_ENTRY_DETAIL." detail where parent.entry_id=detail.entry_id and field_id=%s  and ".$this->GetOperationString()." ) ",$this->field['Id'] ,$this->value);
        }


        if($this->join=='or')
        {
            $join = ' or';
        }
        else
        {
            $join = ' and';
        }


        return  $join.$statement;

    }

    private function GetSerializationType()
    {
        switch($this->field['ClassName']){
            case 'rednaodatepicker':
                return 'date';
            case "rednaomultiplecheckboxes":
                return "list";
            default:
                return 'text';


        }
    }


}