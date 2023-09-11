<?php

namespace App\Utils;

/**
 * 树型结构类
 */
class TreeNode
{
    // 生成树形结构
    public static function generateTree($nodes, $pid = 0): array
    {
        $tree = [];
        foreach ($nodes as $node) {
            if($node['pid'] == $pid){
                $node['children'] = self::generateTree($nodes,$node['id']);
                $tree[] = $node;
            }
        }
        return $tree;
    }
}
