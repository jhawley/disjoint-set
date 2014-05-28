<?php

namespace Hawley\DisjointSet;

class DisjointSetMember implements IDisjointSetMember {
    protected $key, $parent, $size;
    
    public function __construct($key) {
        $this->key = $key;
        $this->parent = $key;
        $this->size = 0;
    }
    
    public function setParent($member) {
        $this->parent = $member;
    }
    
    public function getParent() {
        return $this->parent;
    }
    
    public function getKey() {
        return $this->key;
    }
    
    public function getRank() {
        return $this->size;
    }
    
    public function increaseRank() {
        $this->size++;
    }
}