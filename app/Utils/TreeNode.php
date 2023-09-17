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
            if ($node['pid'] == $pid) {
                $node['children'] = self::generateTree($nodes, $node['id']);
                $tree[] = $node;
            }
        }
        return $tree;
    }

    public static function generateSanctum($nodes): array
    {
        $sanctum = [];
        $nodes =  array_column($nodes,null,'id');

        foreach ($nodes as $k => $node){
            $findPath = self::findParentPath($node, $nodes,$k);
            $sanctum[$k] = $findPath ? $findPath . $node['path'] : $node['path'];
        }
        return array_values($sanctum);
    }

    private static function findParentPath($node, $nodes,$k): string
    {
        $path = '';
        $parentId = $node['pid'];
        while($parentId != 0 && isset($nodes[$parentId])){
            $parent = $nodes[$parentId];
            $path = $parent['path'].':'.$path;
            $parentId = $parent['pid'];
        }
        return $path;
    }
}
