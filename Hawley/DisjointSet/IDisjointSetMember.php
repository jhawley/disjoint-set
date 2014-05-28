<?php

namespace Hawley\DisjointSet;

interface IDisjointSetMember {
    public function __construct($key);
    public function setParent($member);
    public function getParent();
    public function getKey();
    public function getRank();
    public function increaseRank();
}