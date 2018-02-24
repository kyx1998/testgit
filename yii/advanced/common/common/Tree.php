<?php
/**
 * 对目录树的封装
 * $datas: [
 *              [
 *                  'class_id'=>1,
 *                  'class_name'=>'one',
 *                  'parent_id'=>-1,
 *              ]
 *              ......
 *         ]
 * 输出
 * $tree: [
 *          [
 *              'class_id'=>1,
 *              'class_name'=>'one',
 *              'parent_id'=>-1,
 *              'level'=>0, // 第几层
 *          ]
 *        ]
 * $tree输出是有序的, 即, 已经安装目录层级排好序
 *
 */
namespace common\common;

class Tree {
    public $datas; // 传入数据
    public $tree;  // 输出数据
    public $child; //按树各层名字的分类
    public $lastChild;
    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    private function travel($parent, $level)
    {
        $level ++;
        foreach ($this->datas as $data) {
            if($data['parent_id'] == $parent['class_id']) {
                $data['level'] = $level;
                $this->child[$data['level']][$data['class_name']]=$data['class_id'];//键值互换取出来，数组键不能重复，值可以
                $this->tree[] = $data;
                $this->travel($data, $level);
            }
        }
    }

    public function genTree()
    {
        foreach ($this->datas as $data) {
            if($data['parent_id'] == -1) {
                $data['level'] = 0;
                $this->child[$data['level']][$data['class_name']]=$data['class_id'];
                $this->tree[] = $data;
                $this->travel($data, 0);
            }
        }
    }
}