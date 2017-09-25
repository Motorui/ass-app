<?php

namespace app\models\searches;

use Yii;

/**

**/
class Utility extends \yii\db\ActiveRecord
{
    public static function getPagination($request_params){

        $param_val = 'page';

        foreach($request_params as $key => $value){
            if (strpos($key, '_tog') !== false) {
                $param_val = $value;
            }
        }

        $pagination = array();

        if($param_val == 'all'){ //returns empty array, which will show all data.
            return $pagination;
        }else if($param_val == 'page'){ //return pageSize as 5
            $pagination = ['pageSize' => 50];
            return $pagination;
        }
            return $pagination;  // returns empty array again.
    }
}
