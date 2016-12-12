<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/12/10
 * Time: 15:04
 */

namespace Assess\Model;
use Think\Model\RelationModel;


class AppraiseModel extends RelationModel
{
    protected $_link = array(
        /*
         * 一对一关联：has_one和belongs_to(self::HAS_ONE)
         * 一对多关联：has_many和belongs_to(self:HAS_MANY)(self:BELONGS_TO)
         * 多对多关联：many_to_many
         */
        'bs_goods' => array(//要关联的表名
            //一个商品只能有一个id，一个id只对应一个商品
            'mapping_type' => self::HAS_ONE,
            'mapping_class' => 'bs_goods',//表名
            'foreign_key' => 'bs_gid',
//            'condition' => 'bs_gid = bs_goods.bs_gid',

        ),
        'store_information' => array(//要关联的表名
            //一个商家只能有一个id，一个id只能对应一个商家
            'mapping_type' => self::HAS_ONE,
            'mapping_class' => 'store_information',//表名
            'foreign_key'=> 'si_id',
//            'condition' => 'si_iddd'

        ),
        'customer_information' => array(//要关联的表名
            //一个顾客只能有一个id，一个id只能对应一个商家
            'mapping_type' => self::HAS_ONE,
            'mapping_class' => 'customer_information',//表名
            'foreign_key'=> 'ci_id',
        )

    );
}